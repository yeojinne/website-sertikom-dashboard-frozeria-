@extends('layouts.app')

@section('content')

<div class="main-box">

    <h1 class="fw-bold mb-4">
        Edit Kategori
    </h1>

    <form action="{{ route('kategori.update',$kategori->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label fw-semibold">
                Nama Kategori
            </label>

            <input type="text"
                   name="nama_kategori"
                   value="{{ old('nama_kategori',$kategori->nama_kategori) }}"
                   class="form-control"
                   required>

        </div>

        <div class="mb-4">

            <label class="form-label fw-semibold">
                Deskripsi
            </label>

            <textarea name="deskripsi"
                      rows="4"
                      class="form-control">{{ old('deskripsi',$kategori->deskripsi) }}</textarea>

        </div>

        <div class="d-flex gap-3">

             <a href="{{ route('kategori.index') }}"
       class="btn-cancel">
        <i class="bi bi-arrow-left-circle"></i>
        Kembali
    </a>

            <button type="submit"
                    class="btn btn-frozeria">

                <i class="bi bi-check-circle-fill me-2"></i>
                Simpan Perubahan

            </button>

        </div>

    </form>

</div>

@endsection