<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchResults extends Component
{
    public $results;
    public $query;

    public function __construct($results = null, $query = '')
    {
        $this->results = $results;
        $this->query = $query;
    }

    public function render()
    {
        return view('components.search-results');
    }
}
