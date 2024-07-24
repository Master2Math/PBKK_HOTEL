<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Reservasi;
use App\Models\Hotel;
use App\Models\Customer;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class ReservasiController extends Controller
{
    public function index(): View
    {
        $hotel = Hotel::all();
        $customer = Customer::all();
        $kamar = Kamar::all();
       $datareservasi = reservasi::latest()->paginate(10);
    //    dd($customer);
       return view('reservasi.index',compact('datareservasi','hotel','customer','kamar'));
    }

    public function create(): View
    {
        $reservasi = Reservasi::all();
        $hotel = Hotel::all();
        $customer = Customer::all();
        $kamar = Kamar::all();
        
        return view('reservasi.create',compact('reservasi','hotel','customer','kamar'));
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'customer_id'         => 'required|min:1|:reservasi,customer_id',
            'tanggal'             => 'required|min:1|:reservasi,tanggal',
            'tanggal_mulai'       => 'required|min:1|:reservasi,tanggal_mulai',
            'tanggal_akhir'       => 'required|min:1|:reservasi,tanggal_akhir',
            'id_hotel'            => 'required|min:1|:reservasi,id_hotel',


         
        ]);

        reservasi::create([
            'customer_id'         => $request->customer_id,
            'tanggal'             => $request->tanggal,
            'tanggal_mulai'       => $request->tanggal_mulai,
            'tanggal_akhir'       => $request->tanggal_akhir,
            'id_hotel'            => $request->id_hotel,

            

        ]);
        //redirect to index
        return redirect()->route('reservasi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $datareservasi = reservasi::findOrFail($id);
        $reservasi = Reservasi::all();
        $hotel = Hotel::all();
        $customer = Customer::all();
        $kamar = Kamar::all();
        return view('reservasi.edit', compact('datareservasi','kamar','hotel','customer','kamar'));
    }

    public function show(string $id): View
    {
        $reservasi = reservasi::findOrFail($id);

        return view('reservasi.show', compact('reservasi'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // dd($request->available_room);
        //validate form
        $request->validate([
            'customer_id'         => 'required|min:1|:reservasi,customer_id',
            'tanggal'             => 'required|min:1|:reservasi,tanggal',
            'tanggal_mulai'       => 'required|min:1|:reservasi,tanggal_mulai',
            'tanggal_akhir'       => 'required|min:1|:reservasi,tanggal_akhir',
            'id_hotel'            => 'required|min:1|:reservasi,id_hotel',
        ]);

        $datareservasi = reservasi::findOrFail($id);
        $datareservasi->update([
            'customer_id'         => $request->customer_id,
            'tanggal'             => $request->tanggal,
            'tanggal_mulai'       => $request->tanggal_mulai,
            'tanggal_akhir'       => $request->tanggal_akhir,
            'id_hotel'            => $request->id_hotel,
            ]);

        return redirect()->route('reservasi.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $reservasi = reservasi::findOrFail($id);
        $reservasi->delete();
        return redirect()->route('reservasi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

