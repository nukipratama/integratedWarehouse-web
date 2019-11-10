"use strict";
var response = require("../response");
var connection = require("../connection");

exports.getItemQuery = function(req, res) {
  var oid = req.params.outletID;
  connection.query(
    "SELECT * FROM `tb_outlet` WHERE `outlet_id`=?",
    [oid],
    function(error, rows, fields) {
      if (rows.length < 1) {
        response.ok(401, "rows", res);
      } else {
        connection.query("SELECT * FROM `tb_barang`", function(
          error,
          rows,
          fields
        ) {
          if (error) {
            response.ok(400, error.code, res);
          } else {
            response.ok(200, rows, res);
          }
        });
      }
    }
  );
};

exports.getItemDetailsQuery = function(req, res) {
  var oid = req.params.outletID;
  connection.query(
    "SELECT * FROM `tb_outlet` WHERE `outlet_id`=?",
    [oid],
    function(error, rows, fields) {
      if (rows.length < 1) {
        response.ok(401, "rows", res);
      } else {
        var barang_id = req.params.barang_id;
        connection.query(
          "SELECT * FROM `tb_barang` WHERE `barang_id`=?",
          [barang_id],
          function(error, rows, fields) {
            if (error) {
              response.ok(400, error.code, res);
            } else {
              response.ok(200, rows, res);
            }
          }
        );
      }
    }
  );
};
