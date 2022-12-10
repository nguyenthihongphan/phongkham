<?php 
session_start();
if(isset($_SESSION['id']) &&isset($_SESSION['user'])&&isset($_SESSION['pass'])&&isset($_SESSION['phanquyen']))
{
	include("../Admin/assets/login_tmd.php");
	$q= new login();
	$q->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['phanquyen']);
	}
else
{
	header('location:../Admin/login.php');
	}
include("../Admin/assets/db_config.php");
$iduser=$_SESSION['id'];
$ten=$q->luachon("SELECT tenbs
FROM bacsi
JOIN taikhoan ON bacsi.tenbs = taikhoan.ten");
$idck=$q->luachon("SELECT idck
FROM bacsi where tenbs limit 1");


	 
	
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	{
		
	case "load_slot":
				  
				  $request_time   = $_REQUEST['request_time'];
				  $request_date   = $_REQUEST['request_date'];
				  $range   = $_REQUEST['range'];

				$sqlmain=$q->luachon(" select slot_time from slot order by id desc");
				$mysqli_result =  $mysqli->query($sqlmain);;
			$str .= "<div>".$request_date.":";
						
				
				  for($k=0;$k<$range;$k++)
				  {	
				  
						  
						 	$request_date = date("Y-m-d",strtotime($request_date. " + 1 day"));
						 
					
						for($i=0;$i<count($mysqli_result);$i++)
						{
							
							$str .= '<button onClick="setSlot(event,\''.$mysqli_result[$i].'\',\''.$request_date.'\');"  class="btn" >'.$mysqli_result.'</button>&nbsp;';	}
						$str .= "<div><br>";
				  }
				
		      break;
}
?>