<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Hotel;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class HotelController extends Controller
{
    public function index(): View
    {
       $datahotel = hotel::latest()->paginate(10);
       return view('hotel.index',compact('datahotel'));
    }

    public function create(): View
    {
        $kamar = Kamar::all();
        return view('hotel.create',compact('kamar'));
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'harga'            => 'required|min:1|:hotel,harga',
            'available_room'   => 'required|min:1|:hotel,jenis_hotel',
            'id_kamar'         => 'required|min:1|:hotel,id_kamar',
         
        ]);

        hotel::create([
            'harga'            => $request->harga,
            'available_room'   => $request->available_room,
            'tanggal'          => $request->tanggal,
            'id_kamar'         => $request->id_kamar,
            

        ]);
        //redirect to index
        return redirect()->route('hotel.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $datahotel = hotel::findOrFail($id);
        $kamar = Kamar::all();
        return view('hotel.edit', compact('datahotel','kamar'));
    }

    public function show(string $id): View
    {
        $hotel = hotel::findOrFail($id);

        return view('hotel.show', compact('hotel'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // dd($request->available_room);
        //validate form
        $request->validate([
            'harga'            => 'required|min:1|:hotel,harga',
            'available_room'   => 'required|min:1|:hotel,jenis_hotel',
            'id_kamar'         => 'required|min:1|:hotel,id_kamar',
        ]);

        $datahotel = hotel::findOrFail($id);
        $datahotel->update([
            'harga'            => $request->harga,
            'available_room'   => $request->available_room,
            'tanggal'          => $request->tanggal,
            'id_kamar'         => $request->id_kamar,
            ]);

        return redirect()->route('hotel.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $hotel = hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->route('hotel.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
