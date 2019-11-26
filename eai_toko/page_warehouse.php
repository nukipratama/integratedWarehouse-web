<?php
include './component/template/header.php';
$request = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/items");
$request = json_decode($request, true);
$array = [];
foreach ($request["values"] as $key) {
    if (!in_array($key['barang_cat'], $array)) {
        array_push($array, $key['barang_cat']);
    }
}
?>

<div class="transition-fade text-white">
    <h2><i class="fas fa-warehouse"></i> Warehouse</h2>
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
            <div class="cards col-md-4 mt-3 <?= $key['barang_cat'] ?>" id="">
                <a href="<?= $_SESSION['url'] ?>page_itemDetails.php?id=<?= $key['barang_id'] ?>">
                    <div class="card text-dark h-100 w-100">
                        <div class="row no-gutters">
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                <img src="<?= $key['barang_img'] ?>" class="card-img rounded-0" alt="image">
                            </div>
                            <div class="col-md-8 ">
                                <div class="card-body">
                                    <h5 class="card-title" id="name"><?= $key['barang_name'] ?></h5>
                                    <p class="card-text"><small class="text-muted" id="cat"><?= $key['barang_cat'] ?></small></p>
                                    <p class="card-text">
                                        <?= $key['barang_desc'] ?>
                                    </p>
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