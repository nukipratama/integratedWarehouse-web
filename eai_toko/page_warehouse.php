<?php
session_start();
include './component/template/header.php';
?>

<div class="transition-fade text-white">
    <h2><i class="fas fa-boxes"></i> Warehouse</h2>
    <div class="divider"></div>
    <div class="m-2 row ">
        <table id="example" class="table  table-dark table-striped text-white nowrap">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Item Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $request = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/items");
                $request = json_decode($request, true);

                foreach ($request["values"] as $key) {
                    ?>

                    <tr>
                        <td><?= $key['no'] ?></td>
                        <td><?= $key['barang_name'] ?></td>
                        <td><?= $key['barang_cat'] ?></td>
                        <td><?= 'Rp.' . $key['barang_price'] ?></td>
                        <td><a class="btn btn-info" href="<?= $_SESSION['url'] ?>page_itemDetails.php?id=<?= $key['barang_id'] ?>"><i class="fas fa-info-circle text-white"></i> Details
                            </a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Details</th>
                </tr>
            </tfoot>
        </table>

    </div>
</div>

<?php
include './component/template/footer.php';
?>