<?php

namespace App\View\Components\dom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class modal extends Component
{
    public
    $name,
    $static,
    $class,
    $header;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $name,
        $static = null,
        $class = null,
        $header = null,
    )
    {
        $this->name = $name;
        $this->static = $static;
        $this->class = $class;
        $this->header = $header;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dom.modal');
    }
}
