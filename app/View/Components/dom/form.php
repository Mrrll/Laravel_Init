<?php

namespace App\View\Components\dom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class form extends Component
{
    public
    $route,
    $method,
    $type;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $route,
        $method = 'GET',
        $type = 'multipart/form-data'
    )
    {
        $this->route = $route;
        $this->method = $method;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dom.form');
    }
}
