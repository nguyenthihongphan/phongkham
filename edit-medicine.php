<?php 
session_start();
if(isset($_SESSION['id']) &&isset($_SESSION['user'])&&isset($_SESSION['pass'])&&isset($_SESSION['phanquyen']))
{
	include("./assets/login_tmd.php");
	$q= new login();
	$q->confirmlogin($_SESSION['id'],$_SESSION['user'],$_SESSION['pass'],$_SESSION['phanquyen']);
	}
else
{
	header('location: index.php');
	}

$iduser=$_SESSION['id'];
$layid = $_SESSION['id'];
$ten=$q->luachon("select ten from taikhoan where id='$iduser' limit 1");


include('./assets/qlthuoc.php');
$p = new qlthuoc();
$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Cập nhật thuốc</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="index.php" class="logo">
                    <img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng khám</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
            <ul class="nav user-menu float-right">
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="login.php">Đăng xuất</a>
                    </div>
                </li>
            </ul>
            
        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard"></i> <span>Trang chủ</span></a>
                        </li>
                        <li>
                            <a href="doctors.php"><i class="fa fa-user-md"></i> <span>Bác sĩ</span></a>
                        </li>
                        <li>
                            <a href="patients.php"><i class="fa fa-wheelchair"></i> <span>Bệnh nhân</span></a>
                        </li>
                        <li>
                            <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Lịch hẹn khám</span></a>
                        </li>
                        <li>
                            <a href="schedule.php"><i class="fa fa-calendar-check-o"></i> <span>Lịch trình bác sĩ</span></a>
                        </li>
    
                        <li >
                            <a href="employees.php"><i class="fa fa-user"></i> <span> Nhân viên </span></a>
                        </li>
                        <li >
                            <a href="medicine.php"><i class="fa fa-stethoscope"></i><span> Thuốc </span></a>
                        </li>
                       
                        <li class="submenu">
                            <a href="#"><i class="fa fa-commenting-o"></i> <span> Bài viết</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="blog.php">Bài viết</a></li>
                                <li><a href="add-blog.php">Thêm bài viết</a></li>
                                <li><a href="edit-blog.php">Sửa bài viết</a></li>
                            </ul>
                        </li>
                       
                       
                    </ul>
                </div>
            </div>
        </div>
  <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Thêm thuốc</h4>
                    </div>
                </div>
                <div class="row">
 <form enctype="multipart/form-data" method="post" >
                    <div class="col-lg-8 offset-lg-2">
                       
                            <div class="row">
                            
<div class="col-sm-6">
 <?php $idloaithuoc = $p->luachon("select idloaithuoc from chitietdonthuoc where id='$layid' limit 1 ");?>
            <div class="form-group">
                <label for="title"> Loại thuốc:</label>
                <select  name="loai" class="form-control" style="width:350px">
                       
                <option><?php  echo $p->luachon("select id,loaithuoc from thuoc order by id");?></option>
                
                    <?php
                        require('./assets/db_config.php');
                        $sql = "SELECT * FROM thuoc "; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['loaithuoc']."</option>";
                        }
                    ?>


                
                </select>
            </div>
            </div>
           
            <div class="col-sm-6">
             <div class="form-group">
                                <label>Tên thuốc</label>
                                <input class="form-control" type="text" id="ngaykham" name="tenthuoc" value="<?php  echo $q->luachon("select tenthuoc from chitietdonthuoc where id='$layid' limit 1");?>" />
                            </div>
</div>
 <div class="col-sm-6">
             <div class="form-group">
                                <label>Xuất xứ</label>
                                <input class="form-control" type="text" id="giokham" name="xuatxu" value="<?php  echo $q->luachon("select xuatxu from chitietdonthuoc where id='$layid' limit 1");?>" />
                            </div>

</div>
 <div class="col-sm-6">
             <div class="form-group">
                                <label>Giá</label>
                                <input class="form-control" type="text" id="giokham" name="gia" value="<?php  echo $q->luachon("select gia from chitietdonthuoc where id='$layid' limit 1");?>" />
                            </div>

</div>
<div class="col-sm-6">
             <div class="form-group">
                                <label>Đơn vị tính</label>
                                <input class="form-control" type="text" id="giokham" name="donvitinh" value="<?php  echo $q->luachon("select donvitinh from chitietdonthuoc where id='$layid' limit 1");?>" />
                            </div>

</div>
</div>
                 <div class="m-t-20 text-center">
                               
                                <input type="submit"  class="btn btn-primary submit-btn"  id="sua" name="sua" value="Cập nhật"/>
                            </div>
   <?php

	switch ($_POST['sua'])
	{
		
		case'Cập nhật':
	{	$idsua= $_REQUEST['id'];
		$thuoc= $_REQUEST['thuoc'];
		$loai=$_REQUEST['loai'];
		$phanloai=$_REQUEST['idloaithuoc'];
		$tenthuoc =$_REQUEST['tenthuoc'];
		$gia =$_REQUEST['gia'];
		$donvitinh =$_REQUEST['donvitinh'];
		$xuatxu =$_REQUEST['xuatxu'];
		
		if($donvitinh!='' && $xuatxu!='')
		{			
			if($idsua>0)		  
		  			{
				 if($p->themxoasua("update chitietdonthuoc set idloaithuoc='$loai', tenthuoc='$tenthuoc', gia='$gia', donvitinh='$donvitinh', xuatxu='$xuatxu' where id='$idsua' limit 1 ")==1)

				{	
					echo '<script language="javascript">alert("Cập nhật thành công!"); window.location="medicine.php";</script>';
					}
				else
				{
					echo' Cập nhật không thành công';
				}
			}
			else
			
		{echo 'Vui lòng nhập đầy đủ';
			}
		}

	break;
	
	}
}
?>
             </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
				$('#datetimepicker4').datetimepicker({
                    format: 'LT'
                });
            });


</script>
</body>


<!-- edit-schedule24:07-->
</html>
