<!DOCTYPE html>
<html>
<head>
    <title>Frozeria</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet"
          href="{{ asset('css/frozeria.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow">

    <div class="container">

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <i class="bi bi-snow me-2"></i>
            Frozeria
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <div class="navbar-nav">

                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                   href="{{ route('dashboard') }}">
                    <i class="bi bi-house-door-fill me-2"></i>
                    Dashboard
                </a>

                <a class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}"
                   href="{{ route('kategori.index') }}">
                    <i class="bi bi-tags-fill me-2"></i>
                    Kategori
                </a>
                <a class="nav-link {{ request()->routeIs('bantuan') ? 'active' : '' }}"
                     href="{{ route('bantuan') }}">
                    <i class="bi bi-question-circle-fill me-2"></i>
                    Bantuan
                </a>

            </div>

            <div class="ms-auto">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="btn btn-danger">
                        <i class="bi bi-box-arrow-right me-1"></i>
                        Logout
                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>

<div class="container py-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>