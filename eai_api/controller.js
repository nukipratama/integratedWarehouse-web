"use strict";

exports.index = function(req, res) {
  var index = require("./query/index");
  index.index(req, res);
};

exports.login = function(req, res) {
  var login = require("./query/login");
  login.loginQuery(req, res);
};

exports.addUser = function(req, res) {
  var addUser = require("./query/addUser");
  addUser.addUserQuery(req, res);
};

exports.addOutlet = function(req, res) {
  var addOutlet = require("./query/addOutlet");

  addOutlet.addOutletQuery(req, res);
};

exports.addItem = function(req, res) {
  var addItem = require("./query/addItem");

  addItem.addItemQuery(req, res);
};

var getItem = require("./query/getItem");
exports.getItem = function(req, res) {
  getItem.getItemQuery(req, res);
};
exports.getItemDetails = function(req, res) {
  getItem.getItemDetailsQuery(req, res);
};

exports.requestStock = function(req, res) {
  var requestStock = require("./query/requestStock");
  requestStock.requestStockQuery(req, res);
};

exports.requests = function(req, res) {
  var requestStock = require("./query/requests");
  requestStock.requestsQuery(req, res);
};

exports.updateRequest = function(req, res) {
  var updateRequest = require("./query/updateRequest");
  updateRequest.updateRequestQuery(req, res);
};

exports.getStock = function(req, res) {
  var getItem = require("./query/getStock");
  getItem.getStockQuery(req, res);
};

exports.transaction = function(req, res) {
  var transaction = require("./query/transaction");
  transaction.transactionQuery(req, res);
};
exports.getTransaction = function(req, res) {
  var getTransaction = require("./query/getTransaction");
  getTransaction.getTransactionQuery(req, res);
};
