"use strict";
var response = require("../response");
var connection = require("../connection");

exports.outletsQuery = function(req, res) {
  var wid = req.params.warehouseID;
  var oid = req.params.outletID;
  connection.query(
    "SELECT * FROM `tb_outlet` WHERE `outlet_id`=?",
    [wid],
    function(error, rows, fields) {
      if (rows.length < 1) {
        response.ok(401, "rows", res);
      } else {
        if (rows[0]["outlet_role"] !== "warehouse") {
          response.ok(401, "rows", res);
        } else {
          connection.query(
            "SELECT * FROM `tb_outlet` WHERE  `outlet_id` = ?",
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
    }
  );
};
exports.outletAllQuery = function(req, res) {
  var wid = req.params.warehouseID;
  var oid = req.params.outletID;
  connection.query(
    "SELECT * FROM `tb_outlet` WHERE `outlet_id`=?",
    [wid],
    function(error, rows, fields) {
      if (rows.length < 1) {
        response.ok(401, "rows", res);
      } else {
        if (rows[0]["outlet_role"] !== "warehouse") {
          response.ok(401, "rows", res);
        } else {
          connection.query("SELECT * FROM `tb_outlet`", function(
            error,
            rows,
            fields
          ) {
            if (error) {
              response.ok(400, error.sqlMessage, res);
            } else {
              response.ok(200, rows, res);
            }
          });
        }
      }
    }
  );
};
