<?php
session_start();
include './component/template/header.php';
?>
<div class="transition-fade text-white">
    <?php
    $request = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/items/" . $_GET['id']);
    $request = json_decode($request, true);
    foreach ($request["values"] as $key) {
        ?>
        <h2><a href="<?= $_SESSION['url'] ?>page_warehouse.php"><i class="fas fa-chevron-circle-left"></i></a> <?= $key["barang_name"] ?></h2>
        <div class="divider"></div>
        <div class="m-2 row">
            <div class="col-md-4 bg-white">
                <img class="img-thumbnail" src="<?= $key['barang_img'] ?>" alt="<?= $key["barang_name"] . ' image' ?>">
            </div>
            <div class="col-md-8 text-white">
                <p class="lead text-white">Name : <?= $key['barang_name'] ?></p>
                <p class="lead text-white">Category : <?= $key['barang_cat'] ?></p>
                <p class="lead text-white">Price : <?= $key['barang_price'] ?></p>
                <p class="lead text-white">Overview : <?= $key['barang_desc'] ?></p>
                <button type="button" class="btn btn-success w-100" data-toggle="modal" data-target="#orderModal">
                    Request Order
                </button>
            </div>
        </div>
</div>

<?php
    include './component/template/footer.php';
}
?>