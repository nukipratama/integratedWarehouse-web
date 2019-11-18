"use strict";
var response = require("../response");
var connection = require("../connection");

exports.updateRequestQuery = function(req, res) {
  var oid = req.params.outletID;
  var no = req.params.no;
  var barangJSON;
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
                response.ok(400, error.sqlMessage, res);
              } else {
                barangJSON = rows[1][0];
                connection.query(
                  "SELECT * FROM `tb_stock` WHERE `stock_outletID` = ? AND `stock_barangID` = ?",
                  [barangJSON.req_outletID, barangJSON.req_barangID],
                  function(error, rows, fields) {
                    if (rows.length < 1) {
                      connection.query(
                        "INSERT INTO `tb_stock`(`stock_outletID`,`stock_barangID`,`stock_barangQty`) VALUES (?,?,?)",
                        [
                          barangJSON.req_outletID,
                          barangJSON.req_barangID,
                          barangJSON.req_barangQty
                        ],
                        function(error, rows, fields) {
                          if (error) {
                            response.ok(400, error.sqlMessage, res);
                          } else {
                            rows.message = "Data Inserted";
                            response.ok(200, rows, res);
                          }
                        }
                      );
                    } else {
                      connection.query(
                        "UPDATE `tb_stock` SET `stock_barangQty`=`stock_barangQty` + ? WHERE `stock_barangID` = ? AND `stock_outletID` = ?",
                        [
                          barangJSON.req_barangQty,
                          barangJSON.req_barangID,
                          barangJSON.req_outletID
                        ],
                        function(error, rows, fields) {
                          if (error) {
                            console.log(barangJSON.req_outletID);
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
              }
            }
          );
        }
      }
    }
  );
};
