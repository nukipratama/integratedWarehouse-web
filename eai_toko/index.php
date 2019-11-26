<?php
if (isset($_GET['status'])) {
  switch ($_GET['status']) {
    case 401:
      echo '<div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
      <strong>Invalid Credentials!</strong> Please type your login credentials correctly.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&#10005;</span>
      </button>
  </div>';
      break;
    case 500:
      echo '<div class="alert alert-warning alert-dismissible fade show m-0" role="alert">
    <strong>Internal Server Error!</strong> Please try again in a few minutes.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&#10005;</span>
    </button>
  </div>';
      break;
  }
}
include './component/template/header.php';




include './component/template/footer.php';
