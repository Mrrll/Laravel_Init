<?php

namespace App\View\Components\messages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class alert extends Component
{
    public $clases;
    /**
     * Create a new component instance.
     */
    public function __construct($type = 'info'  )
    {
        switch ($type) {
         case 'info':
             $clases = 'alert-info';
             break;
         case 'success':
             $clases = 'alert-success';
             break;
         case 'warning':
             $clases = 'alert-warning';
             break;
         case 'danger':
             $clases = 'alert-danger';
             break;
         default:
             # code...
             break;
        }
        $this->clases = $clases;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.messages.alert');
    }
}
