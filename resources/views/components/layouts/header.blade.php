<header class="bg-light border-bottom header-dashboard">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            @auth
                @isset(auth()->user()->setting->image)
                    <img src="{{asset(auth()->user()->setting->image->first()->url)}}" width="48" height="48">
                @else
                    <x-images.logo></x-images.logo>
                @endisset
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
                            <li class="nav-item">
                                <a class="nav-link {{ $link_page['active'] }}" aria-current="page" href="{{ $link_page['route'] }}">
                                    <i class="{{ $link_page['icono'] }}"
                                        style="color: {{ $link_page['icono_color'] }};">
                                    </i>
                                    {{ $link_page['name'] }}
                                </a>
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
