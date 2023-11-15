<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">St</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Menu</li>
        <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        <li class="{{ request()->routeIs('products.index') ? 'active' : '' }}">
            <a href="{{ route('products.index') }}" class="nav-link"><i class="fas fa-box"></i><span>Product</span></a>
        </li>
        @role('admin')
        <li class="{{ request()->routeIs('faq.index') ? 'active' : '' }}">
            <a href="{{ route('faq.index') }}" class="nav-link"><i class="fas fa-question-circle"></i><span>FAQ</span></a>
        </li>
        <li class="{{ request()->routeIs('users.index') ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="nav-link"><i class="fas fa-user"></i><span>User</span></a>
        </li>
        @endrole
        <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
    </ul>
    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
        </a>
    </div>
</aside>