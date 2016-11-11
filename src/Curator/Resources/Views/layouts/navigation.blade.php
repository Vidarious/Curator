<nav class="navbar navbar-static-top navbar-dark bg-inverse navbar-color">
    <a class="navbar-brand" href="#">
        <span class="fa-stack fa-1x">
            <i class="fa fa-square-o fa-stack-2x nav-brand-out"></i>
            <strong class="fa-stack-1x nav-brand-in">C</strong>
        </span>
    </a>
    <ul class="nav navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Activity</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Users</a>
            <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                <a class="dropdown-item" href="#">List Users</a>
                <a class="dropdown-item" href="#">Create New User</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Roles</a>
            <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                <a class="dropdown-item" href="#">List Roles</a>
                <a class="dropdown-item" href="#">Create New Role</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Permissions</a>
            <div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
                <a class="dropdown-item" href="#">List Permissions</a>
                <a class="dropdown-item" href="#">Create New Permission</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Setting</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-bar-home" href="#"><i class="fa fa-home"></i></a>
        </li>
        <li class="nav-item dropdown float-xs-right navbar-profile">
            <a class="nav-link dropdown-toggle" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-o"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="responsiveNavbarDropdown">
                <a class="dropdown-item" href="#">View Profile</a>
                <a class="dropdown-item" href="#">Logout</a>
            </div>
        </li>
    </ul>

    <form class="form-inline float-xs-right">
        <input class="form-control navbar-search" type="text" placeholder="User Search">
        <button class="btn btn-secondary" type="submit">Find</button>
    </form>


</nav>
