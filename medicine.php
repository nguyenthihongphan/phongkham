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
    <title>Quản lý thuốc</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
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
                        <h4 class="page-title">Dữ liệu thuốc</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-medicine.php" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Thêm thuốc</a>
                    </div>
                </div>
                 <div class="row table-responsive">

          <table id="all_medicines" 
          class="table table-striped dataTable table-bordered dtr-inline" 
          role="grid" aria-describedby="all_medicines_info">
                <div class="row filter-row">
                
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                        <form method="post">
                            <label class="focus-label" ></label>
                            <input type="text" class="form-control floating"  name="timkiem" placeholder="Nhập thông tin tìm kiếm" value ="<?php if(isset($_POST["timkiem"])){echo $_POST ["timkiem"];} ?>" >
                        </div>
                    </div>
                    
                 
                    <div class="col-sm-6 col-md-3">
                        
                         <button  class="btn btn-success btn-block" name="">Tìm kiếm</button> 
                         </form>
                                            
                         </div>
                         
                </div>
                <?php 
		$timkiem='';
		if(isset($_POST['timkiem']))
		{
			$timkiem=$_POST['timkiem'];

		}
		$layid=$_REQUEST['id'];
		if($layid>0)
		{
			$p->medicine("select * from thuoc where  id='$layid' order by id asc");
		}
		else
		{
			$p->medicine('select * from chitietdonthuoc
 where id and tenthuoc like "%'.$timkiem.'%"  order by id asc');
		}
			
		?>
               

        </div>
        
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
 <?php  
    if($_GET){
        $id=$_GET["id"];
        $action=$_GET["action"];
        if($action=='Xem'){
           $p->loadchitietthuoc("select chitietdonthuoc.tenthuoc, chitietdonthuoc.idloaithuoc, thuoc.loaithuoc, chitietdonthuoc.donvitinh,chitietdonthuoc.xuatxu from chitietdonthuoc inner join thuoc on thuoc.id=chitietdonthuoc.idloaithuoc where chitietdonthuoc.id='$id'");
            
            $id=$row['id'];
					$tenthuoc=$row['tenthuoc']; 
					$loaithuoc =$row['idloaithuoc'];
					$tp=$row['tp'];
					$xuatxu=$row['xuatxu'];
					$donvitinh=$row['donvitinh'];
					$gia=$row['gia'];


           
           ;
								     }
}

               ?>                  
		

</html>
<script>
 $(function () {
    $("#all_medicines").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["print"]
    }).buttons().container().appendTo('#all_medicines_wrapper .col-md-6:eq(0)');
    
  });
</script>