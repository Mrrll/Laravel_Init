<?php

namespace App\View\Components\dom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
{
    public
    $type,
    $label,
    $name,
    $id,
    $placeholder,
    $readonly,
    $disabled,
    $class,
    $col,
    $rows,
    $value,
    $datarole;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $type = 'text',
        $label,
        $name,
        $id = null,
        $placeholder = null,
        $readonly = null,
        $disabled = null,
        $class = null,
        $col = '30',
        $rows = '10',
        $value = null,
        $datarole = null
    )
    {
        $this->type = $type;
        $this->label = $label;
        $this->name = $name;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->readonly = $readonly;
        $this->disabled = $disabled;
        $this->class = $class;
        $this->col = $col;
        $this->rows = $rows;
        $this->value = $value;
        $this->datarole = $datarole;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dom.input');
    }
}
