"use strict";
var response = require("../response");
var connection = require("../connection");

exports.requestStockQuery = function(req, res) {
  var oid = req.params.outletID;

  connection.query(
    "SELECT * FROM `tb_outlet` WHERE `outlet_id`=?",
    [oid],
    function(error, rows, fields) {
      if (rows.length < 1) {
        response.ok(401, "rows", res);
      } else {
        var bid = req.params.barang_id;
        var qty = req.body.req_barangQty;
        connection.query(
          "INSERT INTO `tb_request`(`req_outletID`,`req_barangID`,`req_barangQty`) VALUES (?,?,?)",
          [oid, bid, qty],
          function(error, rows, fields) {
            if (error) {
              response.ok(400, error.code, res);
            } else {
              rows.message = "Data Inserted";
              response.ok(200, rows, res);
            }
          }
        );
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
