<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <span class="text-primary">B</span>arokah
        <span class="text-youtube">M</span>art
        <span class="text-warning font-weight-bold">POS</span>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarDark">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item p-1">
                <div class="dropdown">
                    <button class="btn btn-github " type="button" id="dropdownMenuButtonOutline">
                        <?= $_SESSION['loginName'] ?>
                    </button>
                </div>
            </li>

            <li class="nav-item p-1">
                <div class="dropdown">
                    <a href="./script/logout.php" class="btn btn-danger" id="dropdownMenuButtonOutline">
                        <i class="fa fa-sign-out-alt"></i>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>