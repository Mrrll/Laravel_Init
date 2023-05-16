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
            </div>
        </div>
    </nav>
</header>
