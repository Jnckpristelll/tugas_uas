<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Pelanggan;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nomor = 1;
        $pemesanan = Pemesanan::all();
        return view('layouts.pemesanan.index',compact('pemesanan','nomor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('layouts.pemesanan.create');

        $pelanggan = Pelanggan::all(); // Untuk dropdown pelanggan
        return view('layouts.pemesanan.create', compact('pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'id_pelanggan' => 'required',
        'tanggal' => 'required|date',
        'status_dp' => 'required|in:sudah dibayar,belum dibayar',
        'durasi_jam' => 'required|string',
        'jam_mulai' => 'required|date_format:H:i',
        'jam_selesai' => 'required|date_format:H:i',
    ]);

    // Proses simpan data
            $pemesanan = new Pemesanan;
            $pemesanan->id_pelanggan = $request->id_pelanggan;
            $pemesanan->tanggal = $request->tanggal;
            $pemesanan->status_dp = $request->status_dp;
            $pemesanan->durasi_jam = $request->durasi_jam;
            $pemesanan->jam_mulai = $request->jam_mulai;
            $pemesanan->jam_selesai = $request->jam_selesai;
            $pemesanan->save();

    // Redirect dengan pesan sukses
    return redirect('/pemesanan')->with('success', 'Data pemesanan berhasil ditambahkan.');
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
        //
        $pelanggan = Pelanggan::all();
        $pemesanan = Pemesanan::find($id);
        return view('layouts.pemesanan.edit',compact('pemesanan', 'pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->id_pelanggan = $request->id_pelanggan;
        $pemesanan->tanggal = $request->tanggal;
        $pemesanan->status_dp = $request->status_dp;
        $pemesanan->durasi_jam = $request->durasi_jam;
        $pemesanan->jam_mulai = $request->jam_mulai;
        $pemesanan->jam_selesai = $request->jam_selesai;
        $pemesanan->save();

    return redirect('/pemesanan')->with('success', 'Data pemesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan ->delete();
        return redirect('/pemesanan')->with('success', 'Data berhasil dihapus');

    }
}
