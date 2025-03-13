<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIcademy - Search History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include the same CSS as in index.blade.php -->
</head>
<body>
    <div class="header d-flex justify-content-between align-items-center px-3">
        <div>Academic Paper Search</div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="darkModeToggle">
            <label class="form-check-label text-white" for="darkModeToggle">Dark Mode</label>
        </div>
    </div>

    <div class="container mt-5">
        <h1>Your Search History</h1>
        
        <a href="{{ route('home') }}" class="btn btn-primary mb-4">Back to Search</a>
        
        <div class="list-group">
            @forelse($history as $item)
                <a href="{{ route('search.results', ['query' => $item->query]) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $item->query }}</h5>
                        <small>{{ $item->created_at->diffForHumans() }}</small>
                    </div>
                </a>
            @empty
                <div class="alert alert-info">No search history found.</div>
            @endforelse
        </div>
        
        <div class="mt-4">
            {{ $history->links() }}
        </div>
    </div>
    
    <!-- Include the same dark mode script as in index.blade.php -->
</body>
</html>
