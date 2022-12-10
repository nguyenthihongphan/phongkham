<?php 
include 'connection.php';
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
                        <span class="status online" style="top: 15px;"></span>
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
                        <h4 class="page-title">Thuốc</h4>
                    </div>
                </div>
                <div class="row">
              
                   <section class="content">
      <!-- Default box -->
      <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-header">
          <h3 class="card-title">Kê đơn thuốc</h3>

        </div>
        <div class="card-body">
            
            <form method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                 <label>Tên bệnh nhân</label>
               
                <input id="tenbn" class="form-control form-control-sm rounded-0" name="tenbn" value="<?php  echo $q->luachon("select benhnhan.tenbn from benhnhan inner join benhan on benhnhan.id=benhan.idbn where benhan.id='$layid' limit 1");?>" required />
              </div>
 
                
                <input id="idbn" type="hidden" class="form-control form-control-sm rounded-0" name="idbn" value="<?php  echo $q->luachon("select idbn from benhan where benhan.id='$layid' limit 1");?>" required />
                <input id="idba" type="hidden" class="form-control form-control-sm rounded-0" name="idba" value="<?php  echo $q->luachon("select id from benhan where benhan.id='$layid' limit 1");?>" required />
           

              <div class="col-lg-3 col-md-3 col-sm-4 col-xs-10">
                <div class="form-group">
                  <label>Ngày chuẩn đoán</label>
                  <div class="input-group date" 
                  id="visit_date" 
                  data-target-input="nearest">
                  <input type="text" class="form-control form-control-sm rounded-0 datetimepicker-input" data-target="#ngaykham" name="ngaykham" value="<?php  echo $q->luachon("select ngaykham from benhan where benhan.id='$layid' limit 1");?>" required data-toggle="datetimepicker" autocomplete="off"/>
                  <div class="input-group-append" 
                  data-target="#ngaykham" 
                  data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
          </div>
          


          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-10">
            <div class="form-group">
              <label>Kết quả điều trị</label>
            
        <input id="kqdieutri" class="form-control form-control-sm rounded-0" name="kqdieutri" value="<?php  echo $q->luachon("select kqdieutri from benhan where benhan.id='$layid' limit 1");?>" required />
             
         
        </div>
      </div>
        <div class="clearfix">&nbsp;</div>

      <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
        <label>Số điện thoại</label>
        <input id="sdt" class="form-control form-control-sm rounded-0" name="sdt"value=" 0<?php  echo $q->luachon("select benhnhan.sdt from benhnhan inner join benhan on benhnhan.id=benhan.idbn where benhan.id='$layid' limit 1");?>" required />
      </div>
           <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
        <label>Tên bệnh án</label>
        <input id="tenba" class="form-control form-control-sm rounded-0" name="tenba"value=" <?php  echo $q->luachon("select tenba from benhan where benhan.id='$layid' limit 1");?>" required />
      </div>
      
      
      <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
         <label>Chuẩn đoán</label>
        <input id="chuandoan" required name="chuandoan" value="<?php  echo $q->luachon("select chuandoan from benhan where benhan.id='$layid' limit 1");?>"  class="form-control form-control-sm rounded-0" />
            </div>
    </div>
         <div class="col-md-12"><hr /></div>
    <div class="clearfix">&nbsp;</div>

</div>
    <div class="m-t-20 text-center">
                               
                                <input type="submit"  class="btn btn-primary submit-btn" data-dismiss="modal" id="capnhat" name="capnhat" value="Cập nhật bệnh án"/>
                            </div>
    <?php

	switch ($_POST['capnhat'])
	{
		case'Cập nhật bệnh án':
	{	
		$idsua=$_REQUEST['id'];
		$tenba =$_REQUEST['tenba'];
		$kqdieutri =$_REQUEST['kqdieutri'];
		$chuandoan =$_REQUEST['chuandoan'];
		$tenbn =$_REQUEST['tenbn'];
		
		
		if($chuandoan!='' && $kqdieutri!='')
		{		
			if($idsua>0)		  
		  			{
				  if($q->themxoasua("UPDATE benhan set tenba='$tenba', kqdieutri='$kqdieutri', chuandoan='$chuandoan' where id='$idsua' limit 1")==1)
				
				{	
					echo '<script language="javascript">alert("Cập nhật thành công!"); window.location="benhan.php";</script>';
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
<!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
                       
                    </div>
                </div>
            </div>
            </div>
             <div class="sidebar-overlay" data-reff=""></div>
    <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="../Admin/assets/js/popper.min.js"></script>
    <script src="../Admin/assets/js/bootstrap.min.js"></script>
    <script src="../Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="../Admin/assets/js/Chart.bundle.js"></script>
    <script src="../Admin/assets/js/chart.js"></script>
    <script src="../Admin/assets/js/app.js"></script>

</body>
</html>
