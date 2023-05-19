<header class="bg-body header-dashboard">
    <nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
        <div class="container-fluid">
            @auth
                @if (auth()->user()->setting && auth()->user()->setting->image->first())
                    <img src="{{asset(auth()->user()->setting->image->first()->url)}}" width="48" height="48">
                @else
                    <x-images.logo></x-images.logo>
                @endif
            @endauth
            @guest
                <x-images.logo></x-images.logo>
            @endguest
            <a class="navbar-brand ms-2">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-flex-lg justify-content-lg-between" id="navbarNav">
                <ul class="navbar-nav">
                    <hr class="hidden-lg">
                    @guest
                        @foreach ($links_pages as $link_page)
                            <li
                                @if ($link_page['type'] == 'dropdown')
                                    class="drop{{$link_page['position']}}"
                                    @elseif ($link_page['type'] == 'collapse')
                                    class="drop{{$link_page['position']}} dropdown-parent"
                                @endif
                                >
                                @if ($link_page['type'] == 'collapse' || $link_page['type'] == 'dropdown')
                                    <x-dom.button
                                    type="{{ $link_page['type']}}"
                                    class="{{$link_page['class']}} {{$link_page['active']}} dropdown-toggle"
                                    name="{{$link_page['slug']}}"
                                    >
                                        <i class="{{ $link_page['icono'] }}"
                                            style="color: {{ $link_page['icono_color'] }};">
                                        </i>
                                        {{ $link_page['name'] }}
                                    </x-dom.button>
                                    <ul class="{{$link_page['type'] == 'collapse' ? 'collapse' : ''}} dropdown-child dropdown-menu mt-2-5" id="{{$link_page['slug']}}">
                                        @foreach ($link_page['items'] as $item)
                                            <li>
                                                <a class="dropdown-item" href="{{$item['href']}}">
                                                    {{$item['name']}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <x-dom.button
                                    type="{{ $link_page['type']}}"
                                    class="{{$link_page['class']}} {{$link_page['active']}}"
                                    name="{{$link_page['slug']}}"
                                    >
                                        <i class="{{ $link_page['icono'] }}"
                                            style="color: {{ $link_page['icono_color'] }};">
                                        </i>
                                        {{ $link_page['name'] }}
                                    </x-dom.button>
                                @endif
                            </li>
                        @endforeach
                    @endguest
                    @auth
                        @foreach ($links_app as $link_app)
                            <li
                            @if ($link_app['type'] == 'dropdown' || $link_app['type'] == 'collapse')
                                class="drop{{$link_app['position']}} dropdown-parent nav-item d-lg-none"
                            @else
                                class="nav-item d-lg-none"
                            @endif
                            >
                            @if ($link_app['type'] == 'collapse' || $link_app['type'] == 'dropdown')
                                <x-dom.button
                                type="{{ $link_app['type']}}"
                                class="{{$link_app['class']}} {{$link_app['active']}} dropdown-toggle nav-link"
                                name="{{$link_app['slug']}}"
                                >
                                    @if (is_string($link_app['icono']))
                                        <i class="{{ $link_app['icono'] }}"
                                            style="color: {{ $link_app['icono_color'] }};">
                                        </i>
                                    @else
                                        {{ $link_app['icono'] }}
                                    @endif
                                    <span>
                                        {{ $link_app['name'] }}
                                    </span>
                                </x-dom.button>
                                <ul class="{{$link_app['type'] == 'collapse' ? 'collapse' : ''}} dropdown-child dropdown-menu mt-2-5" id="{{$link_app['slug']}}">
                                    @foreach ($link_app['items'] as $item)
                                        <li class="nav-item">
                                            <a class="dropdown-item" href="{{$item['href']}}">
                                                {{$item['name']}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                             @else
                                <x-dom.button
                                type="{{ $link_app['type']}}"
                                class="{{$link_app['class']}} {{$link_app['active']}} nav-link"
                                name="{{$link_app['slug']}}"
                                >
                                    @if (is_string($link_app['icono']))
                                        <i class="{{ $link_app['icono'] }}"
                                            style="color: {{ $link_app['icono_color'] }};">
                                        </i>
                                    @else
                                        {{ $link_app['icono'] }}
                                    @endif
                                    <span>
                                        {{ $link_app['name'] }}
                                    </span>
                                </x-dom.button>
                             @endif
                            </li>
                        @endforeach
                    @endauth
                </ul>
                <hr class="hidden-lg">
                @guest
                    <ul class="navbar-nav">
                        @foreach ($links_auths as $link_auth)
                            <li class="nav-item">
                                <x-dom.button type="{{ $link_auth['type'] }}" name="{{ $link_auth['slug'] }}"
                                    class="{{ $link_auth['active'] }} {{ $link_auth['class'] }}" :route="$link_auth['route']">
                                    {{ $link_auth['name'] }}
                                </x-dom.button>
                            </li>
                        @endforeach
                    </ul>
                @endguest
                @auth
                 <ul class="navbar-nav d-lg-none">
                    <li class="nav-item">
                        <x-dom.button type="link" :route="isset(auth()->user()->setting) ? route('setting.edit', auth()->user()->setting)  :  route('setting.create')" class="nav-link {{request()->routeIs('setting.*') ? 'active disabled' : ''}} only-icon">
                        <x-images.dashboard.setting />
                        <span>
                            @lang('Setting')
                        </span>
                    </x-dom.button>
                    </li>
                    <li class="nav-item">
                        <x-dom.button type="link" :route="route('logout')" class="nav-link only-icon" >
                        <x-images.dashboard.logout />
                        <span>
                            @lang('Logout')
                        </span>
                    </x-dom.button>
                    </li>
                 </ul>
                @endauth
            </div>
        </div>
    </nav>
</header>
