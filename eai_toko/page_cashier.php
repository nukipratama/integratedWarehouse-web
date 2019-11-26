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
    <h2><i class="fas fa-monet-bill-alt"></i> Cashier</h2>
    <div class="divider"></div>
    <div class="mt-3 row justify-content-end">
        <div class="col-md-12">
            <div class="input-group">
                <span class="text-black text-center">
                    Select item below..
                </span>
                <br>
                <select class="select2-demo w-100" name="items[]"></select>
            </div>
        </div>
    </div>
    <div class="mt-3 row">
        <div class="col-md-12">
            <div id="cart">
                <div class="cards col-md-12 mt-3 <?= $key['barang_cat'] ?>" id="">
                    <div class="card text-dark h-100 w-100">
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-md-4">
                                    <span class="text-muted">Name</span>
                                    <h5 class="card-title" id="name">Item Name</h5>
                                </div>
                                <div class="col-md-3">
                                    <span class="text-muted">Category</span>
                                    <h5 class="card-title" id="cat">Item Category</h5>
                                </div>
                                <div class="col-md-3">
                                    <span class="text-muted">Quantity</span>
                                    <br>
                                    <input type="number" name="" id="">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-danger mt-3"><i class="fas fa-trash-alt"></i> Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var stock = <?php echo json_encode($request["values"]); ?>;
    var data = [];
    for (index = 0; index < stock.length; ++index) {
        data.push({
            id: stock[index].no,
            text: stock[index].barang_name + " (Qty: " + stock[index].stock_barangQty + ")"
        })
    }
    $(".select2-demo").select2({
        data: data
    })
</script>
<?php
include './component/template/footer.php';
?>