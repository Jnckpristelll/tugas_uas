@extends('layouts.template')

@section('title', 'Tambah Pembayaran')

@section('headline')
    Form Tambah Pembayaran
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Form Tambah Pembayaran</h3>
                        <a href="{{ url('/pembayaran') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/pembayaran') }}">
                            @csrf

                            {{-- <div class="mb-3">
                            <label for="id_pemesanan" class="form-label">ID Pemesanan</label>
                            <input type="number" name="id_pemesanan" id="id_pemesanan" class="form-control" placeholder="Masukkan ID Pemesanan" required>
                        </div> --}}

                            <div class="mb-3">
                                <label for="id_pemesanan" class="form-label">Pilih Pemesanan</label>
                                <select name="id_pemesanan" id="id_pemesanan" class="form-select" required>
                                    <option value="">-- Pilih Pemesanan --</option>
                                    @foreach ($pemesanan as $p)
                                        <option value="{{ $p->id }}">
                                            {{ $p->id }} - {{ $p->tanggal }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tgl_pembayaran" class="form-label">Tanggal Pembayaran</label>
                                <input type="date" name="tgl_pembayaran" id="tgl_pembayaran" class="form-control"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                                <select name="status_pembayaran" id="status_pembayaran" class="form-select" required>
                                    <option value="" selected disabled>Pilih status</option>
                                    <option value="lunas">Lunas</option>
                                    <option value="pending">Pending</option>

                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Tambah Pembayaran
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
