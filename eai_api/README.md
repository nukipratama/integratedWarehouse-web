## login = mencocokkan data login aplikasi

- method = GET
- endpoint = localhost:3000/login
- body = users_uname,users_pass

## addUser (WAREHOUSE) = menambahkan user

- method = POST
- endpoint = localhost:3000/{outletID}/addUser
- body = users_outletID,users_uname,users_pass,users_email,users_role

## addOutlet (WAREHOUSE) = menambahkan katalog outlet

- method = POST
- endpoint = localhost:3000/{outletID}/addOutlet
- body = outlet_role,outlet_name,outlet_desc,outlet_address

## addItem (WAREHOUSE) = menambahkan katalog barang

- method = POST
- endpoint = localhost:3000/{outletID}/addItem
- body = barang_name,barang_desc,barang_cat,barang_price,barang_img

## items = menampilkan katalog barang keseluruhan

- method = GET
- endpoint = localhost:3000/{outletID}/items

## items/{barang_id} = menampilkan katalog detail barang

- method = GET
- endpoint = localhost:3000/{outletID}/items/{barang_id}

## requestStock = menambahkan request stock outlet

- method = POST
- endpoint = localhost:3000/{outletID}/requestStock/{barang_id}
- body = req_barangQty

## requests (WAREHOUSE) = menampilkan semua request order cabang

- method = GET
- endpoint = localhost:3000/{outletID}/requests

## requestStock (WAREHOUSE) = mengupdate status request barang

- method = PUT
- endpoint = localhost:3000/{outletID}/requestStock/{no}

## stocks = menampilkan stock cabang

- method = GET
- endpoint = localhost:3000/{outletID}/stocks

## transaction = menambahkan daftar transaksi

- method = POST
- endpoint = localhost:3000/{outletID}/transaction
- body = barangObject,totalPrice

## transaction = menampilkan semua daftar transaksi

- method = GET
- endpoint = localhost:3000/{outletID}/transaction

## outlet (WAREHOUSE) = menampilkan keterangan outlet

- method = GET
- endpoint = localhost:3000/{warehouseID}/outlet/{outletID}

## outlet (WAREHOUSE) = menampilkan semua daftar outlet

- method = GET
- endpoint = localhost:3000/{warehouseID}/outlet/
