@if(isset($results) && $results->count() > 0)
    <div class="results-container">
        <h2>Search Results for: {{ $query }}</h2>
        <div class="list-group">
            @foreach($results as $paper)
                <div class="result-item">
                    <h5>{{ $paper['title'] ?? 'No title' }}</h5>
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
            @endforeach
        </div>
        
        <div class="mt-4">
            {{ $results->links() }}
        </div>
    </div>
@elseif(isset($results) && $results->count() == 0)
    <div class="alert alert-info">No results found for "{{ $query }}". Try different keywords.</div>
@elseif(isset($error))
    <div class="alert alert-danger">{{ $error }}</div>
@endif
