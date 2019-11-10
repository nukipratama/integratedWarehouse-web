"use strict";
var index = require("./query/index");
var login = require("./query/login");
var addUser = require("./query/addUser");
var addOutlet = require("./query/addOutlet");
var addItem = require("./query/addItem");
var getItem = require("./query/getItem");

exports.index = function(req, res) {
  index.index(req, res);
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

exports.addItem = function(req, res) {
  addItem.addItemQuery(req, res);
};

exports.getItem = function(req, res) {
  getItem.getItemQuery(req, res);
};
exports.getItemDetails = function(req, res) {
  getItem.getItemDetailsQuery(req, res);
};
