<?php
if (!isset($_GET['id'])) {
  header("Location:./page_productList.php");
}
include "./assets/component/header.php";
$request = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/items/" . $_GET['id']);
$request = json_decode($request, true);
foreach ($request['values'] as $key) :
  ?>
  ?>

  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <br>
        <div class="card-body">



          <!-- Portfolio Item Row -->
          <div class="row">
            <div class="col-md-5">
              <img class="img-fluid" src="<?= $key['barang_img'] ?>" alt="">
            </div>

            <div class="col-md-7">
              <div class="row">
                <div class="col-md-2">
                  <a href="./page_productList.php" class="btn btn-default text-center btn-round"><i class="material-icons">arrow_back</i></a>
                </div>
                <div class="col-md-10">
                  <h1><?= $key['barang_name'] ?></h1>
                </div>

              </div>
              <hr>
              <h3 class="my-3">Product Description</h3>
              <p><?= $key['barang_desc'] ?></p>
              <h4 class="my-3">Category: <?= $key['barang_cat'] ?></h4>

            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </div>
    </div>

  </div>
  </div>


<?php
endforeach;
include "./assets/component/footer.php"; ?>

</body>

</html>