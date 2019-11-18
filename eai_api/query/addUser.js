"use strict";
var response = require("../response");
var connection = require("../connection");

exports.addUserQuery = function(req, res) {
  var outid = req.params.outletID;
  connection.query(
    "SELECT * FROM `tb_outlet` WHERE `outlet_id`=?",
    [outid],
    function(error, rows, fields) {
      if (rows.length < 1) {
        response.ok(401, "rows", res);
      } else {
        if (rows[0]["outlet_role"] !== "warehouse") {
          response.ok(401, "rows", res);
        } else {
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
                response.ok(400, error.sqlMessage, res);
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
