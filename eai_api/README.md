## LOGIN

- method = GET
- endpoint = localhost:3000/{outletID}/login
- body = users_uname,users_pass

## ADD USER (WAREHOUSE)

- method = POST
- endpoint = localhost:3000/{outletID}/addUser
- body = users_outletID,users_uname,users_pass,users_email,users_role

## ADD OUTLET (WAREHOUSE)

- method = POST
- endpoint = localhost:3000/{outletID}/addOutlet
- body = outlet_role,outlet_name,outlet_desc,outlet_address

## ADD ITEM (WAREHOUSE)

- method = POST
- endpoint = localhost:3000/{outletID}/addItem
- body = barang_name,barang_desc,barang_cat,barang_price,barang_img

## GET ITEM

- method = GET
- endpoint = localhost:3000/{outletID}/items

## GET ITEM DETAILS

- method = GET
- endpoint = localhost:3000/{outletID}/items/{barangID}
