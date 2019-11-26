<?php
include './component/template/header.php';
$response = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/requests");
$response = json_decode($response, true);

?>
<div class="transition-fade">
    <h2>Recent Requests</h2>
    <div class="divider"></div>
    <?php
    foreach ($response["values"] as $key) { ?>
        <div class="row">
            <div class="col-md-8">
                <?php
                    $dt =  strtotime($key['req_date']);
                    echo date("Y-m-d H:i:s T", $dt);
                    ?>
            </div>
        </div>
    <?php } ?>
</div>

<?php
include './component/template/footer.php';
