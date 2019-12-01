<?php
include './component/template/header.php';
$request = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/transaction");
$request = json_decode($request, true);

?>

<div class="transition-fade text-white">
    <h2><i class="fas fa-history    "></i> History</h2>
    <div class="divider"></div>

    <div class="row" id="btnFilter">
        <?php
        foreach ($request["values"] as $key) {
            ?>
            <div class="cards col-md-12 mt-3">
                <a href="<?= $_SESSION['url'] ?>page_historyDetails.php?id=<?= $key['no'] ?>">
                    <div class="card text-dark h-100 w-100">
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-md-3">
                                    <span class="text-muted">Transaction ID</span>
                                    <h5 class="card-title" id="no"><?= $key['no'] ?></h5>
                                </div>
                                <div class="col-md-4">
                                    <span class="text-muted">Total Price</span>
                                    <h5 class="card-title" id="price"><?= 'Rp ' . $key["history_totalPrice"] ?></h5>
                                </div>
                                <div class="col-md-5">
                                    <span class="text-muted">Date</span>
                                    <h5 class="card-title" id="date">
                                        <?php
                                            $dt =  strtotime($key["history_date"]);
                                            echo date("l j-M-Y H:i:s T", $dt);
                                            ?>
                                    </h5>
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