<?php

namespace App\Traits;

use Illuminate\Support\Facades\Lang;

trait LinksNav
{
    public static function LinksPages()
    {
        return
        [
            [
                'name' => Lang::get('Welcome'),
                'slug' => 'welcome',
                'type' => 'link',
                'route' => route('welcome'),
                'class' => 'nav-link',
                'active' => request()->routeIs('welcome') ? 'active disabled' : '',
                'icono' => '',
                'icono_color' => ''
            ],
            [
                'name' => Lang::get('About'),
                'slug' => 'about',
                'type' => 'link',
                'route' => '',
                'class' => 'nav-link',
                'active' =>  '',
                'icono' => '',
                'icono_color' => ''
            ],
        ];
    }
    public static function LinksApp()
    {
        return
        [
            [
                'name' => Lang::get('Dashboard'),
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
                    'text' => 'App main dashboard'
                ]
            ],

        ];
    }
    public static function LinksAuth()
    {
        return
        [
            [
                'name' => Lang::get('Sign In'),
                'slug' => 'sign-in',
                'route' => request()->routeIs('welcome') ? '' : route('login'),
                'active' => request()->routeIs('login') ? 'active disabled' : '',
                'icono' => '',
                'icono_color' => '',
                'type' => request()->routeIs('welcome') ? 'modal' : 'link',
                'class' => 'nav-link'
            ],
            [
                'name' => Lang::get('Sign Up'),
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
