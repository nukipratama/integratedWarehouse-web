<?php include "./assets/component/header.php" ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Outlet</h4>
            <p class="card-category">Add New Outlet to Warehouse</p>
          </div>
          <br>
          <div class="card-body">
            <form action="./script/addOutlet.php" method="POST">
              <div class="row">
                <div class="col-md-4">
                  <h5 class="card-title">Choose Role</h5>
                </div>
                <div class="col-md-4">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="outlet_role" class="custom-control-input" value="warehouse">
                    <label class="custom-control-label" for="customRadioInline1">Gudang</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="outlet_role" class="custom-control-input" value="store" checked>
                    <label class="custom-control-label" for="customRadioInline2">Cabang</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name Of The New Outlet</label>
                    <input type="text" name="outlet_name" required class="form-control">
                  </div>
                </div>

              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Adress</label>
                    <input type="text" name="outlet_address" required class="form-control">
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Outlet Decription</label>
                    <textarea class="form-control" name="outlet_desc" rows="5" required></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" id="btnSubmit" name="submit" class="btn btn-primary btn-round text-center">Save Outlet</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>


      <?php
      include('./assets/component/footer.php');
      ?>


      </body>

      </html>