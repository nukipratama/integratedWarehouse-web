"use strict";
var response = require("../response");
var connection = require("../connection");

exports.loginQuery = function(req, res) {
  var uname = req.body.users_uname;
  var pass = req.body.users_pass;
  connection.query(
    "SELECT * FROM `tb_users` WHERE  `users_uname` = ? AND `users_pass` = ? ",
    [uname, pass],
    function(error, rows, fields) {
      if (rows.length > 0) {
        response.ok(200, rows, res);
      } else {
        response.ok(401, rows, res);
      }
    }
  );
};
