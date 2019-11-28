<?php
session_start();
if (isset($_POST['submit'])) {
    $data = [
        'users_uname' => $_POST['username'],
        'users_pass' => $_POST['password']
    ];
    $payload = json_encode($data);
    $options = array(
        CURLOPT_CUSTOMREQUEST     => "GET",
        CURLOPT_HEADER            => false,
        CURLOPT_USERAGENT         => "Warehouse",
        CURLOPT_RETURNTRANSFER    => true,
        CURLOPT_HTTPHEADER        => array('Content-Type:application/json'),
        CURLOPT_POSTFIELDS        => $payload
    );

    $ch = curl_init('http://localhost:3000/login');
    curl_setopt_array($ch, $options);
    $response = json_decode(curl_exec($ch), true);
    switch ($response['status']) {
        case 200:
            $_SESSION['outletID'] = $response['values'][0]['users_outletID'];
            $_SESSION['loginName'] = $response['values'][0]['users_Uname'];
            $_SESSION['loginRole'] = $response['values'][0]['users_role'];
            $_SESSION['loggedIn'] = true;
            return header("Location:../page_requestList.php");
        case 401:
            return header("Location:../index.php?status=401");
        default:
            return header("Location:../index.php?status=500");
    }
}
