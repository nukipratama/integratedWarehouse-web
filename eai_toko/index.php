<?php
include './component/template/header.php';
if (!isset($_SESSION['outletID']) && !isset($_SESSION['loginName'])) {
  include './component/navbar/loggedOut.php';
} else {
  include './component/navbar/loggedIn.php';
}
include './component/template/footer.php';
