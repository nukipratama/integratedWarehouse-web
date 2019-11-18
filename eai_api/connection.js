var mysql = require("mysql");

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "nuki",
  database: "db_awn_api",
  multipleStatements: true
});

con.connect(function(err) {
  if (err) throw err;
});

module.exports = con;
