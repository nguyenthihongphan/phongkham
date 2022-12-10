<?php


define (DB_USER, "pkgd");
define (DB_PASSWORD, "123456");
define (DB_DATABASE, "phongkham");
define (DB_HOST, "localhost");

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
$mysqli->set_charset("utf8");
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}


?>
