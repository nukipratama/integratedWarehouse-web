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
          addUser(req, res);
        } else {
          response.ok(401, rows, res);
        }
      }
    }
  );
};
function addUser(req, res) {
  var oid = req.body.users_outletID;
  var uname = req.body.users_uname;
  var pass = req.body.users_pass;
  var email = req.body.users_email;
  var role = req.body.users_role;
  connection.query(
    "INSERT INTO `tb_users`(`users_Uname`,`users_pass`,`users_email`,`users_role`,`users_outletID`) VALUES (?,?,?,?,?)",
    [uname, pass, email, role, oid],
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
