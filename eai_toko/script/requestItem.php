<?php
session_start();
// echo $_POST['barang_id'];

if (isset($_POST['barang_id'])) {
    $data = [
        'req_barangQty' => $_POST['barang_qty']
    ];
    $payload = json_encode($data);
    $options = array(
        CURLOPT_CUSTOMREQUEST     => "POST",
        CURLOPT_HEADER            => false,
        CURLOPT_USERAGENT         => "Barokah Mart",
        CURLOPT_RETURNTRANSFER    => true,
        CURLOPT_HTTPHEADER        => array('Content-Type:application/json'),
        CURLOPT_POSTFIELDS        => $payload
    );

    $ch = curl_init('http://localhost:3000/' . $_SESSION['outletID'] . '/requestStock/' . $_POST['barang_id']);
    curl_setopt_array($ch, $options);
    $response = json_decode(curl_exec($ch), true);
    echo $response['status'];
}
