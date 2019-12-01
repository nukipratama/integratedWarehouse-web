<?php include "./assets/component/header.php";
$request = file_get_contents("http://localhost:3000/" . $_SESSION['outletID'] . "/outlet");
$request = json_decode($request, true);
?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-warning">
            <h4 class="card-title">User</h4>
            <p class="card-category">Add New User to Warehouse</p>
          </div>
          <br>
          <div class="card-body">
            <form action="./script/addUser.php" method="POST">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="outletName">Outlet Name</label>
                    <select class="form-control" name="users_outletID" id="outletName">
                      <option></option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Username</label>
                    <input type="text" name="users_uname" required class="form-control">
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Password</label>
                    <input type="password" name="users_pass" minlength="8" required class="form-control">
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">E-Mail</label>
                    <input type="email" name="users_email" required class="form-control">
                  </div>
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Role</label>
                    <input type="text" name="users_role" class="form-control">
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" name="submit" id="btnSave" class="btn btn-warning btn-round text-center">Save User</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>

      <?php include "./assets/component/footer.php" ?>

      <script>
        $(document).ready(function() {
          var select2data = <?= json_encode($request["values"]) ?>;
          var data = [];
          for (index = 0; index < select2data.length; ++index) {
            data.push({
              id: select2data[index].outlet_id,
              text: select2data[index].outlet_name
            });
          }

          $("#outletName").select2({
            placeholder: "items name..",
            allowClear: true,
            data: data
          });
        });
      </script>

      </body>

      </html>