<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SearchForm extends Component
{
    public $query;

    public function __construct($query = '')
    {
        $this->query = $query;
    }

    public function render()
    {
        return view('components.search-form');
    }
}
