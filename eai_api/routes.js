"use strict";

module.exports = function(app) {
  var todoList = require("./controller");

  app.route("/:outletID/").get(todoList.index);
  app.route("/:outletID/login/").get(todoList.login);
  app.route("/:outletID/items/").get(todoList.getItem);
  app.route("/:outletID/items/:barang_id").get(todoList.getItemDetails);

  app.route("/:outletID/addUser/").post(todoList.addUser);
  app.route("/:outletID/addOutlet/").post(todoList.addOutlet);
  app.route("/:outletID/addItem/").post(todoList.addItem);
};
