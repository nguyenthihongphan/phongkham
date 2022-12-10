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
include("../Admin/assets/db_config.php");
$p = new qllt();
$layid =0;
if(isset($_REQUEST['id']))
{	
	$layid =$_REQUEST['id'];
	}
$lichtrinh =$mysqli->query("select  * from  lichtrinh");
?>
<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Lịch trình</title>
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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Lịch trình</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-schedule.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Thêm lịch trình</a>
                    </div>
                </div>
                <td width="15%">
                        <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                            Thời gian hôm nay :
                        </p>
                        <p class="heading-sub12" style="padding: 0;margin: 0;text-align: right">
                            <?php 

                        date_default_timezone_set('Asia/Ho_Chi_Minh');

                        $today = date('d/m/Y H:i:s');
                        echo $today;

                       

                        ?>
                        </p>
                    </td>
                   


                </tr>
               
               
                <tr>
                    <td colspan="4" style="padding-top:10px;width: 100%;" >
                    
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Tất cả lịch trình (<?php echo $lichtrinh->num_rows; ?>)</p>
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
                        Chuyên khoa:
                        </td>
                        <td width="30%">
                         
                <select name="bchuyenkhoa" class="form-control">
                    <option value="">Chọn chuyên khoa</option>


                    <?php
                        require('./assets/db_config.php');
                        $sql = "select  * from  chuyenkhoa order by tenck asc"; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['tenck']."</option>";
                        }
                    ?>

                </select>
                    </td>
                    <td width="12%">
                        <input type="submit"  name="filter" value="Lọc" class=" btn-primary-soft btn button-icon btn-filter"  style="padding: 15px; margin :0;width:100%">
                        </form>
                    </td>

                   <?php
                    if($_POST){
                        //print_r($_POST);
                        $sqlpt1="";
                        if(!empty($_POST["ngaykham"])){
                            $ngaykham=$_POST["ngaykham"];
                            $sqlpt1=" lichtrinh.ngaykham='$ngaykham' ";
                        }


                        $sqlpt2="";
                        if(!empty($_POST["id"])){
                            $idck=$_POST["id"];
                            $sqlpt2=" chuyenkhoa.id=$idck ";
                        }
                        //echo $sqlpt2;
                        //echo $sqlpt1;
                        $sqlmain= "select lichtrinh.id,lichtrinh.idck,lichtrinh.tenbs,lichtrinh.ngaykham,lichtrinh.giokham,lichtrinh.soluong from lichtrinh inner join chuyenkhoa on lichtrinh.idck=chuyenkhoa.id";
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
                        $sqlmain= "select lichtrinh.id,lichtrinh.idck,lichtrinh.tenbs,lichtrinh.ngaykham,lichtrinh.giokham,lichtrinh.soluong from lichtrinh inner join chuyenkhoa on lichtrinh.idck=chuyenkhoa.id  order by lichtrinh.ngaykham asc";

                    }
					?>
				<div class="row">
                 <div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>
									<tr>
                                    <th>Mã lịch trình</th>
										<th>Mã chuyên khoa</th>
										<th>Tên bác sĩ</th>
										<th>Ngày khám</th>
										<th>Thời gian khám</th>										
										<th>Số lượng giới hạn</th>
										<th class="text-right">Lựa chọn</th>
									</tr>
								</thead>
                 <?php

                                
                                $result= $mysqli->query($sqlmain);

                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="7">
                                    <br><br><br><br>
                                    <center>
                                  
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Không tìm thấy!</p>
                       
                                   
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
			            else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $id=$row["id"];
                                    $idck=$row["idck"];
                                    $tenbs=$row["tenbs"];
                                    $ngaykham=$row["ngaykham"];
                                    $giokham=$row["giokham"];
                                    $soluong=$row["soluong"];
                                    echo '<tbody>
									<tr>
									  <td> &nbsp;'.
                                        substr($id,0,30)
                                        .'</td>
                                        <td> &nbsp;'.
                                        substr($idck,0,30)
                                        .'</td>
                                        <td>
                                        '.substr($tenbs,0,20).'
                                        </td>
                                        <td style="text-align:center;">
                                            '.substr($ngaykham,0,10).'
                                        </td>
										 <td style="text-align:center;">
                                          '.substr($giokham,0,5).'
                                        </td>
                                       	<td><span class="custom-badge status-green">'.$soluong.'</span></td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-schedule.php?id='.$id.'"><i class="fa fa-pencil m-r-5"></i> Sửa</a>
													<a class="dropdown-item" href="delete-schedule.php?id='.$id.'" ><i class="fa fa-trash-o m-r-5"></i> Hủy</a>
												 </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                </tbody>';
                                    
                                }
                            }
                                 
                            ?>
 
                            </tbody>

                        </table>
                 
                
                
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
</body>


<!-- schedule23:21-->
</html>