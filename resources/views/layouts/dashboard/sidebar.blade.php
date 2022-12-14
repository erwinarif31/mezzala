<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html" class="h4 text-center">Mezzala</a>
        </div>
        <ul class="sidebar-menu">
            <li><a class="nav-link" href="/dashboard"><i class="fas fa-futbol"></i> <span>Dashboard</span></a></li>
            @if (auth()->user()->is_admin == 1)
                <li><a class="nav-link" href="/users"><i class="fas fa-user"></i> <span>User</span></a></li>
            @endif
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-home"></i> Homepage
            </a>
        </div>
    </aside>
</div>
