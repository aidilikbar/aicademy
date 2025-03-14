<?php

namespace App\Http\Controllers;

use App\Services\SemanticScholarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class SearchController extends Controller
{
    protected $semanticScholarService;
    
    public function __construct(SemanticScholarService $semanticScholarService)
    {
        $this->semanticScholarService = $semanticScholarService;
    }
    
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
                'limit' => 10
            ]);
            
            $results = $response->json();
            
            // Save search history if user is authenticated
            if (auth()->check()) {
                SearchHistory::create([
                    'user_id' => auth()->id(),
                    'query' => $query
                ]);
            }
            
            return view('search.index', compact('results', 'query'));
        } catch (\Exception $e) {
            return view('search.index', [
                'query' => $query,
                'error' => 'An error occurred while fetching results. Please try again later.'
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
}
