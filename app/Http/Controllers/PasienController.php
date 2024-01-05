<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasien = Pasien::all();
        
        return view('pasien.pasien', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.createPasien');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'ktp' => 'required|integer',
            'hp' => 'required|integer',
        ]);

        $pasien = new Pasien();
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->ktp = $request->ktp;
        $pasien->hp = $request->hp;
        $pasien->save();

        return redirect()->route('pasien.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.editPasien', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'ktp' => 'required|integer',
            'hp' => 'required|integer',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->ktp = $request->ktp;
        $pasien->hp = $request->hp;
        $pasien->save();

        return redirect()->route('pasien.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('pasien.index');
    }
}
