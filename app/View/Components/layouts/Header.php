<?php

namespace App\View\Components\layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public
    $links_pages,
    $links_auths,
    $links_pages_auths;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links_pages = [
            [
                'name' => 'Welcome',
                'route' => '',
                'active' => '',
                'icono' => '',
                'icono_color' => ''
            ],
            [
                'name' => 'About',
                'route' => '',
                'active' =>  '',
                'icono' => '',
                'icono_color' => ''
            ],
        ];
        $this->links_pages_auths = [
            [
                'name' => 'Home',
                'route' => '',
                'active' => '',
                'icono' => '',
                'icono_color' => ''
            ],
        ];
        $this->links_auths = [
            [
                'name' => 'Sign In',
                'route' => '',
                'active' => '',
                'icono' => '',
                'icono_color' => ''
            ],
            [
                'name' => 'Sign Up',
                'route' => '',
                'active' => '',
                'icono' => '',
                'icono_color' => ''
            ],
    ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.header');
    }
}
