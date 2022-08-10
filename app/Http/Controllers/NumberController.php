<?php

namespace App\Http\Controllers;

use App\Helpers\NumberStatus;
use App\Helpers\Preference;
use App\Http\Requests\NumberRequest;
use App\Models\Customer;
use App\Models\Number;
use App\Services\NumberPreferenceService;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function index()
    {
        $numbers = Number::query()->with('customer')->paginate();

        return inertia('Numbers/Index', compact('numbers'));
    }

    public function create(Request $request)
    {
        $props = $this->defaultProps([
            'customer_id' => (int) $request->customer_id,
            'status' => NumberStatus::STATUS_ACTIVE,
        ]);

        return inertia('Numbers/Create', $props);
    }

    public function store(NumberRequest $request, NumberPreferenceService $numberPreferenceService)
    {
        $customer = Customer::find($request->customer_id);
        $number = $customer->numbers()->create($request->validated());
        $numberPreferenceService->store($number, $request->preferences);

        return redirect()->route('numbers.show', $number)->with('success', 'Número cadastrado!');
    }

    public function show(Number $number)
    {
        $number->load('customer');

        return inertia('Numbers/Show', compact('number'));
    }

    public function edit(Number $number)
    {
        $number->preferences = $number->preferences()->where('value', true)->pluck('name')->all();
        $props = $this->defaultProps($number);

        return inertia('Numbers/Edit', $props);
    }

    public function update(NumberRequest $request, Number $number, NumberPreferenceService $numberPreferenceService)
    {
        $number->update($request->validated());
        $numberPreferenceService->update($number, $request->preferences);

        return redirect()->route('numbers.show', $number)->with('success', 'Número atualizado!');
    }

    public function destroy(Number $number)
    {
        $number->delete();

        return redirect()->route('numbers.index')->with('succes', 'Número excluído!');
    }

    /**
     * @param \App\Models\Number|array $number
     * @return array
     */
    private function defaultProps($number): array
    {
        $customers = Customer::query()->pluck('name', 'id');
        $statuses = NumberStatus::toArray(false);
        $preferences = Preference::toArray(false);

        if (is_array($number)) {
            $number = array_merge($number, [
                'number' => null,
                'preferences' => collect($preferences)->where('default', true)->keys()->all(),
            ]);
        }

        return compact('number', 'customers', 'statuses', 'preferences');
    }
}
