<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polis = Poli::all();
        return view('poli.poli', compact('polis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli.createPoli');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        $dokter = new Poli();
        $dokter->nama = $request->nama;
        $dokter->keterangan = $request->keterangan;
        $dokter->save();

        return redirect()->route('poli.index');
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
        $poli = Poli::findOrFail($id);
        return view('poli.editPoli', compact('poli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        $dokter = Poli::findOrFail($id);
        $dokter->nama = $request->nama;
        $dokter->keterangan = $request->keterangan;
        $dokter->save();

        return redirect()->route('poli.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poli = Poli::findOrFail($id);
        $poli->delete();

        return redirect()->route('poli.index');
    }
}
