<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KamarController extends Controller
{
    public function index(): View
    {
       $datakamar = kamar::latest()->paginate(10);
       return view('kamar.index',compact('datakamar'));
    }

    public function create(): View
    {
        return view('kamar.create');
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'nama_kamar'       => 'required|min:2|:kamar,nama_kamar',
            'jenis_kamar'      => 'required|min:2|:kamar,jenis_kamar',
            'ukuran_kamar'     => 'required|min:2|:kamar,ukuran_kamar',
            'harga'            => 'required|min:2|:kamar,harga',
        ]);

        kamar::create([
            'nama_kamar'      => $request->nama_kamar,
            'jenis_kamar'     => $request->jenis_kamar,
            'ukuran_kamar'    => $request->ukuran_kamar,
            'harga'           => $request->harga,
            

        ]);
        //redirect to index
        return redirect()->route('kamar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $datakamar = kamar::findOrFail($id);
        return view('kamar.edit', compact('datakamar'));
    }

    public function show(string $id): View
    {
        $kamar = kamar::findOrFail($id);

        return view('kamar.show', compact('kamar'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_kamar'       => 'required|min:2|:kamar,nama_kamar',
            'jenis_kamar'      => 'required|min:2|:kamar,jenis_kamar',
            'ukuran_kamar'     => 'required|min:2|:kamar,ukuran_kamar',
            'harga'            => 'required|min:2|:kamar,harga',
        ]);

        $datakamar = kamar::findOrFail($id);
        $datakamar->update([
            'nama_kamar'      => $request->nama_kamar,
            'jenis_kamar'     => $request->jenis_kamar,
            'ukuran_kamar'    => $request->ukuran_kamar,
            'harga'           => $request->harga,
            ]);

        return redirect()->route('kamar.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $kamar = kamar::findOrFail($id);
        $kamar->delete();
        return redirect()->route('kamar.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
