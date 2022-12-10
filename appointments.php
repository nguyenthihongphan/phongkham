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
include('./assets/qllt.php');
$p = new qllt();
$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
include("./assets/db_config.php");
$appointmentrow =$mysqli->query("select  * from  lichkham where lichngaykham>='$today';");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Lịch hẹn khám</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Lịch hẹn khám</h4>
                    </div>
                  
                </div>
                 <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                    
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Tất cả lịch hẹn (<?php echo $appointmentrow->num_rows; ?>)</p>
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
                       Thời gian:
                        </td>
                        <td width="30%">
                        <form action="" method="post">
                            
                            <input class="form-control" type="date" name="ngaykham" id="date" class="input-text filter-container-items" style="margin: 0;width: 95%;">

                        </td>
                        <td width="5%" style="text-align: center;">
                        Bác sĩ:
                        </td>
                        <td width="30%">
                         
                <select name="bchuyenkhoa" class="form-control">
                    <option value="">Chọn bác sĩ</option>


                    <?php
                        require('./assets/db_config.php');
                                $list11 = $mysqli->query("select  * from  bacsi order by tenbs asc;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row=$list11->fetch_assoc();
                                    $tenbs=$row["tenbs"];
                                    $id=$row["id"];
                                    echo "<option value=".$id.">$tenbs</option><br/>";
                                };


                                ?>
                          

                        </select>
                    </td>
                    <td width="12%">
                        <input type="submit"  name="filter" value="Lọc" class=" btn-primary-soft btn button-icon btn-filter"  style="padding: 15px; margin :0;width:100%">
                        </form>
                    </td>

                    </tr>
                            </table>

                        </center>
                    </td>
                    
                </tr>
                  <?php
                    if($_POST){
                        //print_r($_POST);
                        $sqlpt1="";
                        if(!empty($_POST["ngaykham"])){
                            $ngaykham=$_POST["ngaykham"];
                            $sqlpt1=" lichkham.ngaykham='$ngaykham' ";
                        }


                        $sqlpt2="";
                        if(!empty($_POST["id"])){
                            $idbs=$_POST["id"];
                            $sqlpt2=" bacsi.id=$idbs ";
                        }
                        //echo $sqlpt2;
                        //echo $sqlpt1;
                        $sqlmain= "select lichkham.id,lichtrinh.id,bacsi.tenbs,benhnhan.tenbn,lichtrinh.ngaykham,lichtrinh.giokham,lichkham.soluongkham,lichkham.lichngaykham from lichtrinh inner join lichkham on lichtrinh.id=lichkham.idlt inner join benhnhan on benhnhan.id=lichkham.idbn inner join bacsi on lichtrinh.tenbs=bacsi.tenbs";
                        $sqllist=array($sqlpt1,$sqlpt2);
                        $sqlkeywords=array(" where "," and ");
                        $key2=0;
                        foreach($sqllist as $key){

                            if(!empty($key)){
                                $sqlmain.=$sqlkeywords[$key2].$key;
                                $key2++;
                            };
                        };
                        //echo $sqlmain;

                        
                        
                        //
                    }else{
                        $sqlmain= "select lichkham.id,lichtrinh.id,bacsi.tenbs,benhnhan.tenbn,lichtrinh.ngaykham,lichtrinh.giokham,lichkham.soluongkham,lichkham.lichngaykham from lichtrinh inner join lichkham on lichtrinh.id=lichkham.idlt inner join benhnhan on benhnhan.id=lichkham.idbn inner join bacsi on lichtrinh.tenbs=bacsi.tenbs order by lichtrinh.ngaykham desc";

                    }



                ?>
				<div class="row">
                 <div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>
					   <tr>
                  
                       <center>
                        <div class="abc scroll">
                        <table width="93%" class="sub-table scrolldown" border="0">
                        <thead>
                        <tr>  <th >
                                    STT
                                </th>
                                <th >
                                    Tên bệnh nhân
                                </th>
                                <th >
                                    
                                  Mã lịch trình
                                    
                                </th>
                               <th >
                                    Tên bác sĩ
                                </th>
                                
                                <th>
                                    Ngày và giờ khám
                                </th>
                               
                                <th >
                                    
                                   Ngày đặt lịch
                                    
                                </th>
                                <th class="text-right" >
                                    
                                   lựa chọn
                                    
                                </tr>
                        </thead>
                        <tbody>
                        
                            <?php

                                
                                $result= $mysqli->query($sqlmain);

                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="7">
                                    <br><br><br><br>
                                    <center>
                                   
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">không tim thấy !</p>
                                    <a class="non-style-link" href="appointment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $appoid=$row["id"];
                                    $scheduleid=$row["idlt"];
                                   
                                    $docname=$row["tenbs"];
                                    $scheduledate=$row["ngaykham"];
                                    $scheduletime=$row["giokham"];
                                    $pname=$row["tenbn"];
                                    $apponum=$row["soluongkham"];
                                    $appodate=$row["lichngaykham"];
									$dem=1;
                                    echo '<tr >
									 <td> &nbsp;'.
                                        
                                        substr($dem++,0,25)
                                        .'</td >
                                        <td 
                                        <td > &nbsp;'.
                                        
                                        substr($pname,0,25)
                                        .'</td >
                                        <td>
                                        LT-'.$apponum.'
                                        
                                        </td>
										 
                                        <td>
                                        '.substr($docname,0,25).'
                                        </td>
                                       
                                        <td>
                                            '.substr($scheduledate,0,10).' <br>'.substr($scheduletime,0,5).'
                                        </td>
                                        
                                        <td>
                                            '.$appodate.'
                                        </td>
<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-appointment.php?id='.$id.'"><i class="fa fa-pencil m-r-5"></i> Sửa</a>
													<a class="dropdown-item" href="delete-appointment.php?id='.$id.'" ><i class="fa fa-trash-o m-r-5"></i> Hủy</a>
												 </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                ';
                                    
                                }
                            }
                                 
                            ?>
 
                            </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
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


<!-- appointments23:20-->
</html>