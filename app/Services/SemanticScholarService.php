<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SemanticScholarService
{
    protected $baseUrl = 'https://api.semanticscholar.org/graph/v1';
    
    public function searchPapers($query)
    {
        $response = Http::get("{$this->baseUrl}/paper/search/bulk", [
            'query' => $query,
            'fields' => 'title,authors,abstract,url,openAccessPdf'
        ]);
        
        return $response->json();
    }
}
