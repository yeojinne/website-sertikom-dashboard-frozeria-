@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h1 class="dashboard-title mb-0">
            Data Kategori
        </h1>

        <p class="dashboard-subtitle">
            Kelola kategori produk frozen food
        </p>

    </div>

    <a href="{{ route('kategori.create') }}"
       class="btn btn-frozeria">

        <i class="bi bi-plus-lg"></i>
        Tambah Kategori

    </a>

</div>

@if(session('success'))

<div class="alert alert-success"
     id="success-alert">

    {{ session('success') }}

</div>

@endif

<div class="main-box">

    <div class="mb-4">
<form action="{{ route('kategori.index') }}"
      method="GET">

    <div class="row mb-4 justify-content-start">

    <div class="col-md-4">

        <input type="text"
               name="search"
               class="form-control"
               placeholder="Cari kategori..."
               value="{{ request('search') }}">

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

    </div>

    <table class="table align-middle">

        <thead>

            <tr>

                <th width="70">
                    No
                </th>

                <th width="300">
                    Nama Kategori
                </th>

                <th width="180">
                    Jumlah Barang
                </th>

                <th width="180">
                    Dibuat
                </th>

                <th width="180"
                    class="text-center">
                    Aksi
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($kategoris as $kategori)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>

                    <span class="badge-frozeria">
                        {{ $kategori->nama_kategori }}
                    </span>

                </td>

                <td>
                    {{ $kategori->barangs_count }} Barang
                </td>

                <td>
                    {{ $kategori->created_at->format('d M Y') }}
                </td>

                <td class="text-center">

    <div class="action-buttons">

        <a href="{{ route('kategori.edit',$kategori->id) }}"
           class="btn btn-warning btn-action">
            <i class="bi bi-pencil-fill"></i>
        </a>

       <form action="{{ route('kategori.destroy',$kategori->id) }}"
            method="POST"
            class="delete-form"
            data-nama="{{ $kategori->nama_kategori }}">

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

                <td colspan="5"
                    class="text-center py-5">

                    Belum ada data kategori

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    <div class="text-muted mt-3">

        {{ $kategoris->count() }} kategori terdaftar

    </div>

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

<script>
document.querySelectorAll('.delete-form').forEach(form => {

    form.addEventListener('submit', function(e){

        e.preventDefault();

        let nama = form.dataset.nama;

        Swal.fire({
            title: 'Hapus Kategori?',
            html: `
                Apakah Anda yakin ingin menghapus kategori <b>${nama}</b>?
                <br><br>
                Kategori ini nantinya tidak akan tampil lagi di daftar kategori.
            `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DC4C36',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            borderRadius: '20px'
        }).then((result) => {
            if(result.isConfirmed){
                form.submit();
            }
        });
    });
});
</script>

@endsection