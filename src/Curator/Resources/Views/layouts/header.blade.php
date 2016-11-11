<header>
            <!--Navbar-->
            <nav class="navbar navbar-fixed-top navbar-dark bg-faded grey darken-3 nav-text">

                <!-- Collapse button-->
                <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="container">

                    <!--Collapse content-->
                    <div class="collapse navbar-toggleable-xs" id="collapseEx2">
                        <!--Navbar Brand-->
                        <a class="navbar-brand" href="/admin/dashboard">
                            <span class="fa-stack">
                                <i class="fa fa-square-o fa-stack-2x brand-square"></i>
                                <strong class="fa-stack-1x brand-text">C</strong>
                            </span>
                        </a>
                        <!--Links-->
                        <ul class="nav navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/activity">Activity</a>
                            </li>
                            <li class="nav-item btn-group">
                                <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Users</a>
                                <div class="dropdown-menu nav-text" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="/admin/user/list">List Users</a>
                                    <a class="dropdown-item" href="/admin/user/create">Create New User</a>
                                </div>
                            </li>
                            <li class="nav-item btn-group">
                                <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Roles</a>
                                <div class="dropdown-menu nav-text" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="/admin/role/list">List Roles</a>
                                    <a class="dropdown-item" href="/admin/role/create">Create New Role</a>
                                </div>
                            </li>
                            <li class="nav-item btn-group">
                                <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Permissions</a>
                                <div class="dropdown-menu nav-text" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="/admin/permission/list">List Permissions</a>
                                    <a class="dropdown-item" href="/admin/permission/create">Create New Permission</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/settings">Settings</a>
                            </li>
                            <li class="nav-flex-icons nav-item btn-group">
                                <a class="nav-link dropdown-toggle nav-user" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                                <div class="dropdown-menu nav-text dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="/profile">View Profile</a>
                                    <a class="dropdown-item" href="/logout">Logout</a>
                                </div>
                            </li>
                        </ul>
                        <!--Search Form-->
                        <form class="form-inline">
                            <input class="form-control nav-text nav-search" type="text" placeholder="User Search">
                        </form>
                    </div>
                    <!--/.Collapse content-->

                </div>

            </nav>
            <!--/.Navbar-->
        </header>
