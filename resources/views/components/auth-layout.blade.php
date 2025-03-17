<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        body.dark-mode {
            background-color: #121212;
            color: #f8f9fa;
        }
        .dark-mode .card {
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
        .dark-mode .form-control {
            background-color: #2d2d2d;
            color: #f8f9fa;
            border-color: #444;
        }
        .auth-container {
            max-width: 450px;
            margin: 50px auto;
        }
    </style>
    {{ $styles ?? '' }}
</head>
<body>
    <div class="header d-flex justify-content-between align-items-center px-3">
        <div>
            <a href="/" class="text-white text-decoration-none">AIcademy</a>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="darkModeToggle">
            <label class="form-check-label text-white" for="darkModeToggle">Dark Mode</label>
        </div>
    </div>

    <div class="auth-container">
        <div class="card shadow">
            <div class="card-body p-4">
                <h2 class="text-center mb-4">{{ $heading ?? 'Authentication' }}</h2>
                {{ $slot }}
            </div>
        </div>
    </div>

    <footer class="text-center py-4 mt-5">
        <div class="container">
            <p>&copy; {{ date('Y') }} AIcademy. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Dark mode toggle functionality
        const darkModeToggle = document.getElementById('darkModeToggle');
        const body = document.body;
        
        if (localStorage.getItem('darkMode') === 'enabled') {
            body.classList.add('dark-mode');
            darkModeToggle.checked = true;
        }
        
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
