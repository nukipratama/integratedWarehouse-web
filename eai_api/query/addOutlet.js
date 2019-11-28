"use strict";
var response = require("../response");
var connection = require("../connection");

exports.addOutletQuery = function(req, res) {
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
          var oid = makeid(20);
          var role = req.body.outlet_role;
          var name = req.body.outlet_name;
          var desc = req.body.outlet_desc;
          var address = req.body.outlet_address;
          connection.query(
            "INSERT INTO `tb_outlet`(`outlet_id`,`outlet_role`,`outlet_name`,`outlet_desc`,`outlet_address`) VALUES (?,?,?,?,?)",
            [oid, role, name, desc, address],
            function(error, rows, fields) {
              if (error) {
                response.ok(400, error.sqlMessage, res);
              } else {
                rows.message = "Data Inserted";
                rows.outletID = oid;
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
