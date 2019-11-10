"use strict";
var response = require("../response");
var connection = require("../connection");

exports.addItemQuery = function(req, res) {
  var oid = req.params.outletID;
  connection.query(
    "SELECT * FROM `tb_outlet` WHERE `outlet_id`=?",
    [oid],
    function(error, rows, fields) {
      if (rows.length < 1) {
        response.ok(401, "rows", res);
      } else {
        if (rows[0]["outlet_role"] !== "warehouse") {
          response.ok(401, "rows", res);
        } else {
          var id = makeid(5);
          var name = req.body.barang_name;
          var desc = req.body.barang_desc;
          var cat = req.body.barang_cat;
          var price = req.body.barang_price;
          var img = req.body.barang_img;

          connection.query(
            "INSERT INTO `tb_barang`(`barang_id`,`barang_name`,`barang_desc`,`barang_cat`,`barang_price`,`barang_img`) VALUES (?,?,?,?,?,?)",
            [id, name, desc, cat, price, img],
            function(error, rows, fields) {
              if (error) {
                response(400, error.code, res);
              } else {
                rows.message = "Data Inserted";
                response.ok(200, rows, res);
              }
            }
          );
        }
      }
    }
  );
};

function makeid(length) {
  var result = "";
  var characters =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  var charactersLength = characters.length;
  for (var i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  var d = new Date();
  return result + d.getTime();
}
