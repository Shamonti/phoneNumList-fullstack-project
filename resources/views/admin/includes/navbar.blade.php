<section class="section-dashboard--sidebar">
    <!-- START MENU -->
    <nav class="menubar">
        <ul class="menu d-flex flex-column">
            <li class="">
                <a href="{{ route('/') }}" class="navbar-brand">
                    <img src="{{ asset('/') }}adminAsset/assets/images/logo--company-name.svg" alt="logo" />
                </a>
            </li>
            <li class="menu-item {{  request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-collection menu-item--icon "></i>
                    <span class="menu-item--text ">
                Dashboard
              </span>
                </a>
            </li>
            <li class="menu-item {{  request()->routeIs('view.all') ? 'active' : '' }}">
                <a href="{{ route('view.all') }}">
                    <i class="bi bi-files menu-item--icon "></i>
                    <span class="menu-item--text ">
                View All Data
              </span>
                </a>
            </li>
            <li class="menu-item {  request()->routeIs('view.all.user') ? 'active' : '' }}">
                <a href="{{ route('view.all.user') }}">
                    <i class="bi bi-person-badge menu-item--icon "></i>
                    <span class="menu-item--text ">
                User Details
              </span>
                </a>
            </li>
            <li class="menu-item {{  request()->routeIs('add.new.user') ? 'active' : '' }}">
                <a href="{{ route('add.new.user') }}" >
                    <i class="bi bi-person-plus-fill menu-item--icon"></i>
                    <span class="menu-item--text ">
                        Add New User
                    </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="">
                    <i class="bi bi-bar-chart menu-item--icon"></i>
                    <span class="menu-item--text">
                Order History
              </span>
                </a>
            </li>
            </a>
            <li class="menu-item ">
                <a href="">
                    <i class="bi bi-currency-bitcoin menu-item--icon"></i>
                    <span class="menu-item--text">
                Credit History
              </span>
                </a>
            </li>
            <li class="menu-item {{  request()->routeIs('transfer.user.credit') ? 'active' : '' }}">
                <a href="{{ route('transfer.user.credit') }}">
                    <i class="bi bi-arrow-left-right menu-item--icon"></i>
                    <span class="menu-item--text">
                Credit Transfer
              </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="">
                    <i class="bi bi-wallet2 menu-item--icon"></i>
                    <span class="menu-item--text">
                Payment Settings
              </span>
                </a>
            </li>
            <li class="menu-item menu-item-footer">
                <a href="{{ route('admin.logout') }}">
                    <i class="bi bi-power menu-item--icon"></i>
                    <span class="menu-item--text">
                Logout
              </span>
                </a>
            </li>
            </a>
        </ul>
    </nav>
    <!-- END MENU -->
</section>
