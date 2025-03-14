<x-layout :title="isset($query) ? 'Search results for: ' . $query : 'AIcademy - Academic Paper Search'" :dark-mode="session('dark_mode', false)">
    <x-search-form :query="$query ?? ''" />
    
    <x-search-results :results="$results ?? null" :query="$query ?? ''" />
</x-layout>
