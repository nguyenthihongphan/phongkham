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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Lịch trình</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-schedule.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Đăng ký lịch tình</a>
                    </div>
                </div>
                <div class="row">
                 <div class="col-md-12">
           
                        
                        <tr >
                            <td width="25%">

                            </td>
                            <td width="15%">
                                <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                                    Ngày hôm nay :
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;text-align: right;">
                                    <?php 
                                date_default_timezone_set('Asia/ho_chi_minh');
        
                                $today = date('Y-m-d');
                                echo $today;
							  $list110 = $mysqli->query("select  * from  lichtrinh where tenbs=$ten;");
								?>
   				 <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                    
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Có <?php echo $list110->num_rows; ?> lịch trình </p>
                    </td>
                    
                </tr>
                
                <tr>
                    <td colspan="4" style="padding-top:0px;width: 100%;" >
                        <center>
                        <table class="filter-container" border="0" >
                        <tr>
                           <td width="10%">

                           </td> 
                        <td width="5%" style="text-align: center;">
                        Ngày:
                        </td>
                        <td width="30%">
                        <form action="" method="post">
                            
                            <input type="date" name="ngaykham" id="date" class="input-text filter-container-items form-control" style="margin: 0;width: 95%;">

                        </td>
                        
                    <td width="12%">
                        <input type="submit"  name="filter" value="Lọc" class=" btn-primary btn button-icon "  style="padding: 15px; margin :0;width:100%">
                        </form>
                    </td>

                    </tr>
                            </table>

                        </center>
                    </td>
                    
                </tr>
                 <?php

                $sqlmain= "select lichtrinh.id,bacsi.tenbs,lichtrinh.ngaykham,lichtrinh.giokham,lichtrinh.soluong from lichtrinh inner join bacsi on lichtrinh.tenbs=bacsi.tenbs where bacsi.tenbs='$ten' ";
                    if($_POST){
                        //print_r($_POST);
                        $sqlpt1="";
                        if(!empty($_POST["ngaykham"])){
                            $ngaykham=$_POST["ngaykham"];
                            $sqlmain.=" and ngaykham.ngaykham='$ngaykham' ";
                        }

                    }

                ?>
                  <div class="row">
                <div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>
                   
                        <tr>
                                <th>
                                Mã lịch trình
                                </th>
                                <th>
                                    Thời gian
                                </th>
                                <th>
                                    
                                Số lượng khám
                                    
                                </th>
                                
                                <th>
                                    
                                 Lựa chọn
                                    
                                </tr>
                        </thead>
                        <tbody>
                         <?php

                                
                                $result= $mysqli->query($sqlmain);

                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                   <center>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Không có lịch</p>
                                  </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $scheduleid=$row["id"];
									$idck=$row["idck"];
                                    $docname=$row["tenbs"];
                                    $scheduledate=$row["ngaykham"];
                                    $scheduletime=$row["giokham"];
                                    $nop=$row["soluong"];
                                    echo '<tr>
                                        <td> &nbsp;'.
                                        substr($scheduleid,0,30)
                                        .'</td>
                                        
                                        <td>
                                            '.substr($scheduledate,0,10).' '.substr($scheduletime,0,5).'
                                        </td>
                                        <td style="text-align:center">
                                            '.$nop.'
                                        </td>

                                        <td>
                                        <div >
                                        
                                        <a href="?action=Xem&id='.$scheduleid.'" class="non-style-link"><button  class="btn-primary btn button-icon btn-view"  style="padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Xem</font></button></a>
                                       &nbsp;&nbsp;&nbsp;
                                       <a href="?action=Hủy&id='.$scheduleid.'&name='.$docname.'" class="non-style-link"><button  class="btn-primary btn button-icon btn-delete"  style="padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Hủy</font></button></a>
                                        </div>
                                        </td>
                                    </tr>';
                                    
                                }
                            }
                                 
                            ?>
                           
                            </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr> 
            </table>
        </div>
    </div>
    <?php
    
    if($_GET){
        $id=$_GET["id"];
        $action=$_GET["action"];
        if($action=='Hủy'){
            $nameget=$_GET["name"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                       
                        <a class="close" href="schedule.php">&times;</a>
                        <div class="content">
                            Bạn muốn hủy?<br>('.substr($nameget,0,40).').
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-schedule.php?id='.$id.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Hủy&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="schedule.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;Không&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            '; 
        }elseif($action=='Xem'){
            $sqlmain= "select lichtrinh.id,bacsi.tenbs,lichtrinh.ngaykham,lichtrinh.giokham,lichtrinh.soluong from lichtrinh inner join bacsi on lichtrinh.tenbs=bacsi.tenbs  where  lichtrinh.id='$id'";
            $result= $mysqli->query($sqlmain);
            $row=$result->fetch_assoc();
            $docname=$row["tenbs"];
            $scheduleid=$row["id"];
            
            $scheduledate=$row["ngaykham"];
            $scheduletime=$row["giokham"];
            
           
            $nop=$row['soluong'];


            $sqlmain12= "select * from lichkham inner join benhnhan on benhnhan.id=lichkham.idbn inner join lichtrinh on lichtrinh.id=lichkham.idlt where lichtrinh.id='$id';";
            $result12= $mysqli->query($sqlmain12);
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup" style="width: 70%;">
                    <center>
                        <h2></h2>
                        <a class="close" href="schedule.php">&times;</a>
                        <div class="content">
                            
                            
                        </div>
                        <div class="abc scroll" style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Xem</p><br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Mã lịch trình: </label> 
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    '.$scheduleid.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Bác sĩ theo dõi: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$docname.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">Ngày khám: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$scheduledate.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Giờ khám: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$scheduletime.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label"><b>Số lượng khám:</b> ('.$result12->num_rows."/".$nop.')</label>
                                    <br><br>
                                </td>
                            </tr>

                          
                            <tr>
                            <td colspan="4">
                                <center>
                                  <div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								
                                 <thead>
                                 <tr>   
                                        <th>
                                             Mã bệnh nhân
                                         </th>
                                         <th>
                                             Tên bệnh nhân
                                         </th>
                                         <th >
                                             
                                             Mã lịch hẹn
                                             
                                         </th>
                                        
                                         
                                         <th>
                                             Số điện thoại
                                         </th>
                                         
                                 </thead>
                                 <tbody>';
                                 
                
                
                                         
                                         $result= $mysqli->query($sqlmain12);
                
                                         if($result->num_rows==0){
                                             echo '<tr>
                                             <td colspan="7">
                                             <br><br><br><br>
                                             <center>
                                             
                                             <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Không có bệnh nhân nào</p>
                                             
                                             </center>
                                             <br><br><br><br>
                                             </td>
                                             </tr>';
                                             
                                         }
                                         else{
                                         for ( $x=0; $x<$result->num_rows;$x++){
                                             $row=$result->fetch_assoc();
                                             $apponum=$row["id"];
                                             $pid=$row["idbn"];
                                             $pname=$row["tenbn"];
                                             $ptel=$row["sdt"];
                                             
                                             echo '<tr style="text-align:center;">
                                                <td>
                                                '.substr($pid,0,15).'
                                                </td>
                                                 <td>'.
                                                 
                                                 substr($pname,0,25)
                                                 .'</td >
                                                 <td>
                                                 '.$apponum.'
                                                 
                                                 </td>
                                                 <td>
                                                 '.substr($ptel,0,25).'
                                                 </td>
                                             </tr>';  
                                         }
                                     }

                                    echo '</tbody>               
                                 </table>
                                 </div>
                                 </center>
                            </td> 
                         </tr>

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';  
    }
}

    ?>
    </div>
                        
</body>
</html>
 <script src="../Admin/assets/js/jquery-3.2.1.min.js"></script>
	<script src="../Admin/assets/js/popper.min.js"></script>
    <script src="../Admin/assets/js/bootstrap.min.js"></script>
    <script src="../Admin/assets/js/jquery.slimscroll.js"></script>
    <script src="../Admin/assets/js/Chart.bundle.js"></script>
    <script src="../Admin/assets/js/chart.js"></script>
    <script src="../Admin/assets/js/app.js"></script>

 