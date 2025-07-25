@extends('layouts.template')

@section('title', 'Pembayaran')

@section('headline')
    Data Pembayaran
@endsection

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">Daftar Pembayaran</h2>
                        <a href="{{ url('/pembayaran/create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus me-1"></i> Tambah Data
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped align-middle text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Main</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pembayaran as $data)
                                        <tr>
                                            <td>{{ $nomor++ }}</td>
                                            {{-- <td>{{ $data->pemesanan->tanggal }}</td> --}}
                                            <td>{{ optional($data->pemesanan)->tanggal ?? '-' }}</td>

                                            {{-- <td>
                                                @if ($data->pemesanan)
                                                    {{ $data->pemesanan->tanggal }}
                                                @else
                                                    <span class="text-muted">Belum ada</span>
                                                @endif
                                            </td> --}}

                                            <td>{{ $data->tgl_pembayaran }}</td>
                                            <td>
                                                @if ($data->status_pembayaran == 'lunas')
                                                    <span class="badge bg-success">{{ $data->status_pembayaran }}</span>
                                                @else
                                                    <span
                                                        class="badge bg-warning text-dark">{{ $data->status_pembayaran }}</span>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="btn-group" role="group">
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ url('/pembayaran/edit/' . $data->id) }}"
                                                        class="btn btn-outline-info btn-sm" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <!-- Tombol Hapus -->
                                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalHapus{{ $data->id }}" title="Hapus">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>

                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="modalHapus{{ $data->id }}" tabindex="-1"
                                                    aria-labelledby="modalLabel{{ $data->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <form action="{{ url('/pembayaran/' . $data->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="modalLabel{{ $data->id }}">
                                                                        Konfirmasi Hapus
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Yakin ingin menghapus data pembayaran ini?
                                                                    <strong>{{ $data->id_pemesanan }}</strong>?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Data tidak tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- /.table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
