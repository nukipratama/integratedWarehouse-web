"use strict";
var response = require("../response");
exports.index = function(res) {
  response.ok("Hello from the Node JS RESTful side!", res);
};
