<?php
session_start();
if (isset($_POST['submit'])) :
    $data = [
        'users_outletID' => $_POST['users_outletID'],
        'users_uname' => $_POST['users_uname'],
        'users_pass' => $_POST['users_pass'],
        'users_email' => $_POST['users_email'],
        'users_role' => $_POST['users_role']
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

    $ch = curl_init('http://localhost:3000/warehouse/addUser');
    curl_setopt_array($ch, $options);
    $response = json_decode(curl_exec($ch), true);
    ?>
    <script>
        alert("New user added for <?= $_POST['users_outletID'] ?>");
        window.location.href = "../page_AddUser.php";
    </script>
<?php
endif;
