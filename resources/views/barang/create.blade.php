@extends('layouts.app')

@section('content')

<div class="main-box">

<h1 class="mb-4 fw-bold">
    Tambah Barang
</h1>

<form action="{{ route('barang.store') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@if ($errors->any())

<div class="alert alert-danger text-center"
     id="error-alert">

    <i class="bi bi-exclamation-circle-fill me-2"></i>

    Lengkapi semua data yang wajib diisi!

</div>

@endif

<div class="mb-4">

    <label class="form-label fw-semibold">
        Foto Barang
    </label>

    <div class="preview-wrapper">

        <img id="previewFoto"
             src="https://placehold.co/250x180?text=Foto+Barang"
             alt="Preview Foto">

    </div>

    <input type="file"
           name="foto"
           id="foto"
           class="form-control"
           accept="image/*">

    <small class="text-muted d-block mt-2">
        JPG, PNG • Maksimal 2MB
    </small>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

    <label class="form-label fw-semibold">
        Nama Barang
    </label>

        <input type="text"
            name="nama_barang"
            class="form-control @error('nama_barang') is-invalid @enderror"
            placeholder="Contoh: Ayam Nugget Crispy"
            value="{{ old('nama_barang') }}"
            required>

        @error('nama_barang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label fw-semibold">
            Kategori
        </label>

        <select name="kategori_id"
        class="form-select @error('kategori_id') is-invalid @enderror"
        required>

    <option value="">Pilih Kategori</option>

    @foreach($kategoris as $kategori)
        <option value="{{ $kategori->id }}"
            {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
            {{ $kategori->nama_kategori }}
        </option>
    @endforeach

</select>

@error('kategori_id')
<div class="invalid-feedback">
    {{ $message }}
</div>
@enderror

    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label fw-semibold">
            Jumlah Stok
        </label>

       <input type="number"
       name="stok"
       class="form-control @error('stok') is-invalid @enderror"
       placeholder="Contoh: 120"
       value="{{ old('stok') }}">

        @error('stok')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label fw-semibold">
            Stok Minimum
        </label>

        <input type="number"
       name="stok_minimum"
       class="form-control @error('stok_minimum') is-invalid @enderror"
       placeholder="Contoh: 20"
       value="{{ old('stok_minimum') }}">

            @error('stok_minimum')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label fw-semibold">
            Satuan
        </label>

        <input type="text"
               name="satuan"
               class="form-control @error('satuan') is-invalid @enderror"
               value="{{ old('satuan') }}"
               placeholder="Contoh: kg, pack, box"
               required>

        @error('satuan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label fw-semibold">
            Berat / Ukuran
        </label>

        <input type="text"
               name="berat"
               class="form-control @error('berat') is-invalid @enderror"
               placeholder="Contoh: 500 gram"
               value="{{ old('berat') }}">

        @error('berat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label fw-semibold">
            Harga Jual
        </label>

        <input type="number"
       name="harga_jual"
       class="form-control @error('harga_jual') is-invalid @enderror"
       placeholder="Contoh: 35000"
       value="{{ old('harga_jual') }}">

        @error('harga_jual')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label fw-semibold">
            Harga Beli
        </label>

        <input type="number"
       name="harga_beli"
       class="form-control @error('harga_beli') is-invalid @enderror"
       placeholder="Contoh: 28000"
       value="{{ old('harga_beli') }}">

        @error('harga_beli')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

    </div>

</div>

<div class="mb-3">

    <label class="form-label fw-semibold">
        Lokasi Simpan
    </label>

    <input type="text"
       name="lokasi_simpan"
       class="form-control @error('lokasi_simpan') is-invalid @enderror"
       placeholder="Contoh: Rak A-3"
       value="{{ old('lokasi_simpan') }}">

        @error('lokasi_simpan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

</div>

<div class="mb-4">

    <label class="form-label fw-semibold">
        Deskripsi
    </label>

    <textarea name="deskripsi"
          rows="4"
          class="form-control @error('deskripsi') is-invalid @enderror"
          placeholder="Masukkan deskripsi barang...">{{ old('deskripsi') }}</textarea>

        @error('deskripsi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror

</div>

<div class="d-flex justify-content-end gap-3">

    <a href="{{ route('dashboard') }}"
       class="btn-cancel">

        <i class="bi bi-arrow-left-circle"></i>
        Batal

    </a>

    <button type="submit"
            class="btn btn-frozeria">

        <i class="bi bi-check-circle-fill me-2"></i>
        Simpan Barang

    </button>

</div>

</form>

</div>

<script>

document.getElementById('foto').addEventListener('change',function(e){

    const file = e.target.files[0];

    if(file){

        const reader = new FileReader();

        reader.onload = function(event){

            document.getElementById('previewFoto').src =
                event.target.result;

        }

        reader.readAsDataURL(file);

    }

});

</script>
<script>

document.addEventListener('DOMContentLoaded', function(){

    const errorBox =
        document.getElementById('error-alert');

    if(errorBox){

        setTimeout(function(){

            errorBox.style.transition =
                'all .5s ease';

            errorBox.style.opacity = '0';

            setTimeout(function(){

                errorBox.remove();

            },500);

        },3000);

    }

});

</script>

@endsection