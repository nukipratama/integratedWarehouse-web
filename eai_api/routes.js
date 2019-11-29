"use strict";

module.exports = function(app) {
  var todoList = require("./controller");
  // get
  app.route("/login").get(todoList.login);
  app.route("/:outletID/").get(todoList.index);
  app.route("/:outletID/requests/").get(todoList.requests);
  app.route("/:outletID/items/").get(todoList.getItem);
  app.route("/:outletID/stocks/").get(todoList.getStock);
  app.route("/:outletID/transaction/").get(todoList.getTransaction);
  app
    .route("/:outletID/transaction/:transactionID")
    .get(todoList.getTransactionDetail);
  app.route("/:warehouseID/outlet/").get(todoList.outletAll);
  app.route("/:warehouseID/outlet/:outletID").get(todoList.outlet);
  app.route("/:outletID/items/:barang_id").get(todoList.getItemDetails);
  // post
  app.route("/:outletID/addUser/").post(todoList.addUser);
  app.route("/:outletID/addOutlet/").post(todoList.addOutlet);
  app.route("/:outletID/addItem/").post(todoList.addItem);
  app.route("/:outletID/requestStock/:barang_id").post(todoList.requestStock);
  app.route("/:outletID/transaction/").post(todoList.transaction);
  // put
  app.route("/:outletID/requestStock/:no").put(todoList.updateRequest);
};
