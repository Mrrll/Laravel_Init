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
    $tooltip,
    $id,
    $position;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $type = 'button',
        $class = null,
        $route = null,
        $name = null,
        $tooltip = null,
        $id = null,
        $position = null,
    )
    {
        $this->type = $type;
        $this->class = $class;
        $this->route = $route;
        $this->name = $name;
        $this->tooltip = $tooltip;
        $this->id = $id;
        $this->position = $position;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dom.button');
    }
}
