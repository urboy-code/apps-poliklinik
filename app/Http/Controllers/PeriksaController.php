<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use App\Models\Periksa;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periksa = Periksa::all();
        $user_name = Auth::user()->name;
        return view('dokter.periksa.index', compact('periksa', 'user_name'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $haris = Hari::all();
        $status = Status::all();
        $user_name = Auth::user()->name;
        return view('dokter.periksa.create', compact('haris', 'status', 'user_name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'hari_id' => 'required|integer',
            'mulai' => 'required',
            'selesai'=>'required',
            'status_id' => 'required|integer',
        ]);

        $periksa = new Periksa();
        $periksa->nama = $request->nama;
        $periksa->hari_id = $request->hari_id;
        $periksa->mulai = $request->mulai;
        $periksa->selesai = $request->selesai;
        $periksa->status_id = $request->status_id;
        $periksa->save();

        return redirect()->route('jadwal_periksa.index');
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
        $periksa = Periksa::findOrFail($id);
        $haris = Hari::all();
        $status = Status::all();
        return view('dokter.periksa.edit', compact('periksa', 'haris', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'nama' => 'required',
            'hari_id' => 'required|integer',
            'mulai' => 'required',
            'selesai' => 'required',
            'status_id' => 'required|integer',
        ]);
        $periksa = Periksa::findOrFail($id);
        
        if($request->status_id == 1){
            Periksa::where('id', '!=', $id)->update(['status_id' => 2]);
        }
        
        $periksa->nama = $request->nama;
        $periksa->hari_id = $request->hari_id;
        $periksa->mulai = $request->mulai;
        $periksa->selesai = $request->selesai;
        $periksa->status_id = $request->status_id;
        $periksa->update(['status_id' => $request->status_id]);
        $periksa->save();



        return redirect()->route('jadwal_periksa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $periksa = Periksa::findOrFail($id);
        $periksa->delete();

        return redirect()->route('jadwal_periksa.index');
    }
}
