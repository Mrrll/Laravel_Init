<?php

namespace App\View\Components\dom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class button extends Component
{
    public
    $type,
    $class,
    $route,
    $name,
    $tooltip;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $type = 'button',
        $class = null,
        $route = null,
        $name = null,
        $tooltip = null
    )
    {
        $this->type = $type;
        $this->class = $class;
        $this->route = $route;
        $this->name = $name;
        $this->tooltip = $tooltip;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dom.button');
    }
}
