"use strict";
var response = require("../response");
var connection = require("../connection");

exports.addUserQuery = function(req, res) {
  var oid = req.params.users_outletID;
  connection.query(
    "SELECT `outlet_role` FROM `tb_outlet` WHERE `outlet_id` = ? ",
    [oid],
    function(error, rows, fields) {
      if (error) {
        console.log(error);
      } else {
        if (rows[0]["outlet_role"] == "warehouse") {
          response.ok(200, rows, res);
        } else {
          response.ok(401, rows, res);
        }
      }
    }
  );
};
// function addUser(req, res) {}
