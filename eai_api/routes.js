"use strict";

module.exports = function(app) {
  var todoList = require("./controller");
  // get
  app.route("/:outletID/").get(todoList.index);
  app.route("/:outletID/login/").get(todoList.login);
  app.route("/:outletID/requests/").get(todoList.requests);
  app.route("/:outletID/items/").get(todoList.getItem);
  app.route("/:outletID/items/:barang_id").get(todoList.getItemDetails);
  // post
  app.route("/:outletID/addUser/").post(todoList.addUser);
  app.route("/:outletID/addOutlet/").post(todoList.addOutlet);
  app.route("/:outletID/addItem/").post(todoList.addItem);
  app.route("/:outletID/requestStock/:barang_id").post(todoList.requestStock);
  // put
  app.route("/:outletID/requestStock/:no").put(todoList.updateRequest);
};
