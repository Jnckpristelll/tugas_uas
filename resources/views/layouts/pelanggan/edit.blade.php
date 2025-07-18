@extends('layouts.template')

@section('title', 'Edit Pelanggan')

@section('headline')
    Edit Data Pelanggan
@endsection

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Edit Pelanggan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/pelanggan/' . $pelanggan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama_pelanggan" value="{{ $pelanggan->nama_pelanggan }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_handphone" class="form-label">No Handphone</label>
                            <input type="text" class="form-control" id="no_handphone" name="no_hp" value="{{ $pelanggan->no_hp }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_tim" class="form-label">Nama Tim</label>
                            <textarea class="form-control" id="nama_tim" name="nama_tim" rows="3" required>{{ $pelanggan->nama_tim }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/pelanggan') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
