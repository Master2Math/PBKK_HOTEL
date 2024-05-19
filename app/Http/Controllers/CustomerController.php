<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    public function index(): View
    {
       $datacustomer = customer::latest()->paginate(10);
       return view('customer.index',compact('datacustomer'));
    }

    public function create(): View
    {
        return view('customer.create');
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'nik'                => 'required|min:2|unique:customer,nik',
            'nama_customer'      => 'required|min:2|:customer,nama_customer',
            'email'              => 'required|min:2|:customer,email',
            'country'            => 'required|min:2|:customer,country',
        ]);

        customer::create([
            'nik'               => $request->nik,
            'nama_customer'     => $request->nama_customer,
            'email'             => $request->email,
            'country'           => $request->country,
            

        ]);
        //redirect to index
        return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $datacustomer = customer::findOrFail($id);
        return view('customer.edit', compact('datacustomer'));
    }

    public function show(string $id): View
    {
        $customer = customer::findOrFail($id);

        return view('customer.show', compact('customer'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nik'                => 'required|min:2|:customer,nik',
            'nama_customer'      => 'required|min:2|:customer,nama_customer',
            'email'              => 'required|min:2|:customer,email',
            'country'            => 'required|min:2|:customer,country',
        ]);

        $datacustomer = customer::findOrFail($id);
        $datacustomer->update([
            'nik'               => $request->nik,
            'nama_customer'     => $request->nama_customer,
            'email'             => $request->email,
            'country'           => $request->country,
            ]);

        return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $customer = customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
