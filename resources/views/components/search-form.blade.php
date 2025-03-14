<div class="search-container">
    <h1 class="mb-4">Find Research Papers</h1>
    <form action="{{ route('search.results') }}" method="GET" class="d-flex">
        <input type="text" name="query" class="form-control me-2" placeholder="Enter a search term (e.g., blockchain)" value="{{ $query }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
