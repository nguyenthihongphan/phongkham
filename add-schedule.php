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

$iduser=$_SESSION['id'];
$idck=$q->luachon("select idck from bacsi inner join chuyenkhoa on bacsi.idck =chuyenkhoa.id where tenbs='$ten'");
$idbs=$q->luachon("select id from bacsi where tenbs='$ten'")

?>

<!DOCTYPE html>
<html lang="en">
   <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
		.overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    transition: opacity 500ms;
    opacity: 1;
  }
  .overlay:target {
    visibility: visible;
    opacity: 1;
    
  }
  
  .popup {
    margin: 70px auto;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    width: 50%;
    position: relative;
    transition: all 5s ease-in-out;
  }
  
  .popup h2 {
    margin-top: 0;
    color: #333;
  }
  .popup .close {
    position: absolute;
    top: 20px;
    right: 30px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
  }
  .popup .close:hover {
    color: var(--primarycolorhover);
  }
  .popup .content {
    max-height: 30%;
    overflow: auto;
  }
  
  @media screen and (max-width: 700px){
    .box{
      width: 70%;
    }
    .popup{
      width: 70%;
    }
  }


</style>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <title>Lịch trình của tôi</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet"  type="text/css" href="../Admin/assets/css/style.css">

     <script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" href="datepicker/jquery-ui.css">
<script src="datepicker/jquery-1.10.2.js"></script>
<script src="datepicker/jquery-ui.js"></script>


    
    
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
                        <h4 class="page-title">Chọn lịch trình</h4>
                    </div>
                </div>
                <div class="row">
                 <form name="frm_book_a_slot" enctype="multipart/form-data" method="post" >
                    <div class="col-lg-8 offset-lg-2">
                       
                            <div class="row">
                              
                               
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>So luong <span class="text-danger">*</span></label>
                                        <input class="form-control" readonly type="text" id="soluong" name="soluong" required value="5">
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Chọn ngày<span class="text-danger">*</span></label>
                                 <input type="text" name="request_date" id="request_date"  value="" onChange="loadSlot();" class="datepicker form-control-static">
                                                Chọn số ngày<select name="range" id="range_id"  onChange="loadSlot();">
                                                  <option value="1">1</option>
                                                  <option value="2">2</option>
                                                  <option value="3">3</option>
                                                  <option value="4">4</option>
                                                  <option value="5" >5</option>
                                                  <option value="6">6</option>
                                                  <option value="7"selected>7</option>
                                                  
                                                </select>
                                                </div>
                                              </div> 
                                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Chọn thời gian<span class="text-danger">*</span></label>
                                                 <input type="time" name="request_time" id="request_time" value=" <?php echo $q->luachon("select slot_time from slot limit 1 "); ?>"   class="form-control-static" onkeydown="return false" required>
                                                 <br><br>
                                                 <div id="div_slot">	
                
                                                 </div>                                    
                                            
                                              <input type="hidden" name="cmd" value="add">
												<input type="hidden" name="id" value="">			
												<input type="submit" name="btn_submit" id="btn_submit" value="submit" class="btn btn-danger red">
                  
                        </form>
                    </div>
                </div>
            </div>
            <?php
  	switch ($_POST['cmd'])
	{
		
		case'add':
	{	

		$request_time =$_REQUEST['request_time'];
		$request_date=$_REQUEST['request_date'];
		
		$soluong =$_REQUEST['soluong'];
		
		if($soluong!='')
		{		
				if($q->themxoasua("INSERT INTO lichtrinh(idck,tenbs,idbs,ngaykham,giokham,soluong) VALUES ('$idck' ,'$ten','$idbs','$request_date','$request_time','$soluong')")==1)
				{	
					echo '<script >alert("Thêm thành công!"); window.location="schedule.php";</script>';
					
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
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="..Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="..Admin/assets/js/popper.min.js"></script>
    <script src="..Admin/assets/js/bootstrap.min.js"></script>
    <script src="..Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="..Admin/assets/js/select2.min.js"></script>
	<script src="..Admin/assets/js/moment.min.js"></script>
	<script src="..Admin/assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="..Admin/assets/js/app.js"></script>
</body>


<!-- add-doctor24:06-->
</html>

                  
                            <script>
    function setSlot(e,slot,request_date)
	 {
		 e.preventDefault();
		 $("#request_time").val(slot);
		 $("#request_date").val(request_date);
		 
		 return false;
	 }
	 
	 function loadSlot()
	 {
		 
		
		
		request_date = $("#request_date").val();
		
		$("#div_slot").html("");
	    $.ajax({
				url: 'slottime.php?cmd=load_slot&request_date='+request_date+'&range='+$("#range_id").val(),
				success: function(html) {
					    $("#div_slot").html(html);
						$("#spinner3").html('');
				},
				error: function() {
					 callback();
				}
			})	 
	 
	 }
	 
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '../../images/calendar.gif',
	});
</script>  			