<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Menampilkan daftar customer
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // Menampilkan form untuk menambah customer baru
    public function create()
    {
        return view('customers.create');
    }

    // Menyimpan customer baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Menyimpan customer baru
        Customer::create($request->all());

        // Redirect ke halaman customer dengan pesan sukses
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    // Menampilkan form untuk mengedit customer
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Memperbarui data customer
    public function update(Request $request, Customer $customer)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Memperbarui customer
        $customer->update($request->all());

        // Redirect ke halaman customer dengan pesan sukses
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    // Menghapus data customer
    public function destroy(Customer $customer)
    {
        // Menghapus customer
        $customer->delete();

        // Redirect ke halaman customer dengan pesan sukses
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
