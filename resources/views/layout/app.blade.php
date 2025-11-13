<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            width: 240px;
            background: #0d6efd;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }
        .sidebar .brand {
            text-align: center;
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .sidebar .nav-link {
            color: white;
            font-weight: 500;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.2);
            border-radius: 8px;
        }

        /* Top Navbar */
        .top-navbar {
            margin-left: 240px;
            height: 60px;
            background: #fff;
            border-bottom: 1px solid #ddd;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .top-navbar .search-box input {
            border-radius: 20px;
            padding-left: 35px;
        }
        .top-navbar .search-box .bi-search {
            position: absolute;
            left: 10px;
            top: 8px;
            color: #777;
        }

        /* Main content */
        .main-content {
            margin-left: 240px;
            padding: 20px;
            padding-bottom: 70px; /* space for sticky footer */
        }

        .container-content {
            background-color: #fff;
            padding: 25px;
            border-radius: 12px;
            color: #212529;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        /* Footer */
        .footer {
            position: fixed;
            bottom: 0;
            left: 240px;
            width: calc(100% - 240px);
            background-color: #fff;
            border-top: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            font-size: 14px;
            color: #555;
        }
        .footer span {
            font-weight: 600;
            color: #0d6efd;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="brand">⚡ Admin Panel</div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index') }}"><i class="bi bi-box"></i> Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sell.index') }}"><i class="bi bi-cash-coin"></i> Sale</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('sales.index') }}"><i class="bi bi-bar-chart-line"></i> Sales</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.stockEntries') }}"><i class="bi bi-archive"></i> Store</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('posts.index') }}"><i class="bi bi-journal-text"></i> Blog</a>
        </li>
        <li class="nav-item mt-3">
            <a class="nav-link" href="{{ route('profile.edit') }}"><i class="bi bi-gear"></i> Profile Settings</a>
        </li>
    </ul>
</div>

<!-- Top Navbar -->
<div class="top-navbar">
    <div class="d-flex align-items-center">
        <div class="position-relative search-box me-3">
            <i class="bi bi-search"></i>
            <input type="text" class="form-control form-control-sm" placeholder="Search...">
        </div>
    </div>
    <div class="d-flex align-items-center">
        <a href="#" class="btn btn-sm btn-light me-2"><i class="bi bi-bell"></i></a>
        @auth
            <span class="me-3">👤 {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button class="btn btn-sm btn-danger">Logout</button>
            </form>
        @endauth
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container-content">
        @yield('content')
    </div>
</div>

<!-- Footer -->
<div class="footer">
    Made ❤️ by <span>Ahmed Refaat Abohamama</span>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
