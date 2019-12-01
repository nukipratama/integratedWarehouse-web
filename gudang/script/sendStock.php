<?php
session_start();

if (isset($_GET['id'])) {

    $options = array(
        CURLOPT_CUSTOMREQUEST     => "PUT",
        CURLOPT_HEADER            => false,
        CURLOPT_USERAGENT         => "Barokah Mart",
        CURLOPT_RETURNTRANSFER    => true,
        CURLOPT_HTTPHEADER        => array('Content-Type:application/json'),
    );

    $ch = curl_init('http://localhost:3000/' . $_SESSION['outletID'] . '/requestStock/' . $_GET['id']);
    curl_setopt_array($ch, $options);
    $response = json_decode(curl_exec($ch), true);
    if ($response['status'] === 200) {
        return header("Location:../page_requestList.php");
    }
}
