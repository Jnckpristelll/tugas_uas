@extends('layouts.template')

@section('title', 'Edit Pemesanan')

@section('headline')
    Edit Data Pemesanan
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Edit Pemesanan</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/pemesanan/' . $pemesanan->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="id_pelanggan" class="form-label">Pilih Pelanggan</label>
                                <select name="id_pelanggan" id="id_pelanggan" class="form-select" required>
                                    <option value="">-- Pilih Pelanggan --</option>
                                    @foreach ($pelanggan as $p)
                                        <option value="{{ $p->id }}"
                                            {{ $pemesanan->id_pelanggan == $p->id ? 'selected' : '' }}>
                                            {{ $p->nama_pelanggan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ $pemesanan->tanggal }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="status_dp" class="form-label">Status DP</label>
                                <select class="form-select" id="status_dp" name="status_dp" required>
                                    <option value="sudah dibayar"
                                        {{ $pemesanan->status_dp == 'sudah dibayar' ? 'selected' : '' }}>Sudah Dibayar
                                    </option>
                                    <option value="belum dibayar"
                                        {{ $pemesanan->status_dp == 'belum dibayar' ? 'selected' : '' }}>Belum Dibayar
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="durasi_jam" class="form-label">Durasi (Jam)</label>
                                <input type="text" class="form-control" id="durasi_jam" name="durasi_jam"
                                    value="{{ $pemesanan->durasi_jam }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                                    value="{{ $pemesanan->jam_mulai }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"
                                    value="{{ $pemesanan->jam_selesai }}" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ url('/pemesanan') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
