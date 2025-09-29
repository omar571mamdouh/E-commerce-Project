<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Commerce')</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
            transition: background 0.3s, color 0.3s;
        }

        body.dark-mode {
            background-color: #121212;
            color: #f8f9fa;
        }

        main {
            flex: 1;
        }

        .navbar {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Navbar Font Styling */
        .navbar-brand {
            font-weight: 700 !important;
            font-size: 1.5rem !important;
            letter-spacing: 0.5px;
        }

        .navbar-nav .nav-link {
            font-weight: 600 !important;
            font-size: 1rem !important;
            letter-spacing: 0.3px;
        }

        .navbar-nav .nav-link:hover {
            font-weight: 700 !important;
        }

        footer {
            background: linear-gradient(135deg, #343a40 0%, #495057 100%);
            color: #fff;
            padding: 30px 0;
            margin-top: auto;
        }

        /* Sidebar */
        #sidebar {
            position: fixed;
            left: -250px;
            top: 0;
            width: 250px;
            height: 100%;
            background: #212529;
            color: #fff;
            transition: left 0.3s;
            padding: 20px;
            z-index: 1050;
        }

        #sidebar.active {
            left: 0;
        }

        #sidebar h4 {
            color: #ffc107;
        }

        #sidebar button {
            margin-top: 20px;
        }

        #sidebarToggle {
            position: fixed;
            left: 15px;
            bottom: 15px;
            z-index: 1100;
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand">
                <i class="bi bi-shop text-warning"></i> E-Shop
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ url('/products') }}">
                            <i class="bi bi-basket me-1"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('cart*') ? 'active' : '' }}" href="{{ url('/cart') }}">
                            <i class="bi bi-cart me-1"></i> Cart
                            @if(session('cart') && count(session('cart')) > 0)
                            <span class="badge bg-danger rounded-pill">{{ count(session('cart')) }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('payment*') ? 'active' : '' }}" href="{{ url('/payment') }}">
                            <i class="bi bi-credit-card me-1"></i> Payment
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('register*') ? 'active' : '' }}" href="{{ url('/register') }}">
                            <i class="bi bi-person-plus"></i> Register
                        </a>
                    </li>

                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Main Content --}}
    <main class="py-4">
        <div class="container">
            {{-- Flash Messages --}}
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0">
                        <i class="bi bi-c-circle text-warning me-1"></i>
                        {{ date('Y') }} E-Shop. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        // Dark/Light toggle
        document.getElementById('modeToggle').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            this.innerHTML = document.body.classList.contains('dark-mode') ?
                '<i class="bi bi-sun"></i> Light Mode' :
                '<i class="bi bi-moon"></i> Dark Mode';
        });
    </script>
</body>

</html>