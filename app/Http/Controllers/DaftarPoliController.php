<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\Pasien;
use App\Models\Periksa;
use App\Models\Poli;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DaftarPoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftar = Daftar::all();
        return view('pasienLayout.poli.index', compact('daftar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $now = Carbon::now();
        $thnBulan = $now->year . $now->month;
        $cek = Daftar::count();
        if ($cek == 0) {
            $urut = 10000001;
            $nomer = 'PL' . $thnBulan . $urut;
            // dd($nomer);
        } else {
            // echo 'asdasd';
            $ambil = Daftar::all()->last();
            $urut = (int)substr($ambil->rm, -8) + 1;
            $nomer = 'PL' . $thnBulan . $urut;
        }
        $polis = Poli::all();
        $jadwals = Periksa::all();
        $pasiens = Pasien::all();
        return view('pasienLayout.poli.create', compact('polis', 'jadwals', 'nomer', 'pasiens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rm' => 'required',
            'pasien_id' => 'required',
            'poli_id' => 'required',
            'jadwal_id' => 'required',
            'keterangan' => 'required',
        ]);

        $daftar = new Daftar();
        $daftar->rm = $request->rm;
        $daftar->pasien_id = $request->pasien_id;
        $daftar->poli_id = $request->poli_id;
        $daftar->jadwal_id = $request->jadwal_id;
        $daftar->keterangan = $request->keterangan;
        $daftar->save();

        return redirect()->route('daftarPoli.index');
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
        $now = Carbon::now();
        $thnBulan = $now->year . $now->month;
        $cek = Daftar::count();
        if ($cek == 0) {
            $urut = 10000001;
            $nomer = 'PL' . $thnBulan . $urut;
            // dd($nomer);
        } else {
            // echo 'asdasd';
            $ambil = Daftar::all()->last();
            $urut = (int)substr($ambil->rm, -8) + 1;
            $nomer = 'PL' . $thnBulan . $urut;
        }
        $daftar = Daftar::findOrFail($id);
        $polis = Poli::all();
        $jadwals = Periksa::all(); 
        return view ('pasienLayout.poli.edit', compact('daftar', 'nomer', 'polis', 'jadwals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'rm' => 'required',
            'poli_id' => 'required',
            'jadwal_id' => 'required',
            'keterangan' => 'required',
        ]);

        $daftar = Daftar::findOrFail($id);
        $daftar->rm = $request->rm;
        $daftar->poli_id = $request->poli_id;
        $daftar->jadwal_id = $request->jadwal_id;
        $daftar->keterangan = $request->keterangan;
        $daftar->save();

        return redirect()->route('daftarPoli.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $daftar = Daftar::findOrFail($id);
        $daftar->delete();

        return redirect()->route('daftarPoli.index');
    }
}
