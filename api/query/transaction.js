"use strict";
var response = require("../response");
var connection = require("../connection");

exports.transactionQuery = function(req, res) {
  var oid = req.params.outletID;
  connection.query(
    "SELECT * FROM `tb_outlet` WHERE `outlet_id`=?",
    [oid],
    function(error, rows, fields) {
      if (rows.length < 1) {
        response.ok(401, "rows", res);
      } else {
        var barangObject = req.body.barangObject;
        var totalPrice = req.body.totalPrice;
        var barangExport = JSON.parse(barangObject);
        for (var index = 0; index < barangExport.length; ++index) {
          connection.query(
            "UPDATE `tb_stock` SET `stock_barangQty`=`stock_barangQty` - ? WHERE `stock_barangID` = ? AND `stock_outletID` = ?",
            [barangExport[index].qty, barangExport[index].id, oid],
            function(error, rows, fields) {
              if (error) {
                response.ok(400, error.sqlMessage, res);
              }
            }
          );
        }
        connection.query(
          "INSERT INTO `tb_history`(`history_barangObject`,`history_totalPrice`,`history_outletId`) VALUES (?,?,?)",
          [barangObject, totalPrice, oid],
          function(error, rows, fields) {
            if (error) {
              response.ok(400, error.sqlMessage, res);
            } else {
              rows.message = "Data Updated";
              response.ok(200, rows, res);
            }
          }
        );
      }
    }
  );
};
