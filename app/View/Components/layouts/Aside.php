<?php

namespace App\View\Components\layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Aside extends Component
{
    public $links_pages;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->links_pages = [
            [
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'type' => 'link',
                'route' => route('dashboard'),
                'active' => request()->routeIs('dashboard') ? 'active disabled' : '',
                'icono' => view('components.images.dashboard.dashboard'),
                'icono_color' => '',
                'class' => 'link-menu',
                'tooltip' => [
                    'position' => 'right',
                    'class' => 'custom-tooltip',
                    'text' => 'App main panel'
                ]
            ],
            [
                'name' => 'Articles',
                'slug' => 'articles',
                'type' => 'dropdown',
                'route' => '',
                'active' => '',
                'icono' => view('components.images.dashboard.articles'),
                'icono_color' => '',
                'class' => 'link-menu',
                'items' => [
                    [
                        'name' => 'Articles',
                        'href' => '#',
                    ],
                    [
                        'name' => 'Create article',
                        'href' => '#',
                    ],
                    [
                        'name' => 'Categories',
                        'href' => '#',
                    ],
                    [
                        'name' => 'Create Category',
                        'href' => '#',
                    ],
                ]
            ],
            [
                'name' => 'Customers',
                'slug' => 'customers',
                'type' => 'dropdown',
                'route' => '',
                'active' => '',
                'icono' => view('components.images.dashboard.customers'),
                'icono_color' => '',
                'class' => 'link-menu',
                'items' => [
                    [
                        'name' => 'Customers',
                        'href' => '#',
                    ],
                    [
                        'name' => 'Create customer',
                        'href' => '#',
                    ],
                ]
            ],
            [
                'name' => 'Delivery notes',
                'slug' => 'delivery-notes',
                'type' => 'dropdown',
                'route' => '',
                'active' => '',
                'icono' => view('components.images.dashboard.delivery_notes'),
                'icono_color' => '',
                'class' => 'link-menu',
                'items' => [
                    [
                        'name' => 'Delivery notes',
                        'href' => '#',
                    ],
                    [
                        'name' => 'Create Delivery note',
                        'href' => '#',
                    ],
                ]
            ],
            [
                'name' => 'Invoice',
                'slug' => 'invoice',
                'type' => 'dropdown',
                'route' => '',
                'active' => '',
                'icono' => view('components.images.dashboard.invoice'),
                'icono_color' => '',
                'class' => 'link-menu',
                'items' => [
                    [
                        'name' => 'Invoice',
                        'href' => '#',
                    ],
                    [
                        'name' => 'Create Invoice',
                        'href' => '#',
                    ],
                ]
            ],

        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.aside');
    }
}
