@extends('layouts.app')

@section('content')

<div class="help-container">

```
<!-- HERO -->
<div class="help-hero">

    <div class="hero-icon">
        <i class="bi bi-snow2"></i>
    </div>

    <h1>Frozeria Help Center</h1>

    <p>
        Sistem inventaris frozen food untuk membantu pengelolaan
        barang, stok, dan kategori secara cepat, mudah, dan efisien.
    </p>

</div>

<!-- FITUR -->
<div class="row g-4 mt-2">

    <div class="col-md-4">

        <div class="feature-card">

            <i class="bi bi-box-seam"></i>

            <h4>Barang</h4>

            <p>
                Mengelola data produk frozen food mulai dari nama barang,
                kategori, stok, satuan, harga jual, harga beli,
                hingga lokasi penyimpanan.
            </p>

        </div>

    </div>

    <div class="col-md-4">

        <div class="feature-card">

            <i class="bi bi-bar-chart-line"></i>

            <h4>Stok</h4>

            <p>
                Memperbarui jumlah stok barang sesuai kondisi terbaru
                agar data inventaris tetap akurat dan memudahkan
                pemantauan stok yang tersedia.
            </p>

        </div>

    </div>

    <div class="col-md-4">

        <div class="feature-card">

            <i class="bi bi-tags"></i>

            <h4>Kategori</h4>

            <p>
                Mengelompokkan produk berdasarkan jenisnya sehingga
                data barang menjadi lebih terstruktur dan proses
                pencarian dapat dilakukan lebih cepat.
            </p>

        </div>

    </div>

</div>

<!-- TENTANG -->
<div class="about-card">

    <h2>
        <i class="bi bi-info-circle-fill me-2"></i>
        Tentang Frozeria
    </h2>

    <p>
        Frozeria merupakan aplikasi inventaris berbasis web yang dibuat
        untuk membantu pengelolaan produk frozen food secara terstruktur.
        Sistem ini memudahkan pengguna dalam mencatat data barang,
        mengelola kategori, memantau stok, serta menjaga ketersediaan
        produk dengan lebih efektif.
    </p>

</div>

<!-- PROFIL DEVELOPER -->
<div class="developer-card">

    <img src="{{ asset('images/profile.png') }}"
         alt="Developer"
         class="developer-photo">

    <h2>Arya Furi Eka Saputra</h2>

    <span class="developer-role">
        Developer Frozeria
    </span>

    <div class="developer-info">

        <div>
            <i class="bi bi-person-badge"></i>
            <strong>NIM :</strong> 2331740023
        </div>

        <div>
            <i class="bi bi-mortarboard"></i>
            <strong>Kelas :</strong> III-B Teknologi Informasi
        </div>

        <div>
            <i class="bi bi-geo-alt"></i>
            <strong>Alamat :</strong> Lumajang, Jawa Timur
        </div>

        <div>
            <i class="bi bi-telephone"></i>
            <strong>No HP :</strong> 082132299230
        </div>

        <div>
            <i class="bi bi-envelope"></i>
            <strong>Email :</strong> aryafuri49@gmail.com
        </div>

    </div>

</div>
```

</div>

@endsection
