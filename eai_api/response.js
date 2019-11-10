"use strict";

exports.ok = function(status, values, res) {
  switch (status) {
    case 200:
      var data = {
        status: status,
        values: values
      };
      break;
    case 400:
      var data = {
        status: status,
        values: values
      };
      break;
    case 404:
      var data = {
        status: status,
        values: "Not Found"
      };
      break;
    case 401:
      var data = {
        status: status,
        values: "Unauthorized"
      };
      break;
  }
  res.json(data);
  res.end();
};
