<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerAdminController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('admin.customer.index')
        ->with('customers', $customers);
    }

    public function create()
    {
        return view('admin.customer.create');
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

        return redirect('admin/customer')->with('status', 'Customer created!');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit', compact([ 'customer']));
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

        return redirect('admin/customer')->with('status', 'Customer updated!');
    }

    public function destroy($id)
    {
        Customer::find($id)->delete();
        return back()->with('status', 'Customer deleted!');
    }
}
