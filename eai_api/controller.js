"use strict";

var index = require("./query/index");
var login = require("./query/login");
var addUser = require("./query/addUser");
var addOutlet = require("./query/addOutlet");

exports.index = function(req, res) {
  index.index(res);
};

exports.login = function(req, res) {
  login.loginQuery(req, res);
};

exports.addUser = function(req, res) {
  addUser.addUserQuery(req, res);
};

exports.addOutlet = function(req, res) {
  addOutlet.addOutletQuery(req, res);
};
