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

$qry = $mysqli->query("SELECT value FROM lichtrinh");

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
                    <li>
                        <a href="patients.php"><i class="fa fa-wheelchair"></i> <span>Bệnh nhân của tôi</span></a>
                    </li>
                       <li >
                        <a href="schedule.php"><i class="fa fa-stethoscope"></i><span> Lịch trình của tôi </span></a>
                    </li>
                    
                    <li>
                        <a href="medicine.php"><i class="fa fa-calendar"></i> <span>Kê đơn thuốc</span></a>
                    </li>   
                </ul>
            </div>
        </div>
    </div>
     <div class="page-wrapper">
        
            <div class="content">
                <div class="row">

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<h5 class="card-title">Clinic Schedule Settings</h5>
		</div>
		<div class="card-body">
			<form action="" id="schedule_settings">
				<div id="msg" class="form-group"></div>
                <div class="row">
                <div class="col-lg-6">
                <div class="form-group">
                    <label for="" class="control-label">Ngày trong tuần</label><br>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary1" name="day_schedule[]" value='Sunday' <?php echo isset($meta['day_schedule']) && in_array("thu2",explode(",",$qry['day_schedule'])) ? "checked" : ''  ?>>
                        <label for="checkboxPrimary1">
                            thứ 2
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary2" name="day_schedule[]" value='Monday'  <?php echo isset($meta['day_schedule']) && in_array("thu3",explode(",",$qry['day_schedule'])) ? "checked" : ''  ?>>
                        <label for="checkboxPrimary2">
                            Thứ 3
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary3" name="day_schedule[]" value='Tuesday'  <?php echo isset($meta['day_schedule']) && in_array("thu4",explode(",",$qry['day_schedule'])) ? "checked" : ''  ?>>
                        <label for="checkboxPrimary3">
                            Thứ 4
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary4" name="day_schedule[]" value='Wednesday'  <?php echo isset($meta['day_schedule']) && in_array("thu5",explode(",",$qry['day_schedule'])) ? "checked" : ''  ?>>
                        <label for="checkboxPrimary4">
                            thứ 5
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary5" name="day_schedule[]" value='Thursday'  <?php echo isset($meta['day_schedule']) && in_array("thu6",explode(",",$qry['day_schedule'])) ? "checked" : ''  ?>>
                        <label for="checkboxPrimary5">
                            Thứ 6
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary6" name="day_schedule[]" value='Friday'  <?php echo isset($meta['day_schedule']) && in_array("thu7",explode(",",$qry['day_schedule'])) ? "checked" : ''  ?>>
                        <label for="checkboxPrimary6">
                            Thứ 7
                        </label>
                    </div>
                    <div class="icheck-primary">
                        <input type="checkbox" id="checkboxPrimary7" name="day_schedule[]" value='Saturday'  <?php echo isset($meta['day_schedule']) && in_array("chunhat",explode(",",$qry['day_schedule'])) ? "checked" : ''  ?>>
                        <label for="checkboxPrimary7">
                            Chủ nhật
                        </label>
                    </div>
                </div>
                </div>
                </div>
                </div>
			</form>
		</div>
		<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button class="btn btn-sm btn-primary" form="schedule_settings">Cập nhật lịch trình</button>
				</div>
			</div>
		</div>

	</div>
</div>
		</div>

	</div>
</div>
<script>
	
	$(function(){
        $('#schedule_settings').submit(function(e){
            e.preventDefault()
            start_loader()
            $.ajax({
                url:_base_url_+"./assets/Master.php?f=save_sched_settings",
                data: $(this).serialize(),
                method:"POST",
                dataType:"json",
              
                success:function(resp){
                    if(!!resp.status && resp.status == 'success'){
                        location.reload()
                    }else if(!!resp.status && resp.status == 'success' && !!resp.msg){
                        var err_el = $('<div>')
                            err_el.addClass('alert alert-danger')
                            err_el.text(resp.msg)
                            $('#msg').hide().append(err_el).show('slow')
                            $("html, body").animate({ scrollTop: 0 }, "fast");
                            
                    }else{
                        console.log(resp)
                        alert_toast("An error occured",'error');
                    }
                    end_loader();
                }
            })
        })
    })
</script>