"use strict";
var response = require("../response");
var connection = require("../connection");

exports.index = function(req, res) {
  var oid = req.params.outletID;
  connection.query(
    "SELECT * FROM `tb_outlet` WHERE `outlet_id`=?",
    [oid],
    function(error, rows, fields) {
      if (rows.length < 1) {
        response.ok(401, "rows", res);
      } else {
        // if (rows[0]["outlet_role"] !== "warehouse") {
        //   response.ok(401, "rows", res);
        // } else {
        response.ok(200, "Hello, " + rows[0]["outlet_name"], res);
        // }
      }
    }
  );
};
