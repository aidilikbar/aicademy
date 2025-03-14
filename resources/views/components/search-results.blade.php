@if(isset($results))
<div class="results-container">
    <h2>Search Results for: {{ $query }}</h2>
    <div class="list-group">
        @forelse($results['data'] ?? [] as $paper)
            <div class="result-item">
                <h5>{{ $paper['title'] }}</h5>
                <div class="mb-2">
                    <span class="text-muted">
                        {{ collect($paper['authors'] ?? [])->pluck('name')->implode(', ') }}
                    </span>
                </div>
                <p>{{ Str::limit($paper['abstract'] ?? 'No abstract available', 150) }}</p>
                <div class="d-flex gap-2">
                    @if(isset($paper['url']))
                        <a href="{{ $paper['url'] }}" class="btn btn-sm btn-primary" target="_blank">View Paper</a>
                    @endif
                    @if(isset($paper['openAccessPdf']['url']))
                        <a href="{{ $paper['openAccessPdf']['url'] }}" class="btn btn-sm btn-success" target="_blank">PDF</a>
                    @endif
                </div>
            </div>
        @empty
            <div class="alert alert-info">No results found for "{{ $query }}". Try different keywords.</div>
        @endforelse
    </div>
</div>
@endif
