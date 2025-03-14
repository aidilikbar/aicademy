<x-layout title="Search History - AIcademy" :dark-mode="session('dark_mode', false)">
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
</x-layout>
