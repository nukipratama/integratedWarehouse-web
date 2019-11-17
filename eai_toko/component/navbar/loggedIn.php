<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0">

    <a class="navbar-brand" href="#">
        <span class="text-primary">B</span>arokah
        <span class="text-youtube">M</span>art
        <span class="text-success font-weight-bold">POS</span>
    </a>
    <button type="button" id="sidebarCollapse" class="navbar-btn" onclick="navbarBtn()">
        <span></span>
        <span></span>
        <span></span>
    </button>

    <a href="./script/logout.php" class="btn btn-danger ml-2" id="dropdownMenuButtonOutline">
        Logout <i class="fa fa-sign-out-alt"></i>
    </a>
</nav>


<div id="wrapper" class="wrapper bg-github m-0">

    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3><?= $_SESSION['loginName'] ?></h3>
            <span><?= $_SESSION['loginRole'] ?></span>
        </div>

        <ul class="list-unstyled components">
            <p class="text-center"><i class="fas fa-ellipsis-h"></i> Menu</p>
            <li id="menuDashboard">
                <a href="https://localhost/eai_toko/eai_toko/page_dashboard.php"><i class="fas fa-chart-line"></i> Dashboard</a>
            </li>
            <li id="menuProfile">
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user-alt"></i> Profile</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="https://localhost/eai_toko/eai_toko/page_editProfile.php">Edit Profile</a>
                    </li>
                    <li>
                        <a href="https://localhost/eai_toko/eai_toko/page_changePassword.php">Change Password</a>
                    </li>
                </ul>
            </li>
            <li id="menuItems">
                <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-store"></i> Items</a>
                <ul class="collapse list-unstyled" id="pageSubmenu1">
                    <li>
                        <a href="https://localhost/eai_toko/eai_toko/page_stock.php">Stock</a>
                    </li>
                    <li>
                        <a href="https://localhost/eai_toko/eai_toko/page_warehouse.php">Warehouse</a>
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