"use strict";

module.exports = function(app) {
  var todoList = require("./controller");
  app.route("/").get(todoList.index);
  app.route("/:users_outletID/login/").get(todoList.login);
  app.route("/:users_outletID/addUser/").post(todoList.addUser);
};
