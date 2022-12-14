<?php

namespace App\Http\Controllers;

use App\Helpers\CustomerStatus;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Customer::class);
    }

    public function index()
    {
        $user = auth()->user();
        $customers = $user->customers()->paginate();

        return inertia('Customers/Index', compact('customers'));
    }

    public function create()
    {
        $statuses = CustomerStatus::toArray(false);
        $defaultStatus = CustomerStatus::STATUS_NEW;

        return inertia('Customers/Create', compact('statuses', 'defaultStatus'));
    }

    public function store(CustomerRequest $request)
    {
        $user = $request->user();
        $data = $request->validated();
        $customer = $user->customers()->create($data);

        return redirect()->route('customers.show', $customer)->with('success', 'Cliente cadastrado!');
    }

    public function show(Customer $customer)
    {
        $customer->load('numbers');

        return inertia('Customers/Show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $statuses = CustomerStatus::toArray(false);
        $defaultStatus = CustomerStatus::STATUS_NEW;

        return inertia('Customers/Edit', compact('statuses', 'defaultStatus', 'customer'));
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        return redirect()->route('customers.show', $customer)->with('success', 'Cliente atualizado!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('succes', 'Cliente excluído');
    }
}
