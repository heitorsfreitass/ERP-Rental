<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise ERP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>
<body>
    <!-- Navigation Bar -->
    @if (auth()->check())
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">Enterprise ERP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('clients.index') }}">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('equipment.index') }}">Equipment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contracts.index') }}">Contracts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('maintenance-logs.index') }}">Maintenance Logs</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @else
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif

    <!-- Content Section -->
    <div class="container my-4">
        @yield('content')
    </div>

    <!-- Footer Section -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2025 Enterprise ERP. All Rights Reserved.</p>
            <p>
                <a href="#" class="text-white">Privacy Policy</a> |
                <a href="#" class="text-white">Terms of Service</a>
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>