<?php

namespace App\View\Components\dom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class select extends Component
{
    public
    $label,
    $id,
    $name,
    $class,
    $onchange,
    $title;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $label = null,
        $id = null,
        $name,
        $class = null,
        $onchange = null,
        $title = 'Open this select menu'
        )
    {
        $this->label = $label;
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->onchange = $onchange;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dom.select');
    }
}
