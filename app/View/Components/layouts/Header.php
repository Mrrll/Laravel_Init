<?php

namespace App\View\Components\layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Traits\LinksNav;

class Header extends Component
{
    use LinksNav;

    public
    $links_pages,
    $links_auths,
    $links_app;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links_pages = $this->LinksPages();
        $this->links_auths = $this->LinksAuth();
        $this->links_app = $this->LinksApp();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.header');
    }
}
