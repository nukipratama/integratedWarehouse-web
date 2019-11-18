"use strict";
var response = require("../response");
var connection = require("../connection");

exports.updateRequestQuery = function(req, res) {
  var oid = req.params.outletID;
  var no = req.params.no;
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
          connection.query(
            "UPDATE `tb_request` SET `req_status` = '1' WHERE `tb_request`.`no` = ?;SELECT * FROM `tb_request` WHERE `tb_request`.`no` = ?;",
            [no, no],
            function(error, rows, fields) {
              if (error) {
                response.ok(400, error.code, res);
              } else {
                rows = rows[1];
                response.ok(200, rows, res);
              }
            }
          );
        }
      }
    }
  );
};
