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
$phanquyen=$q->luachon("select phanquyen from nhanvien limit 1");
$chucvu=$q->luachon("select chucvu from nhanvien limit 1");
include('./assets/qlnv.php');
$p = new qlnv();
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
    <title>Cập nhật nhân viên</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
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
                        <h4 class="page-title">Cập nhật nhân viên</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                       <label>Họ và tên<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="tennv" name="tennv" value="<?php echo $p->luachon("select tennv from nhanvien where id ='$layid' limit 1 ");?>"/>
                                    </div>
                                </div>
                               
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="usename" name="usename" required value="<?php  echo $q->luachon("select username from nhanvien where id='$layid' limit 1");?>" >
                                    </div>
                                </div>
                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" id="email" name="email" value="<?php  echo $p->luachon("select email from nhanvien where id='$layid' limit 1");?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mật khẩu <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="pass" name="pass" required value="<?php  echo $q->luachon("select password from nhanvien where id='$layid' limit 1");?>" >
                                    </div>
                                </div>
                               
                                
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ngày sinh</label>
                                        <div>
                                            <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" value="<?php echo $p->luachon("select ngaysinh from nhanvien where id ='$layid' limit 1 ");?>"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Giới tính:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" id="gioitinh" name="gioitinh" value="Nam" <?php if( $p->luachon("select gioitinh from nhanvien where id='$layid' limit 1")=="Nam"){ echo"checked";}?>/>Nam
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" class="form-check-input" id="gioitinh" name="gioitinh" value="Nữ" <?php if( $p->luachon("select gioitinh from nhanvien where id='$layid' limit 1")=="Nữ"){ echo"checked";}?>/>Nữ
											</label>
										</div>
									</div>
                                </div>
								
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input class="form-control" type="tel" id="sdt" name="sdt" value="<?php echo $p->luachon("select sdt from nhanvien where id ='$layid' limit 1 ");?>"/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
											<div class="form-group">
												<label>Địa chỉ</label>
												<input type="text" class="form-control" id="diachi" name="diachi" required value="<?php  echo $p->luachon("select diachi from nhanvien where id='$layid' limit 1");?>">
											</div>
										</div>
                             <div class="col-sm-6">
                             <div class="form-group">
                                <label>Phân quyền</label>
                                <input class="form-control" type="text" id="phanquyen" name="phanquyen" readonly value="<?php echo $phanquyen ;?>"/>
                            </div>
                            </div>
                             <div class="col-sm-6">
                             <div class="form-group">
                                <label>Chức vụ</label>
                                <input class="form-control" type="text" id="chucvu" name="chucvu" readonly	 value="<?php  echo $chucvu ;?>"/>
                            </div>
                            </div>
                            
                            <div class="m-t-20 text-center">
                               
                                <input type="submit"  class="btn btn-primary submit-btn" data-dismiss="modal" id="capnhat" name="capnhat" value="Cập nhật nhân viên"/>
                            </div>
    <?php

	switch ($_POST['capnhat'])
	{
		case'Cập nhật nhân viên':
	{	
		$idsua=$_REQUEST['id'];
		$tennv =$_REQUEST['tennv'];
		$usename =$_REQUEST['usename'];
		$pass =$_REQUEST['pass'];
		$gioitinh=$_REQUEST['gioitinh'];
		$ngaysinh =$_REQUEST['ngaysinh'];
		$sdt =$_REQUEST['sdt'];
		$diachi =$_REQUEST['diachi'];
		$phanquyen =$_REQUEST['phanquyen'];
		$chucvu = $_REQUEST['chucvu'];
		$email=$_REQUEST['email'];
		
		if($chucvu!='' && $tennv!='')
		{		
			if($idsua>0)		  
		  			{
				  if($p->themxoasua("UPDATE nhanvien set tennv='$tennv', username='$usename', password=MD5('$pass'), gioitinh='$gioitinh', ngaysinh ='$ngaysinh', sdt='$sdt',diachi ='$diachi',phanquyen='$phanquyen' ,chucvu='$chucvu',email='$email' where id='$idsua' limit 1")==1 and $p->themxoasua("update taikhoan set ten='$tennv', username='$usename', password=MD5('$pass'),phanquyen='$phanquyen' where ten='$tennv'")==1)
				
				{	
					echo '<script language="javascript">alert("Cập nhật thành công!"); window.location="employees.php";</script>';
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
    <script src="assets/js/app.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	
</body>


<!-- add-employee24:07-->
</html>
