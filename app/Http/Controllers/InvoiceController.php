<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Reservasi;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class InvoiceController extends Controller
{
    public function index(): View
    {
       $datainvoice = invoice::latest()->paginate(10);
       return view('invoice.index',compact('datainvoice'));
    }

    public function create(): View
    {
        $reservasi = Reservasi::all();
        return view('invoice.create',compact('reservasi'));
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'deskripsi'         => 'required|min:1|:invoice,deskripsi',
            'status'            => 'required|min:1|:invoice,status',
            'tanggal'           => 'required|min:1|:invoice,tanggal',
            'besar_dp'          => 'required|min:1|:invoice,besar_dp',
            'id_reservasi'      => 'required|min:1|:invoice,id_reservasi',
         
        ]);

        invoice::create([
            'deskripsi'        => $request->deskripsi,
            'status'           => $request->status,
            'tanggal'          => $request->tanggal,
            'besar_dp'         => $request->besar_dp,
            'id_reservasi'     => $request->id_reservasi,
            

        ]);
        //redirect to index
        return redirect()->route('invoice.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $datainvoice = invoice::findOrFail($id);
        $reservasi = Reservasi::all();
        return view('invoice.edit', compact('datainvoice','reservassi'));
    }

    public function show(string $id): View
    {
        $invoice = invoice::findOrFail($id);

        return view('invoice.show', compact('invoice'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // dd($request->available_room);
        //validate form
        $request->validate([
            'deskripsi'         => 'required|min:1|:invoice,deskripsi',
            'status'            => 'required|min:1|:invoice,status',
            'tanggal'           => 'required|min:1|:invoice,tanggal',
            'besar_dp'          => 'required|min:1|:invoice,besar_dp',
            'id_reservasi'      => 'required|min:1|:invoice,id_reservasi',
         
        ]);
        
        $datainvoice = invoice::findOrFail($id);
        $datainvoice->update([
            'deskripsi'        => $request->deskripsi,
            'status'           => $request->status,
            'tanggal'          => $request->tanggal,
            'besar_dp'         => $request->besar_dp,
            'id_reservasi'     => $request->id_reservasi,
            ]);

        return redirect()->route('invoice.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $invoice = invoice::findOrFail($id);
        $invoice->delete();
        return redirect()->route('invoice.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
