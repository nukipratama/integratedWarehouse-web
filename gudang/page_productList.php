<?php include "./assets/component/header.php";
$request = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/items");
$request = json_decode($request, true);
?>

<div class="content">
  <div class="container-fluid">
    <h2>Product List</h2>
    <div class="row">
      <?php foreach ($request["values"] as $key) : ?>
        <div class="col-md-3">
          <div class="card">
            <div class="card-avatar" style="width: 100%;">
              <img class="img-fluid " src="<?= $key['barang_img'] ?>" />
            </div>
            <div class="card-body">
              <div>
                <h3 class="card-title"><?= $key['barang_name'] ?></h3>
              </div>
              <div class="row">
                <div class="col-sm">
                  <h6 class="card-category text-gray"><?= $key['barang_cat'] ?></h6>
                </div>
                <div class="col-sm">
                  <h6 class="card-category text-info float-right">Rp. <?= $key['barang_price'] ?>,-</h6>
                </div>
              </div>
              <div class="text-center">
                <a href="./page_productDetail.php?id=<?= $key['barang_id'] ?>" class="btn btn-primary text-center btn-round">Detail Product</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <?php include "./assets/component/footer.php" ?>

    </body>

    </html>