<?php
if (isset($_POST['submit'])) {

    $uploaddir = '../upload/';
    $uploadfile = $uploaddir . basename($_FILES['barang_img']['name']);

    if (move_uploaded_file($_FILES['barang_img']['tmp_name'], $uploadfile)) {
        $barang_img = "http://" . $_SERVER['HTTP_HOST'] . "/eai_toko/eai_gudang/upload/" . $_FILES['barang_img']['name'];

        $data = [
            'barang_name' => $_POST['barang_name'],
            'barang_desc' => $_POST['barang_desc'],
            'barang_cat' => $_POST['barang_cat'],
            'barang_price' => $_POST['barang_price'],
            'barang_img' => $barang_img
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

        $ch = curl_init('http://localhost:3000/warehouse/addItem');
        curl_setopt_array($ch, $options);
        $response = json_decode(curl_exec($ch), true);
        ?>
        <script>
            alert("New item added : <?= $_POST['barang_name'] ?>");
            window.location.href = "../page_productList.php";
        </script>

<?php
    } else {
        echo "Possible file upload attack!\n";
    }
}
