<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <!-- Bootstrap , Avant UI and Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
  <link rel="stylesheet" href="./assets/css/avantui.min.css" />
  <link rel="stylesheet" href="./assets/css/styles.css" />

  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

  <title>Barokah Mart POS</title>
</head>

<body class="bg-github">
  <?php
  if (isset($_SESSION['outletID']) && isset($_SESSION['loginName'])) {
    include './component/navbar/loggedIn.php';
  } else {
    if (strpos($_SERVER['PHP_SELF'], 'index.php') !== false) { } else {
      return header("Location:./index.php");
    }
    include './component/navbar/loggedOut.php';
  }
