<!-- Modal -->
<div class="modal fade text-dark" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">request order for <?= $key['barang_name'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Item Quantity</label>
                        <input type="number" name="barang_qty" class="form-control" id="barang_qty" aria-describedby="emailHelp" placeholder="enter qty amount" required>
                        <input type="hidden" name="barang_id" id="barang_id" value="<?= $key['barang_id'] ?>">
                        <small id="emailHelp" class="form-text text-muted">please make sure you select the right item.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    <button id="postOrder" type="button" class="btn btn-success">order now</button>
                </div>
            </form>
        </div>
    </div>
</div>
<link rel="stylesheet" href="http://localhost/eai_toko/eai_toko/bower_components/bootstrap-sweetalert/dist/sweetalert.css" />
<script src="http://localhost/eai_toko/eai_toko/bower_components/bootstrap-sweetalert/dist/sweetalert.min.js"></script>
<script>
    $("#postOrder").click(function(event) {
        $('#orderModal').modal('hide');
        var barang_qty = $("input[type=number][id=barang_qty]").val();
        var barang_id = $("input[type=hidden][id=barang_id]").val();
        $.ajax({
            url: "http://localhost/eai_toko/eai_toko/script/requestItem.php",
            type: "POST",
            data: {
                barang_qty: barang_qty,
                barang_id: barang_id,
            },

            success: function(data) {
                if (data == "200") {
                    swal({
                            title: "Success",
                            text: "Your request has been processed!",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "OK",
                            closeOnConfirm: false
                        },
                        function() {
                            $(location).attr('href', "http://localhost/eai_toko/eai_toko/page_warehouse.php");
                        });
                }
            },
            error: function(xhr, status, error) {
                swal("Error deleting!", "Please try again", "error");
            }
        });
    });
</script>