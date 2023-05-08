<input type="checkbox" id="btn_menu">
<aside class="aside aside-dashboard">
    <div class="menu-header">
        <div class="profile">
            <x-images.avatar></x-images.avatar>
            <div>
                <span>{{ auth()->user()->name }}</span>
                <a href="#"><small>Profile</small></a>
            </div>
        </div>
        <label class="btn-close-menu" for="btn_menu">
            <i class="fa-solid fa-xmark fa-2xl"></i>
        </label>
        <label class="btn-menu" for="btn_menu">
            <i class="fa-solid fa-bars fa-2xl"></i>
        </label>
        <hr class="text-white">
    </div>
    <div class="menu-content">
        <ul>
            @foreach ($links_pages as $link_page)
                <li class="list-menu {{ ($link_page['type'] == 'dropdown') ? 'dropend' : '' }} ">
                    <x-dom.button type="{{$link_page['type']}}" class="{{$link_page['class']}} {{$link_page['active']}}" slug="{{$link_page['slug']}}" :route="$link_page['route']"
                    :tooltip="(isset($link_page['tooltip'])) ? $link_page['tooltip'] : ''">
                        {{$link_page['icono']}}
                        <span>
                            {{$link_page['name']}}
                        </span>
                    </x-dom.button>
                    @if ($link_page['type'] == 'dropdown' && isset($link_page['items']))
                        <ul class="dropdown-menu" slug="{{$link_page['slug']}}">
                            @foreach ($link_page['items'] as $item)
                                <li class="list-items">
                                    <a class="dropdown-item" href="{{$item['href']}}">
                                        {{$item['name']}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    <div class="menu-footer">
        <hr class="text-white">
        <ul>
            <li class="list-menu">
                <x-dom.button type="link" :route="route('setting')" class="link-menu {{request()->routeIs('setting') ? 'active disabled' : ''}}"
                :tooltip="[
                    'position' => 'right',
                    'class' => 'custom-tooltip',
                    'text' => 'App settings'
                ]">
                    <x-images.dashboard.setting />
                    <span>
                        Setting
                    </span>
                </x-dom.button>
            </li>
            <li class="list-menu">
                <x-dom.button type="link" :route="route('logout')" class="link-menu" :tooltip="[
                    'position' => 'right',
                    'class' => 'custom-tooltip',
                    'text' => 'Sign off'
                ]">
                    <x-images.dashboard.logout />
                    <span>
                        Logout
                    </span>
                </x-dom.button>
            </li>
        </ul>
    </div>
</aside>
