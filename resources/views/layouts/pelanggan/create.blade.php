@extends('layouts.template')

@section('title', 'Tambah Pelanggan')

@section('headline')
    Form Tambah Pelanggan
@endsection




@section('content')
    <div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Form Tambah Pelanggan</h3>
                        <a href="{{ url('/pelanggan') }}" class="btn btn-secondary btn-sm">Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{ url('/pelanggan') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" name="nama_pelanggan" class="form-control" id="nama"
                                        placeholder="Masukkan Nama" required>
                                </div>

                                <div class="mb-3">
                                    <label for="no_handphone" class="form-label">No Handphone</label>
                                    <input type="text" name="no_hp" class="form-control" id="no_handphone"
                                        placeholder="08xxxxx" required>
                                </div>

                                <div class="mb-4">
                                    <label for="nama_tim" class="form-label">Nama Tim</label>
                                    <textarea name="nama_tim" class="form-control" id="nama_tim" rows="3" placeholder="Masukkan Nama Tim"
                                        required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
