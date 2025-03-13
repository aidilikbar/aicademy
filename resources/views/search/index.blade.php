<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIcademy - Academic Paper Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            cursor: pointer;
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
        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }
        .dark-mode .form-control {
            background-color: #2d2d2d;
            color: #f8f9fa;
            border-color: #444;
        }
        .dark-mode .form-control:focus {
            border-color: #0a58ca;
        }
    </style>
</head>
<body>
    <div class="header d-flex justify-content-between align-items-center px-3">
        <div>Academic Paper Search</div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="darkModeToggle">
            <label class="form-check-label text-white" for="darkModeToggle">Dark Mode</label>
        </div>
    </div>

    <div class="search-container">
        <h1 class="mb-4">Find Research Papers</h1>
        <form action="{{ route('search.results') }}" method="GET" class="d-flex">
            <input type="text" name="query" class="form-control me-2" placeholder="Enter a search term" value="{{ $query ?? '' }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    @if(isset($results))
    <div class="results-container">
        <h2>Search Results</h2>
        <div class="list-group">
            @forelse($results['data'] ?? [] as $paper)
                <div class="result-item">
                    <h5>{{ $paper['title'] }}</h5>
                    <p>{{ Str::limit($paper['abstract'] ?? 'No abstract available', 150) }}</p>
                    @if(isset($paper['url']))
                        <a href="{{ $paper['url'] }}" class="btn btn-sm btn-primary" target="_blank">View Paper</a>
                    @endif
                    @if(isset($paper['openAccessPdf']['url']))
                        <a href="{{ $paper['openAccessPdf']['url'] }}" class="btn btn-sm btn-success" target="_blank">PDF</a>
                    @endif
                </div>
            @empty
                <div class="alert alert-info">No results found for "{{ $query }}". Try different keywords.</div>
            @endforelse
        </div>
    </div>
    @endif

    <script>
        // Dark mode toggle functionality
        const darkModeToggle = document.getElementById('darkModeToggle');
        const body = document.body;
        
        // Check for saved dark mode preference
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
</body>
</html>
