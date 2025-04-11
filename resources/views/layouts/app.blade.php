<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise ERP | @yield('title')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3a0ca3;
            --accent-color: #4cc9f0;
            --sidebar-width: 260px;
            --topbar-height: 70px;
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #2d3748;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: linear-gradient(180deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding-top: 1rem;
            z-index: 1000;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
            transition: transform var(--transition-speed) ease;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            font-size: 1.25rem;
            font-weight: 600;
            color: white;
        }

        .sidebar-brand i {
            font-size: 1.5rem;
            margin-right: 0.75rem;
        }

        .sidebar-menu {
            padding: 0 0.5rem;
        }

        .sidebar-item {
            padding: 0.75rem 1rem;
            color: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            border-radius: 8px;
            margin: 0.25rem 0;
            transition: all var(--transition-speed) ease;
        }

        .sidebar-item i {
            width: 24px;
            text-align: center;
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        .sidebar-item:hover,
        .sidebar-item.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            text-decoration: none;
        }

        .sidebar-item.active {
            background-color: rgba(255, 255, 255, 0.2);
            font-weight: 500;
        }

        .sidebar-divider {
            height: 1px;
            background-color: rgba(255, 255, 255, 0.1);
            margin: 1rem 1.25rem;
        }

        /* Topbar Styles */
        .topbar {
            height: var(--topbar-height);
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            z-index: 900;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            transition: left var(--transition-speed) ease;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            padding: 2rem;
            flex: 1;
            transition: margin-left var(--transition-speed) ease;
        }

        /* Footer Styles */
        .main-footer {
            background-color: white;
            padding: 1.5rem;
            margin-left: var(--sidebar-width);
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
            transition: margin-left var(--transition-speed) ease;
        }

        .public-footer {
            background-color: white;
            padding: 1.5rem;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
            width: 100%;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            margin-bottom: 1.5rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            border-radius: 10px 10px 0 0 !important;
            padding: 1rem 1.5rem;
            font-weight: 500;
        }

        /* Button Styles */
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.5rem 1.25rem;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        /* Alert Styles */
        .alert {
            border-radius: 8px;
            border: none;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .topbar {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .main-footer {
                margin-left: 0;
            }
        }

        /* Login Page Styles */
        .auth-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 2rem;
        }

        .auth-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .auth-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .auth-body {
            padding: 2rem;
            background-color: white;
        }

        .hover-link-effect {
            display: inline-block;
            transition: transform 0.3s ease;
        }

        .hover-link-effect:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    @if (auth()->check())
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('home') }}" class="sidebar-brand">
            <i class="fas fa-cubes"></i>
            <span>Enterprise ERP</span>
        </a>

        <div class="sidebar-menu">
            <a href="{{ route('home') }}" class="sidebar-item {{ Request::is('/') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>

            <div class="sidebar-divider"></div>

            <a href="{{ route('clients.index') }}" class="sidebar-item {{ Request::is('clients*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <span>Clients</span>
            </a>

            <a href="{{ route('equipment.index') }}" class="sidebar-item {{ Request::is('equipment*') ? 'active' : '' }}">
                <i class="fas fa-server"></i>
                <span>Equipment</span>
            </a>

            <a href="{{ route('contracts.index') }}" class="sidebar-item {{ Request::is('contracts*') ? 'active' : '' }}">
                <i class="fas fa-file-contract"></i>
                <span>Contracts</span>
            </a>

            <a href="{{ route('maintenance-logs.index') }}" class="sidebar-item {{ Request::is('maintenance-logs*') ? 'active' : '' }}">
                <i class="fas fa-clipboard-check"></i>
                <span>Maintenance</span>
            </a>

            <div class="sidebar-divider"></div>

            <div class="dropdown">
                <a href="#" class="sidebar-item dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-user-cog"></i>
                    <span>Account</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('password.request') }}" class="dropdown-item">
                            <i class="fas fa-key me-2"></i> Reset Password
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Topbar -->
    <div class="topbar">
        <button class="btn btn-sm d-lg-none me-3" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <div class="ms-auto d-flex align-items-center">
            
            <div class="dropdown">
                <button class="btn dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=4361ee&color=fff"
                        alt="User" class="rounded-circle me-2" width="36">
                    <span>{{ auth()->user()->name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0">&copy; {{ date('Y') }} Enterprise ERP. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">v1.0.0</p>
                </div>
            </div>
        </div>
    </footer>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    @else
    <!-- Public Layout -->
    <div class="min-vh-100 d-flex flex-column">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-cubes me-2"></i> Enterprise ERP
                </a>
                <div class="ms-auto">
                    <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-light">Register</a>
                </div>
            </div>
        </nav>

        <main class="flex-grow-1 d-flex align-items-center">
            <div class="container">
                @yield('content')
            </div>
        </main>

        <footer class="public-footer">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="mb-0">&copy; {{ date('Y') }} Enterprise ERP. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p class="mb-0">v1.0.0</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });

        document.addEventListener('click', function(event) {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.getElementById('sidebarToggle');

            if (window.innerWidth < 992 &&
                !sidebar.contains(event.target) &&
                !toggleBtn.contains(event.target) &&
                sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });

        document.querySelectorAll('.sidebar-item').forEach(item => {
            if (item.href === window.location.href) {
                item.classList.add('active');
            }
        });
    </script>

    @stack('scripts')
</body>

</html>