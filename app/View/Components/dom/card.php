<?php

namespace App\View\Components\dom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
    public
    $header,
    $footer,
    $class;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $header = null,
        $footer = null,
        $class = null
    )
    {
        $this->header = $header;
        $this->footer = $footer;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dom.card');
    }
}
