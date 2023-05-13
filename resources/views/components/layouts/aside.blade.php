<input type="checkbox" id="btn_menu">
<aside class="aside-dashboard bg-light border-end bg-body-tertiary d-none d-md-grid">
    <div class="aside">
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
            <ul class="list-group">
                @foreach ($links_pages as $link_page)
                    <li class="{{ ($link_page['type'] == 'dropdown') ? 'dropend' : '' }}">
                        <x-dom.button type="{{$link_page['type']}}" class="list-group-item list-group-item-action {{$link_page['class']}} {{$link_page['active']}} {{($link_page['type'] != 'dropdown') ? 'only-icon' : '' }}" slug="{{$link_page['slug']}}" :route="$link_page['route']"
                        :tooltip="(isset($link_page['tooltip'])) ? $link_page['tooltip'] : ''">
                            {{$link_page['icono']}}
                            <span>
                                {{$link_page['name']}}
                            </span>
                        </x-dom.button>
                        @if ($link_page['type'] == 'dropdown' && isset($link_page['items']))
                            <ul class="dropdown-menu" slug="{{$link_page['slug']}}">
                                @foreach ($link_page['items'] as $item)
                                    <li>
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
            <ul class="list-group">
                <li>
                    <x-dom.button type="link" :route="isset(auth()->user()->setting) ? route('setting.edit', auth()->user()->setting)  :  route('setting.create')" class="list-group-item list-group-item-action {{request()->routeIs('setting.*') ? 'active disabled' : ''}} only-icon"
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
                <li>
                    <x-dom.button type="link" :route="route('logout')" class="list-group-item list-group-item-action only-icon" :tooltip="[
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
    </div>
</aside>
