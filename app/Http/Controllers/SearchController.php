<?php

namespace App\Http\Controllers;

use App\Models\SearchHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    protected $baseUrl = 'https://api.semanticscholar.org/graph/v1';

    public function index()
    {
        return view('search.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        if (empty($query)) {
            return view('search.index');
        }
        
        try {
            $response = Http::get("{$this->baseUrl}/paper/search/bulk", [
                'query' => $query,
                'fields' => 'title,authors,abstract,url,openAccessPdf',
                'limit' => 100 // Get more results to paginate client-side
            ]);
            
            $apiResults = $response->json();
            
            // Check if results exist and have data
            if (!isset($apiResults['data'])) {
                return view('search.index', [
                    'query' => $query,
                    'error' => 'No results found or unexpected API response format.'
                ]);
            }
            
            // Convert API results to collection and paginate
            $resultsCollection = collect($apiResults['data']);
            $results = new \Illuminate\Pagination\LengthAwarePaginator(
                $resultsCollection->forPage($request->get('page', 1), 10),
                $resultsCollection->count(),
                10,
                $request->get('page', 1),
                ['path' => $request->url(), 'query' => $request->query()]
            );
            
            return view('search.index', compact('results', 'query'));
        } catch (\Exception $e) {
            return view('search.index', [
                'query' => $query,
                'error' => 'An error occurred while fetching results: ' . $e->getMessage()
            ]);
        }
    }
    
    public function history()
    {
        $history = SearchHistory::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('search.history', compact('history'));
    }
    
    public function toggleDarkMode(Request $request)
    {
        $darkMode = !session('dark_mode', false);
        session(['dark_mode' => $darkMode]);
        
        return back();
    }
}
