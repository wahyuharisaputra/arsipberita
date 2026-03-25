@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Kategori Berita</h3>
    <button class="btn btn-primary px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#addKategoriModal"><i class="bi bi-plus-lg me-1"></i> Tambah Kategori</button>
</div>

<div class="row">
    <div class="col-md-8 col-lg-6">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body p-4">
                @if(session('success'))
                    <div class="alert alert-success border-0 bg-success text-white rounded-3 shadow-sm d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-2 fs-5"></i> {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger rounded-3">
                        <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $errors->first() }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="text-muted small">
                            <tr>
                                <th class="border-0 pb-3" width="10%">No</th>
                                <th class="border-0 pb-3">Label Kategori</th>
                                <th class="border-0 pb-3 text-end" width="25%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="border-top-0">
                            @foreach($kategoris as $kategori)
                            <tr>
                                <td class="py-3 text-muted">{{ $loop->iteration }}</td>
                                <td class="py-3 fw-bold text-primary">{{ $kategori->nama_kategori }}</td>
                                <td class="py-3 text-end">
                                    <button class="btn btn-light btn-sm text-primary border shadow-sm" data-bs-toggle="modal" data-bs-target="#editKategoriModal{{ $kategori->id }}"><i class="bi bi-pencil-square"></i></button>
                                    <form action="{{ url('admin/kategori/'.$kategori->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Peringatan: Kategori ini akan dihapus permanen. Lanjutkan?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light btn-sm text-danger border shadow-sm"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modals -->
@foreach($kategoris as $kategori)
<div class="modal fade" id="editKategoriModal{{ $kategori->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ url('admin/kategori/'.$kategori->id) }}" method="POST" class="w-100">
            @csrf
            @method('PUT')
            <div class="modal-content border-0 shadow" style="border-radius: 16px;">
                <div class="modal-header border-bottom-0 pb-0 mt-2 px-4">
                    <h5 class="modal-title fw-bold">Edit Kategori</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 pt-3 pb-4">
                    <div>
                        <label class="form-label fw-semibold text-secondary small text-uppercase">Nama Kategori Baru</label>
                        <input type="text" name="nama_kategori" class="form-control form-control-lg bg-light border-0" value="{{ $kategori->nama_kategori }}" required>
                    </div>
                </div>
                <div class="modal-footer border-top-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 fw-bold">Update Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

<!-- Add Modal -->
<div class="modal fade" id="addKategoriModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ url('admin/kategori') }}" method="POST" class="w-100">
            @csrf
            <div class="modal-content border-0 shadow" style="border-radius: 16px;">
                <div class="modal-header border-bottom-0 pb-0 mt-2 px-4">
                    <h5 class="modal-title fw-bold">Tambah Kategori Baru</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4 pt-3 pb-4">
                    <div>
                        <label class="form-label fw-semibold text-secondary small text-uppercase">Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control form-control-lg bg-light border-0" placeholder="Misal: Hiburan, Politik..." required>
                    </div>
                </div>
                <div class="modal-footer border-top-0 px-4 pb-4 pt-0">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4 fw-bold">Simpan Kategori</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
