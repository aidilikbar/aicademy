<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public $title;
    public $darkMode;

    public function __construct($title = 'AIcademy - Academic Paper Search', $darkMode = false)
    {
        $this->title = $title;
        $this->darkMode = $darkMode;
    }

    public function render()
    {
        return view('layouts.base');
    }
}
