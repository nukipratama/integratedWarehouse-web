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
        $request["values"][$index]["barang_price"] = $key["barang_price"];
    }
}
?>

<div class="transition-fade text-white">
    <h2><i class="fas fa-cash-register"></i> Cashier</h2>
    <div class="divider"></div>
    <div class="mt-3 row justify-content-end">
        <div class="col-md-12">
            <div class="input-group">
                <span class="text-black text-center">
                    Select item below..
                </span>
                <br>
                <select class="select2-demo w-100" name="items[]">
                    <option></option>
                </select>
            </div>
        </div>

    </div>
    <div class="mt-3 row">
        <div class="col-md-8">
            <div id="cart">
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <p>Total : IDR <span id="totalPrice">0</span></p>
            <p>Change: IDR <span id="minusPrice">0</span></p>
            <input type="number" name="cash" id="cash" class="form-control-sm">
            <button id="pay" class="btn btn-primary" disabled>Pay</button>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?= $_SESSION['url'] ?>bower_components/bootstrap-sweetalert/dist/sweetalert.css" />
<script src="<?= $_SESSION['url'] ?>bower_components/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
<script>
    var stock = <?= json_encode($request["values"]); ?>;
    $("#cash").keyup(function(event) {
        var total = $("#totalPrice").html() * 1000;
        var cash = $("#cash").val();
        var validate = cash - total;
        if (validate >= 0) {
            $('#pay').removeAttr('disabled');
            var validate = (validate / 1000).toFixed(3);
            $("#minusPrice").html(validate);
        } else {
            $('#pay').attr('disabled', 'disabled');
        }
    });



    $("#pay").click(function(event) {
        $('#pay').attr('disabled', 'disabled');
        var request = [];
        var total = $("#totalPrice").html() * 1000;
        var itemsID = $("input[id='id[]']")
            .map(function() {
                return $(this).val();
            })
            .get();
        var itemsQty = $("input[id='qty[]']")
            .map(function() {
                return $(this).val();
            })
            .get();
        for (index = 0; index < itemsID.length; ++index) {
            request.push({
                id: itemsID[index],
                qty: itemsQty[index]
            });
        }
        $.ajax({
            url: "<?= $_SESSION['url'] ?>script/payment.php",
            type: "POST",
            data: {
                barangObject: request,
                totalPrice: total,
            },

            success: function(data) {
                if (data == "200") {
                    swal({
                            title: "Success",
                            text: "Your transaction has been succeed!",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "OK",
                            closeOnConfirm: false
                        },
                        function() {
                            $(location).attr('href', "<?= $_SESSION['url'] ?>page_cashier.php");
                        });
                }
            },
            error: function(xhr, status, error) {
                swal("Error deleting!", "Please try again", "error");
            }
        });
    });
</script>
<script src="./component/cashier/cashier.js"></script>
<?php
include './component/template/footer.php';
?>