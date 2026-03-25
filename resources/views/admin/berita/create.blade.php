@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Tambah Berita</h3>
    <a href="{{ url('admin/berita') }}" class="btn btn-light border shadow-sm px-4"><i class="bi bi-arrow-left me-1"></i> Kembali</a>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="card-body p-4 p-md-5">
        @if($errors->any())
            <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger rounded-3 mb-4">
                <div class="d-flex align-items-center mb-2 fw-bold"><i class="bi bi-exclamation-triangle-fill me-2"></i> Terdapat Kesalahan:</div>
                <ul class="mb-0 small">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('admin/berita') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary small text-uppercase" style="letter-spacing: 1px;">Judul Artikel <span class="text-danger">*</span></label>
                        <input type="text" name="judul" class="form-control form-control-lg bg-light border-0" value="{{ old('judul') }}" placeholder="Masukkan judul yang menarik..." required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary small text-uppercase" style="letter-spacing: 1px;">Isi Konten Berita <span class="text-danger">*</span></label>
                        <textarea name="isi_berita" class="form-control bg-light border-0" rows="12" placeholder="Tuliskan isi berita di sini..." required style="resize: none;">{{ old('isi_berita') }}</textarea>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="p-4 bg-light rounded-4 border-0 mb-4">
                        <h6 class="fw-bold mb-3"><i class="bi bi-info-circle text-primary me-2"></i> Detail Publikasi</h6>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small text-uppercase">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori_id" class="form-select border-0 shadow-sm" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small text-uppercase">Penulis <span class="text-danger">*</span></label>
                            <input type="text" name="penulis" class="form-control border-0 shadow-sm" value="{{ old('penulis') }}" placeholder="Nama Penulis" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small text-uppercase">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal_berita" class="form-control border-0 shadow-sm" value="{{ old('tanggal_berita', date('Y-m-d')) }}" required>
                        </div>
                    </div>

                    <div class="p-4 bg-light rounded-4 border-0 mb-4">
                        <h6 class="fw-bold mb-3"><i class="bi bi-image text-primary me-2"></i> Gambar Cover</h6>
                        <div class="mb-2">
                            <input type="file" name="gambar" class="form-control border-0 shadow-sm" accept="image/*">
                            <div class="form-text small mt-2">Format: JPG, PNG. Rekomendasi 16:9.</div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4 text-muted">

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm" style="border-radius: 8px;">
                    <i class="bi bi-cloud-arrow-up me-2"></i> Simpan Terbitkan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
