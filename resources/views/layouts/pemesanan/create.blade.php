@extends('layouts.template')

@section('title', 'Tambah Pemesanan')

@section('headline')
    Form Tambah Pemesanan
@endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Form Tambah Pemesanan</h3>
                    <a href="{{ url('/pemesanan') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/pemesanan') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                            <input type="number" name="id_pelanggan" id="id_pelanggan" class="form-control" placeholder="Masukkan ID pelanggan" required>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="status_dp" class="form-label">Status DP</label>
                            <select name="status_dp" id="status_dp" class="form-select" required>
                                <option value="" selected disabled>Pilih status</option>
                                <option value="sudah dibayar">Sudah Dibayar</option>
                                <option value="belum dibayar">Belum Dibayar</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="durasi_jam" class="form-label">Durasi (Jam)</label>
                            <input type="text" name="durasi_jam" id="durasi_jam" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="jam_mulai" class="form-label">Jam Mulai</label>
                            <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label for="jam_selesai" class="form-label">Jam Selesai</label>
                            <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah Pemesanan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
