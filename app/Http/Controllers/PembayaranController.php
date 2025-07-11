<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nomor = 1;
        $pembayaran = Pembayaran::all();
        return view('layouts.pembayaran.index',compact('pembayaran','nomor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('layouts.pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'id_pemesanan' => 'required|integer',
        'tgl_pembayaran' => 'required|date',
        'status_pembayaran' => 'required|in:pending,lunas',
    ]);

    // Simpan data pembayaran
        $pembayaran = new Pembayaran;
        $pembayaran->id_pemesanan = $request->id_pemesanan;
        $pembayaran->tgl_pembayaran = $request->tgl_pembayaran;
        $pembayaran->status_pembayaran = $request->status_pembayaran;
        $pembayaran->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect('/pembayaran')->with('success', 'Data pembayaran berhasil ditambahkan.');
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
        $pembayaran = Pembayaran::find($id);
        return view('layouts.pembayaran.edit',compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->id_pemesanan = $request->id_pemesanan;
        $pembayaran->tgl_pembayaran = $request->tgl_pembayaran;
        $pembayaran->status_pembayaran = $request->status_pembayaran;
        $pembayaran->save();

return redirect('/pembayaran')->with('success', 'Data pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect('/pembayaran')->with('success', 'Data berhasil dihapus');
    }
}
