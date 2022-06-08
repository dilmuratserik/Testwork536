<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <h5>Dashboard</h5>
        </h6>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{
                    request()->route()->getName() == 'dashboard.items' ||
                    request()->route()->getName() == 'dashboard.items.create' ||
                    request()->route()->getName() == 'dashboard.items.edit' ? 'active' : ''
                }}" href="{{ route('dashboard.items') }}">
                    <span data-feather="home"></span>
                    Products
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <h5>API</h5>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ request()->route()->getName() == 'dashboard.api' ? 'active' : '' }}" href="{{ route('dashboard.api') }}">
                    <span data-feather="file-text"></span>
                    Description
                </a>
            </li>
        </ul>
    </div>
</nav>
