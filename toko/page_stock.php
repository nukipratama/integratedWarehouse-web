<?php
include './component/template/header.php';
$request = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/stocks");
$request = json_decode($request, true);
$array = [];

foreach ($request["values"] as $index => $value) {
    $requestDetail = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/items/" . $value['stock_barangID']);
    $requestDetail = json_decode($requestDetail, true);
    foreach ($requestDetail["values"] as $key) {
        $request["values"][$index]["barang_name"] = $key["barang_name"];
        $request["values"][$index]["barang_cat"] = $key["barang_cat"];
        $request["values"][$index]["barang_id"] = $key["barang_id"];
    }
    if (!in_array($request["values"][$index]['barang_cat'], $array)) {
        array_push($array, $request["values"][$index]['barang_cat']);
    }
}
?>

<div class="transition-fade text-white">
    <h2><i class="fas fa-boxes"></i> Stock</h2>
    <div class="divider"></div>
    <div class="mt-3 row justify-content-end">
        <div class="col-md-8">
            <button class="btn btn-secondary btnTrigger" id="all" type="button">All</button>
            <?php foreach ($array as $key) : ?>
                <button class="btn btn-secondary btnTrigger" id="<?= $key ?>" type="button"><?= $key ?></button>
            <?php endforeach; ?>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" id="inputFilter" placeholder="search warehouse..">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>


    </div>
    <div class="row" id="btnFilter">
        <?php
        foreach ($request["values"] as $key) {
            ?>
            <div class="cards col-md-12 mt-3 <?= $key['barang_cat'] ?>" id="">
                <a href="<?= $_SESSION['url'] ?>page_itemDetails.php?id=<?= $key['barang_id'] ?>">
                    <div class="card text-dark h-100 w-100">
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <span class="text-muted">Name</span>
                                    <h5 class="card-title" id="name"><?= $key["barang_name"] ?></h5>
                                </div>
                                <div class="col-md-4">
                                    <span class="text-muted">Category</span>
                                    <h5 class="card-title" id="cat"><?= $key["barang_cat"] ?></h5>
                                </div>
                                <div class="col-md-4">
                                    <span class="text-muted">Quantity</span>
                                    <h5 class="card-title" id="qty"><?= $key["stock_barangQty"] ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<script src="./component/cardFilter/cardFilter.js"></script>
<?php
include './component/template/footer.php';
?>