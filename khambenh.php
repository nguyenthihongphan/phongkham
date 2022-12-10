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


$ten=$q->luachon("SELECT tenbs
FROM bacsi
JOIN taikhoan ON bacsi.tenbs = taikhoan.ten");
$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
                                date_default_timezone_set('Asia/ho_chi_minh');
        
                                $today = date('Y-m-d');
                                echo $today;

?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <title>Phòng khám gia đình</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet"  type="text/css" href="../Admin/assets/css/style.css">
    
</head>

<body>
<div class="main-wrapper">
<div class="header">
        <div class="header-left">
            <a href="index.php" class="logo">
                <img src="../Admin/assets/img/logo.png" width="35" height="35" alt=""> <span>Phòng khám</span>
            </a>
        </div>
        <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
        <ul class="nav user-menu float-right">
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                    <span class="user-img">
                        <img class="rounded-circle" src="../Admin/assets/img/user.jpg" width="24" alt="Admin">
                        <span class="status online"></span>
                    </span>
                    <span><?php echo $ten; ?></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="../Admin/login.php">Đăng xuất</a>
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
                        <a href="appointment.php"><i class="fa fa-user-md"></i> <span>Lịch hẹn khám</span></a>
                    </li>
                     <li class="submenu">
                            <a href="patients.php"><i class="fa fa-user"></i> <span> Thông tin bệnh nhân</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="patients.php">Bệnh nhân</a></li>
                               <li><a href="benhan.php">Bệnh án</a></li>
                            </ul>
                        </li> 
                        <li >
                        <a href="schedule.php"><i class="fa fa-calendar"></i><span> Lịch trình của tôi </span></a>
                    </li>
                     <li class="submenu">
                            <a href="medicine.php"><i class="fa fa-stethoscope"></i> <span>Kê đơn thuốc</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="medicine.php">Kê đơn thuốc</a></li>
                               <li><a href="timkiemthuoc.php">Hóa đơn thuốc</a></li>
                            </ul>
                        </li>  
                     
                    <li>
                        <a href="doctor.php?ten=<?php echo $ten ?>"><i class="fa fa-user"></i> <span>Thông tin cá nhân</span></a>
                    </li> 
                </ul>
            </div>
        </div>
    </div>
        <div class="page-wrapper">
         <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Kết quả chuẩn đoán</h4>
                    </div>
                </div>
          <div class="row">
 <form enctype="multipart/form-data" method="post" >
                    <div class="col-lg-8 offset-lg-2">
                       
                            <div class="row">          
            <div class="col-sm-6">
             <div class="form-group">
                                <label>Tên bệnh nhân</label>
                                <input class="form-control" readonly type="text" id="tenbn"value="<?php  echo $q->luachon("select benhnhan.tenbn from benhnhan inner join lichkham on benhnhan.id=lichkham.idbn where lichkham.id='$layid' limit 1");?>"name="tenbn" />
                            </div>
</div>
 <div class="col-sm-6">
             <div class="form-group">
                                <label>Mã bệnh nhân</label>
                                <input class="form-control" readonly type="text" id="idbn"value="<?php  echo $q->luachon("select idbn from lichkham where id='$layid' limit 1");?>"name="tenbn" />
                            </div>
</div>
 <div class="col-sm-6">
             <div class="form-group">
                                <label>Tên bệnh án</label>
                                <input class="form-control" type="text" id="tenba" name="tenba" />
                            </div>

</div>
 <div class="col-sm-6">
             <div class="form-group">
                                <label>Chuẩn đoán</label>
                                <input class="form-control" type="text" id="chuandoan" name="chuandoan" />
                            </div>

</div>
<div class="col-sm-6">
             <div class="form-group">
                                <label>kết quả</label>
                                <input class="form-control" type="text" id="kqdieutri" name="kqdieutri" />
                            </div>

</div>
<div class="col-sm-6">
             <div class="form-group">
                                <label>Ngày chuẩn đoán</label>
                                <input class="form-control" type="date" id="ngaykham" value="<?php echo $today ?>" name="ngaykham" />
                            </div>

</div>
</div>
                 <div class="m-t-20 text-center">
                               
                                <input type="submit"  class="btn btn-primary submit-btn" data-dismiss="modal" id="them" name="them" value="Xác nhận"/>
                            </div>
                           </div>
   <?php

	switch ($_POST['them'])
	{
		case'Xác nhận':
	{	
		$tenbn=$_REQUEST['tenbn'];
		$idbn=$_REQUEST['idbn'];
		$tenba =$_REQUEST['tenba'];
		$chuandoan =$_REQUEST['chuandoan'];
		$kqdieutri =$_REQUEST['kqdieutri'];
		$ngaykham =$_REQUEST['ngaykham'];
		
		if($tenbn!='' && $chuandoan!='')
		{		
				 if($q->themxoasua("INSERT INTO benhan(tenba,chuandoan,kqdieutri,idbn,ngaykham) VALUES ('$tenba','$chuandoan','$kqdieutri','$idbn','$today')")==1)
{	
					echo '<script >alert("Xác nhận thành công!"); window.location="benhan.php";</script>';
					
					}
	
				else
				{
					echo' Tạo không thành công';
				}
			}
			else
			
		{echo 'Vui lòng nhập đầy đủ';
			}
		

	break;
	
	}
}
?>

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
        </div>
        </body>
        </html>