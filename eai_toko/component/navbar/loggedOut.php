<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <span class="text-primary">B</span>arokah
        <span class="text-youtube">M</span>art
        <span class="text-success font-weight-bold">POS</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDark" aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarDark">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
            </li>
        </ul>
    </div>
</nav>
<div class="modal modal-lightbox fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleLightbox" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&#10005;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card" style="max-width: 500px;">
                    <div class="row no-gutters">
                        <div class="col-lg-12">
                            <div class="card-body">
                                <h5 class="card-title lead">
                                    login with your employee id
                                </h5>
                                <div class="divider"></div>
                                <form class="mt-2" method="POST" action="./script/login.php" enctype="application/x-www-form-urlencoded">
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input name="username" type="text" class="form-control" placeholder="username" aria-label="Username" aria-describedby="basic-addon1" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-key"></i></span>
                                            </div>
                                            <input name="password" type="password" class="form-control" placeholder="password" aria-label="Password" aria-describedby="basic-addon2" required />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <button class="btn btn-github w-100" name="submit" type="submit">sign in</button>
                                    </div>
                                    <p class="text-center ">
                                        <a href="#" class="text-secondary">having trouble logging in?</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>