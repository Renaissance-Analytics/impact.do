<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class XLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
       //dd('x');
        return view('components.layouts.x');
    }
}
