<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('dashboard.customer.index')
        ->with('customers', $customers);
    }

    public function create()
    {
        return view('dashboard.customer.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:50',
        ];

        $messages = [
            'name.required' => 'Nama Customer harus diisi',
            'name.max' => 'Nama Customer terlalu panjang',
        ];

        $this->validate($request, $rules, $messages);

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        return redirect('dashboard/customer/create')->with('status', 'Customer created!');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('dashboard.customer.edit', compact([ 'customer']));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:50',
        ];

        $messages = [
            'name.required' => 'Nama Customer harus diisi',
            'name.max' => 'Nama Customer terlalu panjang',
        ];

        $this->validate($request, $rules, $messages);

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        return redirect()->back()->with('status', 'Customer updated!');
    }

    public function show($id)
    {
        $customer = Customer::with('projects')->findOrFail($id);

        return view('dashboard.customer.show')
        ->with('customer', $customer);
    }
}
