<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nomor = 1;
        $pelanggan = Pelanggan::all();
        return view('layouts.pelanggan.index',compact('pelanggan','nomor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // menampilkan form tambah
        return view('layouts.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // proses tambah
        $request->validate([
        'nama_pelanggan' => 'required',
        'no_hp' => 'required',
        'alamat_pelanggan' => 'required',
    ]);
        $pelanggan = new Pelanggan;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->alamat_pelanggan = $request->alamat_pelanggan;
        $pelanggan->save();

        return redirect('/pelanggan');
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
        $pelanggan = Pelanggan::find($id);
        return view('layouts.pelanggan.edit',compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // proses edit
        $pelanggan = Pelanggan::find($id);
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->alamat_pelanggan = $request->alamat_pelanggan;
        $pelanggan->save();


        return redirect('/pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // proses hapus
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect('/pelanggan')->with('success', 'Data berhasil dihapus');
    }
}
