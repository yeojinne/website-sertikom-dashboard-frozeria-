@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-5">

    <div>
        <h1 class="dashboard-title">
            Dashboard Frozeria
        </h1>

        <p class="dashboard-subtitle">
            Selamat datang, <strong>{{ Auth::user()->name }}</strong> 👋
        </p>
    </div>

    <a href="{{ route('barang.create') }}"
       class="btn btn-frozeria">
        <i class="bi bi-plus-circle-fill"></i>
        Tambah Barang
    </a>

</div>

<div class="row g-4 mb-4 dashboard-cards">

    <div class="col-md-3">
        <div class="frozeria-card card-barang">

            <div class="card-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            <div>
                <small>Total Barang</small>
                <div class="stat-number">
                    {{ $totalBarang }}
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-3">
        <a href="{{ route('kategori.index') }}"
        style="text-decoration:none;color:inherit;">
            <div class="frozeria-card card-kategori">
                <div class="card-icon">
                    <i class="bi bi-tags"></i>
                </div>
                <div>
                    <small>Total Kategori</small>
                    <div class="stat-number">
                        {{ $totalKategori }}
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('dashboard', ['status' => 'menipis']) }}"
        style="text-decoration:none;color:inherit;">
            <div class="frozeria-card card-menipis">
                <div class="card-icon">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>
                <div>
                    <small>Stok Menipis</small>
                    <div class="stat-number">
                        {{ $stokMenipis }}
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a href="{{ route('dashboard', ['status' => 'habis']) }}"
        style="text-decoration:none;color:inherit;">
            <div class="frozeria-card card-habis">
                <div class="card-icon">
                    <i class="bi bi-x-circle"></i>
                </div>
                <div>
                    <small>Stok Habis</small>
                    <div class="stat-number">
                        {{ $stokHabis }}
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>

<div class="main-box">
    @if(session('success'))

<div class="alert alert-success"
     id="success-alert">

    {{ session('success') }}

</div>

@endif
    {{-- SEARCH --}}
    <form method="GET"
      action="{{ route('dashboard') }}">

    <div class="row mb-4">

        <div class="col-md-7">

            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="form-control"
                   placeholder="Cari nama barang...">
        </div>

        <div class="col-md-3">
            <select name="kategori"
                    class="form-select">
                <option value="">
                    Semua Kategori
                </option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}"
                        {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit"
                    class="btn btn-frozeria w-100">

                <i class="bi bi-search"></i>
                Cari
            </button>
        </div>
    </div>
</form>

    {{-- TABLE --}}
    <table class="table align-middle">

        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Harga Jual</th>
                <th class="text-center" width="180">
                    Aksi
                </th>
            </tr>
        </thead>

        <tbody>

        @forelse($barangs as $barang)

            <tr>

                <td>
                    {{ $barang->nama_barang }}
                </td>

                <td>
                    <span class="badge-frozeria">
                        {{ $barang->kategori->nama_kategori }}
                    </span>
                </td>

                <td>
                    {{ $barang->stok }}
                </td>

                <td>
                    {{ $barang->satuan }}
                </td>

                <td>
                    Rp {{ number_format($barang->harga_jual,0,',','.') }}
                </td>

                <td class="text-center">

                    <div class="action-buttons">

                        <a href="{{ route('barang.show',$barang->id) }}"
                           class="btn btn-info btn-action">
                            <i class="bi bi-eye-fill"></i>
                        </a>

                        <a href="{{ route('barang.edit',$barang->id) }}"
                           class="btn btn-warning btn-action">
                            <i class="bi bi-pencil-fill"></i>
                        </a>

                        <form action="{{ route('barang.destroy',$barang->id) }}"
                            method="POST"
                            class="delete-form"
                            data-nama="{{ $barang->nama_barang }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-action">
                                <i class="bi bi-trash-fill"></i>
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="6"
                    class="text-center py-5">

                    Belum ada data barang

                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(e){
        e.preventDefault();
        let nama = form.dataset.nama;
        Swal.fire({
            title: 'Hapus Barang?',
            html: `
                Apakah Anda yakin ingin menghapus <b>${nama}</b>?
                <br><br>
                Data ini nantinya tidak akan tampil lagi di daftar barang.
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DC4C36',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if(result.isConfirmed){
                form.submit();
            }
        });
    });
});

</script>
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