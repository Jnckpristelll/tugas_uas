@extends('layouts.template')

@section('title', 'Edit Pembayaran')

@section('headline')
    Edit Data Pembayaran
@endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Edit Pembayaran</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/pembayaran/' . $pembayaran->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="id_pemesanan" class="form-label">ID Pemesanan</label>
                            <input type="number" class="form-control" id="id_pemesanan" name="id_pemesanan"
                                value="{{ $pembayaran->id_pemesanan }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="tgl_pembayaran" class="form-label">Tanggal Pembayaran</label>
                            <input type="date" class="form-control" id="tgl_pembayaran" name="tgl_pembayaran"
                                value="{{ $pembayaran->tgl_pembayaran }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status Pembayaran</label>
                            <select class="form-select" name="status" id="status" required>
                                <option disabled selected>Pilih Status</option>
                                <option value="pending" {{ $pembayaran->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="berhasil" {{ $pembayaran->status == 'berhasil' ? 'selected' : '' }}>Berhasil</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/pembayaran') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
