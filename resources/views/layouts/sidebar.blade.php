<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/') }}" class="brand-link text-center">
        <span class="brand-text">SISREC PRO</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview" role="menu" data-accordion="false">

                {{-- Bloque “Sistema” --}}
                <li class="nav-item {{ request()->is('users*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Sistema
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Administrar Usuarios</p>
                            </a>
                        </li>
                    </ul>

                </li>

            </ul>
        </nav>
    </div>
</aside>