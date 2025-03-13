<?php

namespace App\Http\Controllers;

use App\Services\SemanticScholarService;
use Illuminate\Http\Request;

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
        $results = $this->semanticScholarService->searchPapers($query);
        
        return view('search.results', compact('results', 'query'));
    }
}
