function totalPrice() {
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
  var itemsPrice = $("input[id='price[]']")
    .map(function() {
      return $(this).val();
    })
    .get();
  var total = 0;
  for (index = 0; index < itemsID.length; ++index) {
    total += itemsQty[index] * itemsPrice[index];
  }
  var total = (total / 1000).toFixed(3);
  return total;
}
$(document).on("change", "input", function() {
  $("#totalPrice").html(totalPrice);
});
$(document).ready(function() {
  var data = [];
  for (index = 0; index < stock.length; ++index) {
    data.push({
      id: stock[index].stock_barangID,
      text:
        stock[index].barang_name +
        " (Qty: " +
        stock[index].stock_barangQty +
        ")",
      name: stock[index].barang_name,
      price: stock[index].barang_price,
      qty: stock[index].stock_barangQty
    });
  }

  $(".select2-demo").select2({
    placeholder: "items name..",
    allowClear: true,
    data: data
  });
  $(".select2-demo").on("select2:select", function(e) {
    var selected = e.params.data;
    var modal =
      `<div class="modal fade text-dark" id="` +
      selected.id +
      `_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">item qty for ` +
      selected.name +
      `</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Item Quantity</label>
                            <input type="number" name="` +
      selected.id +
      `_barangQty" class="form-control" id="barang_qty" aria-describedby="emailHelp" placeholder="enter qty amount" required>
                            <small id="emailHelp" class="form-text text-muted">please make sure you select the right item.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                        <button id="` +
      selected.id +
      `_input" type="button" class="btn btn-success">order now</button>
                    </div>
            </div>
        </div>
    </div>`;

    var div =
      `<div id="` +
      selected.id +
      `">
             <div class="cards col-md-12 mt-3">
              <div class="card text-dark h-100 w-100">
                  <div class="card-body">
                      <div class="row text-center">
                          <div class="col-md-4">
                              <span class="text-muted">Name</span>
                              <h5 class="card-title" id="name[]">` +
      selected.name +
      `</h5>
                          </div>
                          <div class="col-md-3">
                              <span class="text-muted">Price</span>
                              <h5 class="card-title" id="priceHtml[]">` +
      selected.price +
      `</h5>
                          </div>
                          <div class="col-md-3">
                              <span class="text-muted">Qty</span>
                              <input type="hidden"  id="id[]" value="` +
      selected.id +
      `">
      <input type="hidden"  id="price[]" value="` +
      selected.price +
      `">
                              <input type="number" name="` +
      selected.id +
      `_qty" id="qty[]"  class="form-control border-primary"
                              min="1" max="` +
      selected.qty +
      `">
                          </div>
                          <div class="col-md-2">
                              <button id="` +
      selected.id +
      `_remove" class="btn btn-danger mt-2"><i class="fas fa-trash-alt"></i></button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          </div>
          <script>
          $("#` +
      selected.id +
      `_input").click(function(event) {
        $("#` +
      selected.id +
      `_modal").modal("hide");
            var barang_qty = $("input[type=number][name=` +
      selected.id +
      `_barangQty]").val();
            $('input[type=number][name=` +
      selected.id +
      `_qty]').val(barang_qty);
      $("#totalPrice").html(totalPrice);
    });

          $("input[id='qty[]']").keyup(function() {
            $("#totalPrice").html(totalPrice);
          });
         

          $("#` +
      selected.id +
      `_remove").click(function(event) {
        $("#` +
      selected.id +
      `").remove();
      $("#totalPrice").html(totalPrice);
     
      })
          </script>`;

    if ($("#" + selected.id).length == 0) {
      $("body").append(modal);
      $("#" + selected.id + "_modal").modal("show");
      $("#cart").prepend(div);
    }

    $(".select2-demo")
      .val([])
      .trigger("change");

    $("#totalPrice").html(totalPrice);
  });
});
