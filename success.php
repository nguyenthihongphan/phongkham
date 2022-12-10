<?php 
	include 'connection.php';

  	$gotoPage = $_GET['goto_page'];

    $message = $_GET['message'];
     	
  	header("Location:$gotoPage?message=$message");

?>