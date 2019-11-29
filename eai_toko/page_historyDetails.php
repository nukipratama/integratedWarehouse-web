<?php
include './component/template/header.php';

$request = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/transaction/" . $_GET['id']);
$request = json_decode($request, true);

foreach ($request["values"] as $key) {
    $item = json_decode($key["history_barangObject"], true);
    ?>

    <div class="transition-fade text-white">
        <h2><a href="<?= $_SESSION['url'] ?>page_history.php"><i class="fas fa-chevron-circle-left"></i></a> <?php
                                                                                                                    $dt =  strtotime($key["history_date"]);
                                                                                                                    echo date("l j-M-Y H:i:s T", $dt);
                                                                                                                    ?></h2>
        <div class="divider"></div>
        <div class="m-2 row">

            <div class="col-md-12">
                <table class="table table-light ">
                    <thead class="thead-dark text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach ($item as $index => $value) :
                                $requestDetail = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/items/" . $value['id']);
                                $requestDetail = json_decode($requestDetail, true);
                                foreach ($requestDetail["values"] as $jsonDetail) {
                                    ?>
                                <tr>
                                    <th scope="row"><?= $index + 1 ?></th>
                                    <td><?= $jsonDetail['barang_name'] ?></td>
                                    <td><?= $value['qty'] ?></td>
                                    <td><?= 'Rp ' . $jsonDetail['barang_price'] ?></td>
                                    <td><?= 'Rp ' . $value['qty'] * $jsonDetail['barang_price'] ?></td>
                                </tr>
                        <?php }
                            endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="thead-dark text-center">
                            <th colspan="4" scope="col">Total</th>
                            <th scope="col"><?= 'Rp ' . $key['history_totalPrice'] ?></th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>

<?php
    include './component/template/footer.php';
}

?>