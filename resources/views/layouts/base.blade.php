<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        body.dark-mode {
            background-color: #121212;
            color: #f8f9fa;
        }
        .dark-mode .card, .dark-mode .result-item {
            background-color: #2d2d2d;
            color: #f8f9fa;
            border-color: #444;
        }
        .header {
            background-color: #0d6efd;
            color: white;
            padding: 15px 0;
        }
        .dark-mode .header {
            background-color: #0a58ca;
        }
        .search-container {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }
        .results-container {
            max-width: 800px;
            margin: 30px auto;
        }
        .result-item {
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
        }
        .dark-mode .result-item {
            border-bottom: 1px solid #444;
        }
        .result-item:hover {
            background-color: #f8f9fa;
        }
        .dark-mode .result-item:hover {
            background-color: #3d3d3d;
        }
        .dark-mode .form-control {
            background-color: #2d2d2d;
            color: #f8f9fa;
            border-color: #444;
        }
    </style>
    
    {{ $styles ?? '' }}
</head>
<body class="{{ $darkMode ? 'dark-mode' : '' }}">
    <div class="header d-flex justify-content-between align-items-center px-3">
        <div>
            <a href="{{ route('home') }}" class="text-white text-decoration-none">
                <i class="fas fa-graduation-cap me-2"></i>AIcademy
            </a>
        </div>
        <div class="d-flex align-items-center">
            <div class="form-check form-switch px-3">
                <input class="form-check-input" type="checkbox" id="darkModeToggle" {{ $darkMode ? 'checked' : '' }}>
                <label class="form-check-label text-white" for="darkModeToggle">Dark Mode</label>
            </div>
            @auth
                <a href="{{ route('search.history') }}" class="text-white me-3">History</a>
                <form method="POST" action="{{ route('logout') }}" class="me-3">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-white me-3">Login</a>
                <a href="{{ route('register') }}" class="text-white me-3">Register</a>
            @endauth
        </div>
    </div>

    <main>
        {{ $slot }}
    </main>

    <footer class="text-center py-4 mt-5">
        <div class="container">
            <p>&copy; {{ date('Y') }} AIcademy. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Dark mode toggle functionality
        const darkModeToggle = document.getElementById('darkModeToggle');
        const body = document.body;
        
        darkModeToggle.addEventListener('change', () => {
            if (darkModeToggle.checked) {
                body.classList.add('dark-mode');
                localStorage.setItem('darkMode', 'enabled');
            } else {
                body.classList.remove('dark-mode');
                localStorage.setItem('darkMode', 'disabled');
            }
        });
    </script>
    
    {{ $scripts ?? '' }}
</body>
</html>
