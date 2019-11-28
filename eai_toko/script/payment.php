<?php
session_start();

if (isset($_POST['barangObject'])) {
    $barangObject = json_encode($_POST['barangObject']);
    $data = [
        'barangObject' => $barangObject,
        'totalPrice' => $_POST['totalPrice']
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

    $ch = curl_init('http://localhost:3000/' . $_SESSION['outletID'] . '/transaction');
    curl_setopt_array($ch, $options);
    $response = json_decode(curl_exec($ch), true);
    echo $response['status'];
}
