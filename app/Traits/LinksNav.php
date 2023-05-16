<?php

namespace App\Traits;

trait LinksNav
{
    public static function LinksPages()
    {
        return
        [
            [
                'name' => 'Welcome',
                'slug' => 'welcome',
                'type' => 'link',
                'route' => route('welcome'),
                'class' => 'nav-link',
                'active' => request()->routeIs('welcome') ? 'active disabled' : '',
                'icono' => '',
                'icono_color' => ''
            ],
            [
                'name' => 'About',
                'slug' => 'about',
                'type' => 'link',
                'route' => '',
                'class' => 'nav-link',
                'active' =>  '',
                'icono' => '',
                'icono_color' => ''
            ],
            [
                'name' => 'Courses',
                'slug' => 'courses',
                'type' => 'collapse',
                'position' => 'down',
                'route' => '#courses',
                'active' => '',
                'icono' => '',
                'icono_color' => '',
                'class' => 'nav-link',
                'items' => [
                    [
                        'name' => 'List Courses',
                        'href' => '#',
                    ],
                    [
                        'name' => 'Create Courses',
                        'href' => '#',
                    ],
                ]
            ],
            [
                'name' => 'Example',
                'slug' => 'example',
                'type' => 'dropdown',
                'position' => 'down',
                'route' => '',
                'active' => '',
                'icono' => '',
                'icono_color' => '',
                'class' => 'nav-link',
                'items' => [
                    [
                        'name' => 'List Example',
                        'href' => '#',
                    ],
                    [
                        'name' => 'Create Example',
                        'href' => '#',
                    ],
                ]
            ],
        ];
    }
    public static function LinksApp()
    {
        return
        [
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
    public static function LinksAuth()
    {
        return
        [
            [
                'name' => 'Sign In',
                'slug' => 'sign-in',
                'route' => request()->routeIs('welcome') ? '' : route('login'),
                'active' => request()->routeIs('login') ? 'active disabled' : '',
                'icono' => '',
                'icono_color' => '',
                'type' => request()->routeIs('welcome') ? 'modal' : 'link',
                'class' => 'nav-link'
            ],
            [
                'name' => 'Sign Up',
                'slug' => 'sign-up',
                'route' => request()->routeIs('welcome') ? '' : route('register'),
                'active' => request()->routeIs('register') ? 'active disabled' : '',
                'icono' => '',
                'icono_color' => '',
                'type' => request()->routeIs('welcome') ? 'modal' : 'link',
                'class' => 'nav-link'
            ],
        ];
    }
}
