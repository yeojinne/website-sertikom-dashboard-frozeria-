@extends('layouts.app')

@section('content')

<div class="main-box">

<div class="d-flex justify-content-between align-items-center mb-4">

    <a href="{{ route('dashboard') }}"
       class="btn-back">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>

</div>

<div class="row mb-4">

    <div class="col-md-3">

        <div class="detail-image">

            @if($barang->foto)
                <img src="{{ asset('storage/'.$barang->foto) }}"
                     class="img-fluid rounded"
                     alt="{{ $barang->nama_barang }}">
            @else
                <img src="https://placehold.co/300x300"
                     class="img-fluid rounded"
                     alt="Foto Barang">
            @endif

        </div>

    </div>

    <div class="col-md-9">

        <h2 class="fw-bold mb-2">
            {{ $barang->nama_barang }}
        </h2>

        <span class="badge-frozeria">
            {{ $barang->kategori->nama_kategori }}
        </span>

    </div>

</div>

<div class="row g-3 mb-3">

    <div class="col-md-6">
        <div class="detail-card">
            <small>Jumlah Stok</small>
            <h5>{{ $barang->stok }} {{ $barang->satuan }}</h5>
        </div>
    </div>

    <div class="col-md-6">
        <div class="detail-card">
            <small>Stok Minimum</small>
            <h5>{{ $barang->stok_minimum }} {{ $barang->satuan }}</h5>
        </div>
    </div>

</div>

<div class="row g-3 mb-3">

    <div class="col-md-6">
        <div class="detail-card">
            <small>Harga Jual</small>
            <h5>
                Rp {{ number_format($barang->harga_jual,0,',','.') }}
            </h5>
        </div>
    </div>

    <div class="col-md-6">
        <div class="detail-card">
            <small>Harga Beli</small>
            <h5>
                Rp {{ number_format($barang->harga_beli,0,',','.') }}
            </h5>
        </div>
    </div>

</div>

<div class="row g-3 mb-3">

    <div class="col-md-6">
        <div class="detail-card">
            <small>Berat / Ukuran</small>
            <h5>{{ $barang->berat }}</h5>
        </div>
    </div>

    <div class="col-md-6">
        <div class="detail-card">
            <small>Lokasi Simpan</small>
            <h5>{{ $barang->lokasi_simpan }}</h5>
        </div>
    </div>

</div>

<div class="detail-card">

    <small>Deskripsi</small>

    <p class="mb-0 mt-2">
        {{ $barang->deskripsi }}
    </p>

</div>

</div>

@endsection