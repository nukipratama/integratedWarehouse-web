"use strict";
var response = require("../response");
var connection = require("../connection");

exports.addOutletQuery = function(req, res) {
  var oid = req.params.users_outletID;
  connection.query(
    "SELECT `outlet_role` FROM `tb_outlet` WHERE `outlet_id` = ? ",
    [oid],
    function(error, rows, fields) {
      if (error) {
        console.log(error);
      } else {
        if (rows[0]["outlet_role"] == "warehouse") {
          addUser(req, res);
        } else {
          response.ok(401, rows, res);
        }
      }
    }
  );
};

function addUser(req, res) {
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
        console.log(error);
      } else {
        rows.message = "Data Inserted";
        response.ok(200, rows, res);
      }
    }
  );
}

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
