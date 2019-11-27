"use strict";
var response = require("../response");
var connection = require("../connection");

exports.getTransactionQuery = function(req, res) {
  var oid = req.params.outletID;
  connection.query(
    "SELECT * FROM `tb_outlet` WHERE `outlet_id`=?",
    [oid],
    function(error, rows, fields) {
      if (rows.length < 1) {
        response.ok(401, "rows", res);
      } else {
        connection.query(
          "SELECT * FROM `tb_history` WHERE `history_outletId` = ? ORDER BY `no` DESC",
          [oid],
          function(error, rows, fields) {
            if (error) {
              response.ok(400, error.sqlMessage, res);
            } else {
              response.ok(200, rows, res);
            }
          }
        );
      }
    }
  );
};
