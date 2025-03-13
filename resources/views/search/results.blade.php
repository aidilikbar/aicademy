<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Results for: ') . $query }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('search.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    New Search
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($results['data'] ?? [] as $paper)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h3 class="text-lg font-bold mb-2">{{ $paper['title'] }}</h3>
                            
                            <div class="mb-2">
                                <span class="font-semibold">Authors:</span>
                                {{ collect($paper['authors'] ?? [])->pluck('name')->implode(', ') }}
                            </div>
                            
                            <p class="text-gray-700 mb-4">{{ Str::limit($paper['abstract'] ?? 'No abstract available', 150) }}</p>
                            
                            @if(isset($paper['openAccessPdf']['url']))
                                <a href="{{ $paper['openAccessPdf']['url'] }}" target="_blank" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded text-sm">
                                    PDF Available
                                </a>
                            @endif
                            
                            @if(isset($paper['url']))
                                <a href="{{ $paper['url'] }}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded text-sm ml-2">
                                    View Paper
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200 text-center">
                            No results found for "{{ $query }}". Try different keywords.
                        </div>
                    </div>
                @endforelse
            </div>
            
            <!-- Add pagination here if needed -->
        </div>
    </div>
</x-app-layout>
