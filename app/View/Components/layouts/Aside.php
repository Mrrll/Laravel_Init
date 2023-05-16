<?php

namespace App\View\Components\layouts;

use App\Traits\LinksNav;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Aside extends Component
{
    use LinksNav;

    public $links_pages;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links_pages = $this->LinksApp();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.aside');
    }
}
