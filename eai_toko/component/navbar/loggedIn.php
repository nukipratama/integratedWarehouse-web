<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0">

    <a class="navbar-brand" href="#">
        <span class="text-primary">B</span>arokah
        <span class="text-youtube">M</span>art
        <span class="text-success font-weight-bold">POS</span>
    </a>
    <button type="button" id="sidebarCollapse" class="navbar-btn ">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <a href="./script/logout.php" class="btn btn-danger ml-2" id="dropdownMenuButtonOutline">
        Logout <i class="fa fa-sign-out-alt"></i>
    </a>
</nav>


<div class="wrapper bg-github m-0">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><?= $_SESSION['loginName'] ?></h3>
            <span><?= $_SESSION['loginRole'] ?></span>
        </div>

        <ul class="list-unstyled components">
            <p class="text-center">Menu</p>
            <li class="<?= $navDashboard ?>">
                <a href="./page_dashboard.php">Dashboard</a>
            </li>
            <li class="<?= $navProfile ?>">
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Profile</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">Edit Profile</a>
                    </li>
                    <li>
                        <a href="#">Change Password</a>
                    </li>
                </ul>
            </li>
        </ul>
        <center>
            <span class="text-center text-muted ">&copy; 2019 AWN POS</span>
        </center>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">


    </div>
</div>