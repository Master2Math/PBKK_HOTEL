<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Pembayaran;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PembayaranController extends Controller
{
    public function index(): View
    {
       $datapembayaran = pembayaran::latest()->paginate(10);
       return view('pembayaran.index',compact('datapembayaran'));
    }

    public function create(): View
    {
        $pembayaran = Pembayaran::all();
        $customer = Customer::all();
        $invoice = Invoice::all();
        return view('pembayaran.create',compact('pembayaran','customer','invoice'));
    }

    public function store(Request $request): RedirectResponse
    {
        // dd($request);
       
        //validate form
        $request->validate([
            'customer_id'          => 'required|min:1|:pembayaran,customer_id',
            'tanggal'              => 'required|min:1|:pembayaran,tanggal',
            'metode_bayar'         => 'required|min:1|:pembayaran,metode_bayar',
            'id_invoice'           => 'required|min:1|:pembayaran,id_invoice',
         
        ]);

        pembayaran::create([
            'customer_id'         => $request->customer_id,
            'tanggal'             => $request->tanggal,
            'metode_bayar'        => $request->metode_bayar,
            'id_invoice'          => $request->id_invoice,
            

        ]);
        //redirect to index
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $datapembayaran = pembayaran::findOrFail($id);
        $customer = Customer::all();
        $invoice = Invoice::all();
        return view('pembayaran.edit', compact('datapembayaran','customer','invoice'));
    }

    public function show(string $id): View
    {
        $pembayaran = pembayaran::findOrFail($id);

        return view('pembayaran.show', compact('pembayaran'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // dd($request);
        //validate form
        $request->validate([
            'customer_id'          => 'required|min:1|:pembayaran,customer_id',
            'tanggal'              => 'required|min:1|:pembayaran,tanggal',
            'metode_bayar'         => 'required|min:1|:pembayaran,metode_bayar',
            'id_invoice'           => 'required|min:1|:pembayaran,id_invoice',
         
        ]);
        
        $datapembayaran = pembayaran::findOrFail($id);
        $datapembayaran->update([
            'customer_id'         => $request->customer_id,
            'tanggal'             => $request->tanggal,
            'metode_bayar'        => $request->metode_bayar,
            'id_invoice'          => $request->id_invoice,
            ]);

        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $pembayaran = pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
