<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat = Obat::all();
        return view('obat.obat', compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obat.createObat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kemasan' => 'required',
            'harga' => 'required|integer',
        ]);

        $dokter = new Obat();
        $dokter->nama = $request->nama;
        $dokter->kemasan = $request->kemasan;
        $dokter->harga = $request->harga;
        $dokter->save();

        return redirect()->route('obat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.editObat', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'kemasan' => 'required',
            'harga' => 'required|integer',
        ]);

        $dokter = Obat::findOrFail($id);
        $dokter->nama = $request->nama;
        $dokter->kemasan = $request->kemasan;
        $dokter->harga = $request->harga;
        $dokter->save();

        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect()->route('obat.index');
    }
}
