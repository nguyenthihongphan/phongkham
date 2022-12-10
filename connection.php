<?php 
$host = "localhost";
$user = "pkgd";
$password = "123456";
$db = "phongkham";
try {

  $con = new PDO("mysql:dbname=$db;port=3306;host=$host", 
  	$user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );

  // set the PDO error mode to exception
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: ".
   $e->getMessage();
  echo $e->getTraceAsString();
  exit;
}

session_start();

session_start();
function getPatients($con) {
$query = "select `id`, `tenbn`, `sdt` 
from `benhnhan` order by `tenbn` asc;";

	$stmt = $con->prepare($query);
	try {
		$stmt->execute();

	} catch(PDOException $ex) {
		echo $ex->getTraceAsString();
		echo $ex->getMessage();
		exit;
	}

	$data = '<option value="">Select Patient</option>';

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$data = $data.'<option value="'.$row['id'].'">'.$row['tenbn'].' ma bn ('.$row['id'].')'.'</option>';
	}

	return $data;
}

//24 minutes default idle time
// if(isset($_SESSION['ABC'])) {
// 	unset($_SESSION['ABC']);
// }

?>