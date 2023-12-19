<div class="adminTopbar">
    <div class="TopNavbar row">
        <div class="TopNavbarItem col-3">
            <a class="TopNavbarLink" href="#" id="sidebarToggler"
                onclick="sidebarToggler('adminSidebar','adminContentBar')">
                <i class="fas fa-bars"></i>
            </a>
        </div>
        <div class="TopNavbarItem col-2 col-sm-2 col-lg-6">
            <a class="TopNavbarLink" href="#"></a>
        </div>
        <div class="TopNavbarItem col-3 col-sm-7 col-lg-3">
            <div class="m-0">
                <ul class="TopNavbarOptions">
                    <li>
                        <a href="#"><i class="fas fa-sun"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-globe"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-bell"></i></a>
                    </li>
                    <li class="user">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item userDropDownMenu">
                                <a class="dropdown-toggle" href="#"><i
                                        class="fas fa-user"></i><span>Admin</span></a>
                                <ul>
                                    <li><a href="#">Edit Profile</a></li>
                                    <li><a href="#">Settings</a></li>
                                    <li><a href="{{ url('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
