<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Trequartista</a>
        </div>
        <ul class="sidebar-menu">
            <li><a class="nav-link" href="blank.html"><i class="fas fa-futbol"></i> <span>Dashboard</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-alt"></i>
                    <span>Article</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html"><i class="fas fa-list"></i>Article List</a>
                    </li>
                    <li><a class="nav-link" href="layout-transparent.html"><i class="fas fa-plus"></i>Create Article</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-globe-europe"></i>
                    <span>Category</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html"><i class="fas fa-list"></i>Category List</a>
                    </li>
                    <li><a class="nav-link" href="layout-transparent.html"><i class="fas fa-plus"></i>Create Category</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-trophy"></i>
                    <span>Sub Category</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html"><i class="fas fa-list"></i>Sub Category List</a>
                    </li>
                    <li><a class="nav-link" href="layout-transparent.html"><i class="fas fa-plus"></i>Create Sub Category</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tag"></i>
                    <span>Tag</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html"><i class="fas fa-list"></i>Tag List</a>
                    </li>
                    <li><a class="nav-link" href="layout-transparent.html"><i class="fas fa-plus"></i>Create Tag</a></li>
                </ul>
            </li>
            @yield('user-module')
            
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-home"></i> Homepage
            </a>
        </div>
    </aside>
</div>
