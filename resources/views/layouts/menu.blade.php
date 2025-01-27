<nav class="primary-menu">

    <ul class="menu-container">
        <li class="menu-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}"><a class="menu-link" href="{{ route('home') }}"><div>Home</div></a></li>
        <li class="menu-item {{ Str::startsWith(Route::currentRouteName(), 'sites') ? 'active' : '' }}"><a class="menu-link" href="{{ route('sites.index') }}"><div>Sites</div></a>
            <ul class="sub-menu-container" data-class="up-lg:not-dark">
                @can('manage sites')
                    <li class="menu-item {{ Route::currentRouteName() == 'sites.index' ? 'current' : '' }}"><a class="menu-link" href="{{ route('sites.index') }}"><div>Manage Sites</div></a></li>
                @endcan
                @can('create sites')
                    <li class="menu-item {{ Route::currentRouteName() == 'sites.create' ? 'current' : '' }}"><a class="menu-link" href="{{ route('sites.create') }}"><div>Create a Site</div></a></li>
                @endcan
            </ul>
        </li>
        <li class="menu-item {{ Str::startsWith(Route::currentRouteName(), 'themes') ? 'active' : '' }}"><a class="menu-link" href="{{ route('themes.index') }}"><div>Themes</div></a>
            <ul class="sub-menu-container" data-class="up-lg:not-dark">
                @can('manage themes')
                    <li class="menu-item {{ Route::currentRouteName() == 'themes.index' ? 'current' : '' }}"><a class="menu-link" href="{{ route('themes.index') }}"><div>Manage Themes</div></a></li>
                @endcan
                @can('create themes')
                    <li class="menu-item {{ Route::currentRouteName() == 'themes.create' ? 'current' : '' }}"><a class="menu-link" href="{{ route('themes.create') }}"><div>Upload a Theme</div></a></li>
                @endcan
            </ul>
        </li>
        @role('admin')
            <li class="menu-item {{ Str::startsWith(Route::currentRouteName(), 'users') ? 'active' : '' }}"><a class="menu-link" href="{{ route('users.index') }}"><div>Users</div></a>
                <ul class="sub-menu-container" data-class="up-lg:not-dark">
                    @can('manage users')
                        <li class="menu-item {{ Route::currentRouteName() == 'users.index' ? 'current' : '' }}"><a class="menu-link" href="{{ route('users.index') }}"><div>Manage Users</div></a></li>
                    @endcan
                    @can('create users')
                        <li class="menu-item"><a class="menu-link" href="#"><div>Create a User</div></a></li>
                    @endcan
                </ul>
            </li>
        @endrole

        @can('manage settings')
            <li class="menu-item {{ Route::currentRouteName() == 'settings.index' ? 'active' : '' }}"><a class="menu-link" href="{{ route('settings.index') }}"><div>Settings</div></a></li>
        @endcan
        <li class="menu-item"><a class="menu-link" href="#"><div>Account</div></a>
            <ul class="sub-menu-container" data-class="up-lg:not-dark">
                <li class="menu-item"><a class="menu-link" href="#"><div>Profile</div></a></li>
                <li class="menu-item">
                    <a class="menu-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div>Logout</div>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>

</nav>