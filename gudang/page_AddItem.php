<?php include "./assets/component/header.php";
?>
<style>
    #barang_img {
        opacity: 1 !important;
        position: unset !important;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-header-success">
                        <h4 class="card-title">Item</h4>
                        <p class="card-category">Add New Item to Warehouse</p>
                    </div>
                    <br>
                    <div class="card-body">
                        <form action="./script/addItem.php" method="POST" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name</label>
                                        <input type="text" name="barang_name" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Description</label>
                                        <input type="text" name="barang_desc" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Category</label>
                                        <input type="text" name="barang_cat" required class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Price</label>
                                        <input type="number" name="barang_price" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group border-danger">
                                        <label for="exampleInputFile" class="bmd-label-floating">Image</label>
                                        <input type="file" name="barang_img" id="barang_img">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button type="submit" name="submit" id="btnSave" class="btn btn-warning btn-round text-center">Save Item</button>
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

            </body>

            </html>