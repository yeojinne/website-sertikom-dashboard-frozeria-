@extends('layouts.app')

@section('content')

<div class="main-box">

<h3 class="fw-bold mb-4">
    Tambah Kategori
</h3>

<form action="{{ route('kategori.store') }}" method="POST">
@csrf

<div class="mb-4">

    <label class="form-label fw-semibold">
        Nama Kategori <span class="text-danger">*</span>
    </label>

    <input type="text"
           name="nama_kategori"
           class="form-control"
           placeholder="Contoh: Ayam"
           required>

</div>

<div class="mb-4">

    <label class="form-label fw-semibold">
        Deskripsi (Opsional)
    </label>

    <textarea name="deskripsi"
              class="form-control"
              rows="4"
              placeholder="Contoh: Produk olahan ayam beku"></textarea>

</div>

<div class="d-flex justify-content-end gap-3">

    <a href="{{ route('kategori.index') }}"
       class="btn-cancel">
        <i class="bi bi-arrow-left-circle"></i>
        Kembali
    </a>

    <button type="submit"
            class="btn btn-frozeria">
        <i class="bi bi-check-circle-fill me-2"></i>
        Simpan Kategori
    </button>

</div>

</form>

</div>

@endsection