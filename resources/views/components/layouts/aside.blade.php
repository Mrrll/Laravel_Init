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
            <li class="list-menu">
                <a href="#" class="link-menu active">
                    <x-images.dashboard.dashboard />
                    <span>
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="list-menu">

                <a href="#" class="link-menu">
                    <x-images.dashboard.articles />
                    <span>
                        Articles
                    </span>
                </a>
            </li>
            <li class="list-menu">
                <a href="#" class="link-menu">
                    <x-images.dashboard.customers />
                    <span>
                        Customers
                    </span>

                </a>
            </li>
            <li class="list-menu">
                <a href="#" class="link-menu">
                    <x-images.dashboard.delivery_notes />
                    <span>
                        Delivery notes
                    </span>
                </a>
            </li>
            <li class="list-menu">
                <a href="#" class="link-menu">
                    <x-images.dashboard.invoice />
                    <span>
                        Invoice
                    </span>
                </a>
            </li>
            <li class="list-menu dropend">
                    <a type="button" class="link-menu dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <x-images.dashboard.customers />
                        <span>
                            Lo que sea
                        </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>item-1</li>
                        <li>item-2</li>
                        <li>item-3</li>
                    </ul>
            </li>
            
        </ul>
    </div>
    <div class="menu-footer">
        <hr class="text-white">
        <ul>
            <li class="list-menu">
                <a href="#" class="link-menu">
                    <x-images.dashboard.logout />
                    <span>
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </div>
</aside>
