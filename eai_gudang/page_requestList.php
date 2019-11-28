<?php include "./assets/component/header.php";
$request = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/requests");
$request = json_decode($request, true);
foreach ($request["values"] as $index => $value) {
  $requestDetail = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/items/" . $value['req_barangID']);
  $requestDetail = json_decode($requestDetail, true);
  foreach ($requestDetail["values"] as $key) {
    $request["values"][$index]["barang_name"] = $key["barang_name"];
    $request["values"][$index]["barang_cat"] = $key["barang_cat"];
    $request["values"][$index]["barang_id"] = $key["barang_id"];
  }
  $outletDetail = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/outlet/" . $value['req_outletID']);
  $outletDetail = json_decode($outletDetail, true);
  foreach ($outletDetail["values"] as $key) {
    $request["values"][$index]["outlet_name"] = $key["outlet_name"];
  }
}
?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-success">
            <h4 class="card-title ">Request List</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>No</th>
                  <th>Outlet</th>
                  <th>Barang</th>
                  <th>Qty</th>
                  <th>Tanggal</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php foreach ($request["values"] as $key => $value) : ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $value['outlet_name'] ?></td>
                      <td class="font-weight-bold"><?= $value["barang_name"] ?></td>
                      <td><?= $value['req_barangQty'] . " pcs" ?></td>
                      <td>
                        <?php
                          $dt =  strtotime($value["req_date"]);
                          echo date("D d-m-Y H:i:s T", $dt);
                          ?>
                      </td>
                      <td>
                        <button type="button" rel="tooltip" id="send_<?= $value['no'] ?>" class="btn btn-sm btn-info">
                          <i class="material-icons">send</i>
                        </button>
                        <script>
                          $("#send_<?= $value['no'] ?>").click(function() {
                            Swal.fire({
                              title: 'Are you sure?',
                              icon: 'warning',
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'Yes',
                              showCancelButton: true
                            }).then((result) => {
                              if (result.value) {
                                Swal.fire(
                                  'Sent!',
                                  'Barang Telah Dikirim.',
                                  'success'
                                )
                                $(location).attr('href', "./script/sendStock.php?id=<?= $value['no'] ?>");
                              }
                            })
                          });
                        </script>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  <tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <?php include "./assets/component/footer.php" ?>
      </body>

      </html>