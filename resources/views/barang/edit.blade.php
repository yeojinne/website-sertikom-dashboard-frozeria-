@extends('layouts.app')

@section('content')

<div class="main-box">
    @if(session('success'))

<div class="alert alert-success"
     id="success-alert">

    {{ session('success') }}

</div>

@endif

<h1 class="fw-bold mb-4">
    Edit Barang
</h1>

<form action="{{ route('barang.update',$barang->id) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="mb-4">

    <label class="form-label fw-semibold">
        Foto Barang
    </label>

    <input type="file"
           name="foto"
           class="form-control">

    @if($barang->foto)
    <div class="mt-3">

        <img src="{{ asset('storage/'.$barang->foto) }}"
             class="img-thumbnail rounded"
             width="150">

    </div>
    @endif

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label fw-semibold">
            Nama Barang
        </label>

        <input type="text"
               name="nama_barang"
               class="form-control"
               value="{{ old('nama_barang',$barang->nama_barang) }}"
               required>

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label fw-semibold">
            Kategori
        </label>

        <select name="kategori_id"
                class="form-select"
                required>

            @foreach($kategoris as $kategori)

            <option value="{{ $kategori->id }}"
                {{ $barang->kategori_id == $kategori->id ? 'selected' : '' }}>

                {{ $kategori->nama_kategori }}

            </option>

            @endforeach

        </select>

    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label fw-semibold">
            Jumlah Stok
        </label>

        <input type="number"
               name="stok"
               class="form-control"
               value="{{ old('stok',$barang->stok) }}">

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label fw-semibold">
            Stok Minimum
        </label>

        <input type="number"
               name="stok_minimum"
               class="form-control"
               value="{{ old('stok_minimum',$barang->stok_minimum) }}">

    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">

<label class="form-label fw-semibold">
    Satuan
</label>

<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label fw-semibold">
            Satuan
        </label>

        <input type="text"
               name="satuan"
               class="form-control @error('satuan') is-invalid @enderror"
               value="{{ old('satuan', $barang->satuan) }}"
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
               value="{{ old('berat', $barang->berat) }}"
               placeholder="Contoh: 500 gram">

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
               class="form-control"
               value="{{ old('harga_jual',$barang->harga_jual) }}">

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label fw-semibold">
            Harga Beli
        </label>

        <input type="number"
               name="harga_beli"
               class="form-control"
               value="{{ old('harga_beli',$barang->harga_beli) }}">

    </div>

</div>

<div class="mb-3">

    <label class="form-label fw-semibold">
        Lokasi Simpan
    </label>

    <input type="text"
           name="lokasi_simpan"
           class="form-control"
           value="{{ old('lokasi_simpan',$barang->lokasi_simpan) }}">

</div>

<div class="mb-4">

    <label class="form-label fw-semibold">
        Deskripsi
    </label>

    <textarea name="deskripsi"
              rows="4"
              class="form-control">{{ old('deskripsi',$barang->deskripsi) }}</textarea>

</div>

<div class="d-flex gap-3">

   <a href="{{ route('dashboard') }}"
   class="btn-back-modern text-decoration-none">
    <i class="bi bi-x-circle"></i>
    Batal
</a>

    <button type="submit"
            class="btn btn-frozeria">
        <i class="bi bi-save-fill me-2"></i>
        Simpan Perubahan
    </button>

</div>

</form>

</div>
<script>

document.addEventListener('DOMContentLoaded', function(){

    const alertBox =
        document.getElementById('success-alert');

    if(alertBox){

        setTimeout(function(){

            alertBox.style.transition =
                'all .5s ease';

            alertBox.style.opacity = '0';

            setTimeout(function(){

                alertBox.remove();

            },500);

        },5000);

    }

});

</script>

@endsection