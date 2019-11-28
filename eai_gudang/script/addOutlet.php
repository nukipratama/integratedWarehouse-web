<?php
session_start();
if (isset($_POST['submit'])) :
    $data = [
        'outlet_role' => $_POST['outlet_role'],
        'outlet_name' => $_POST['outlet_name'],
        'outlet_desc' => $_POST['outlet_desc'],
        'outlet_address' => $_POST['outlet_address']
    ];
    $payload = json_encode($data);
    $options = array(
        CURLOPT_CUSTOMREQUEST     => "POST",
        CURLOPT_HEADER            => false,
        CURLOPT_USERAGENT         => "Warehouse",
        CURLOPT_RETURNTRANSFER    => true,
        CURLOPT_HTTPHEADER        => array('Content-Type:application/json'),
        CURLOPT_POSTFIELDS        => $payload
    );

    $ch = curl_init('http://localhost:3000/warehouse/addOutlet');
    curl_setopt_array($ch, $options);
    $response = json_decode(curl_exec($ch), true);
    ?>
    <script>
        alert("This is your new Outlet ID, please save.. [<?= $response['values']["outletID"] ?>]");
        window.location.href = "../page_AddOutlet.php";
    </script>
<?php
endif;
