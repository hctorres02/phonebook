<?php

namespace App\Http\Controllers;

use App\Helpers\NumberStatus;
use App\Http\Requests\NumberRequest;
use App\Models\Customer;
use App\Models\Number;
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
        $customers = Customer::query()->pluck('name', 'id');
        $statuses = NumberStatus::toArray(false);

        $defaultCustomer = $request->customer_id;
        $defaultStatus = NumberStatus::STATUS_ACTIVE;

        return inertia('Numbers/Create', compact(
            'customers',
            'statuses',
            'defaultCustomer',
            'defaultStatus',
        ));
    }

    public function store(NumberRequest $request)
    {
        $customer = Customer::find($request->customer_id);
        $number = $customer->numbers()->create($request->validated());

        return redirect()->route('numbers.show', $number)->with('success', 'Número cadastrado!');
    }

    public function show(Number $number)
    {
        $number->load('customer');

        return inertia('Numbers/Show', compact('number'));
    }

    public function edit(Number $number)
    {
        $customers = Customer::query()->pluck('name', 'id');
        $statuses = NumberStatus::toArray(false);

        return inertia('Numbers/Edit', compact(
            'customers',
            'statuses',
            'number',
        ));
    }

    public function update(NumberRequest $request, Number $number)
    {
        $number->update($request->validated());

        return redirect()->route('numbers.show', $number)->with('success', 'Número atualizado!');
    }

    public function destroy(Number $number)
    {
        $number->delete();

        return redirect()->route('numbers.index')->with('succes', 'Número excluído!');
    }
}
