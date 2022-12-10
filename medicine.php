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

<?php
$message = '';
if(isset($_POST['submit'])) {

  $idbn = $_POST['idbn'];
  $ngaykham = $_POST['ngaykham'];
  $tenba = $_POST['tenba'];
  $idba = $_POST['idba'];
  $kqdieutri = $_POST['kqdieutri'];
  $sdt = $_POST['sdt'];
  $chuandoan = $_POST['chuandoan'];
  $tenhd = $_POST['tenhd'];
  $quantities = $_POST['quantities'];
   $idthuoc =$_POST['loaithuoc'];
     $idctdonthuocs = $_POST['idctdonthuocs'];

  try {

    $con->beginTransaction();

   $size = sizeof($idctdonthuocs);
	 $idct =0;

     $curQuantity = 0;
    for($i = 0; $i < $size; $i++) {
      $idct =$idctdonthuocs[$i];
      $curQuantity = $quantities[$i];
		$stmtDetails =  $con->prepare("INSERT INTO hoadon(
      idbn,idctdonthuoc,slthuoc,ngay,tenhd,idba)
      VALUES('$idbn','$idct', '$curQuantity','$ngaykham','$tenhd','$idba')");   
    $stmtDetails->execute($con->prepare("INSERT INTO hoadon(
      idbn,idctdonthuoc,slthuoc,ngay,tenhd,idba)
      VALUES('$idbn','$idct', '$curQuantity','$ngaykham','$tenhd','$idba')"));
    }

    $con->commit();
	
    $message = 'Kê đơn thuốc đã được lưu trữ.';

  }catch(PDOException $ex) {
    $con->rollback();

    echo $ex->getTraceAsString();
    echo $ex->getMessage();
    exit;
  }
  
	  	if($q->themxoasua("INSERT INTO hoadon(tenhd,idbn,idctdonthuoc,ngay,slthuoc,idba) VALUES ('$tenhd' ,'$idbn','$idct','$ngaykham','$curQuantity','$idba')")==1)
				{	
					echo '<script >alert("Thêm thành công!"); window.location="medicine.php";</script>';
					echo header("location:timkiemthuoc.php?goto_page=success.php&message=$message");
					
					}
		
			
				else
				{
					echo' Tạo không thành công';
				}
		

  exit;
}
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

    <div class="row" id="mi_new_prescription">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <label>Tên hóa đơn</label>
     <input id="tenhd" name="tenhd" class="form-control form-control-sm rounded-0" />
    </div>
     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
     
      <label>Chọn loại thuốc</label>
                <select name="loaithuoc" id="idloaithuoc"  selected="selected" class="form-control form-control-sm rounded-0">
                    <option value="">--- Chọn thuốc ---</option>
                    <?php
                        $sql = "SELECT * FROM thuoc"; 
                        $result = $mysqli->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['loaithuoc']."</option>";
                        }
                    ?>
                </select>
    </div>
     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <label>Tên thuốc</label>
      <select id="tenthuoc" name="tenthuoc" class="form-control form-control-sm rounded-0">
     
      </select>
    </div>

    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
      <label>Số lượng</label>
      <input id="slthuoc" class="form-control form-control-sm rounded-0" />
    </div>


    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-12">
      <label>&nbsp;</label>
      <button id="add_to_list" type="button" class="btn btn-primary btn-sm btn-flat btn-block">
        <i class="fa fa-plus"></i>
      </button>
    </div>

  </div>

  <div class="clearfix">&nbsp;</div>
  <div class="row table-responsive">
    <table id="medication_list" class="table table-striped table-bordered">
      <colgroup>
        <col width="10%">
        <col width="50%">
        <col width="10%">
        <col width="10%">
        <col width="15%">
        <col width="5%">
      </colgroup>
      <thead class="bg-primary">
        <tr>
          <th>Số</th>
          <th>Tên thuốc</th>
         
          <th>Số lượng</th>
        
          <th>Hoạt động</th>
        </tr>
      </thead>

      <tbody id="current_medicines_list">

      </tbody>
    </table>
  </div>

  <div class="clearfix">&nbsp;</div>
  <div class="row">
    <div class="col-md-10">&nbsp;</div>
    <div class="col-md-2">
     
      <button type="submit" id="submit" name="submit" 
      class="btn btn-primary btn-sm btn-flat btn-block">Save</button>
  
<!--<input type="submit" id="luu" name="them" 
      class="btn btn-primary btn-sm btn-flat btn-block" value="Chọn lưu"/>-->
    </div>
  </div>
</form>

</div>

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



<script>
$( "select[name='loaithuoc']" ).change(function () {
    var idloaithuoc = $(this).val();


    if(idloaithuoc) {


        $.ajax({
            url: "ajax_thuoc.php",
            dataType: 'Json',
            data: {'id':idloaithuoc},
            success: function(data) {
                $('select[name="tenthuoc"]').empty();
                $.each(data, function(key, value) {
                    $('select[name="tenthuoc"]').append('<option value="'+ key +'">'+ value +'</option>');
                });
            }
        });


    }else{
        $('select[name="tenthuoc"]').empty();
    }
	 var serial = 1;
  showMenuSelected("#mi_new_prescription");
 var message = '<?php echo $message;?>';

  if(message !== '') {
    showCustomMessage(message);
  }

    $("#add_to_list").click(function() {
      var idthuoc = $("#tenthuoc").val();
      var tenthuoc = $("#tenthuoc option:selected").text();
      
var idctdonthuoc = $("#idloaithuoc").val();
var idloaithuoc =  $("#idloaithuoc option:selected").text();
     
      var slthuoc = $("#slthuoc").val().trim();
  

      var oldData = $("#current_medicines_list").html();

      if(idthuoc !== '' && slthuoc !== '') {
        var inputs = '';
        inputs = inputs + '<input  type ="hidden" name="idctdonthuocs[]" value="'+idctdonthuoc+'" />';
        inputs = inputs + '<input  type="hidden" name="quantities[]" value="'+slthuoc+'" />';
  


        var tr = '<tr>';
        tr = tr + '<td class="px-2 py-1 align-middle">'+serial+'</td>';
        tr = tr + '<td class="px-2 py-1 align-middle">'+tenthuoc+'</td>';
       
        tr = tr + '<td class="px-2 py-1 align-middle">'+slthuoc + inputs +'</td>';
        tr = tr + '<td class="px-2 py-1 align-middle text-center"><button type="button" class="btn btn-outline-danger btn-sm rounded-0" onclick="deleteCurrentRow(this);"><i class="fa fa-times"></i></button></td>';
        tr = tr + '</tr>';
        oldData = oldData + tr;
        serial++;

        $("#current_medicines_list").html(oldData);

        $("#tenthuoc").val('');
        
        $("#slthuoc").val('');
       

      } 

    });

  });

  function deleteCurrentRow(obj) {

    var rowIndex = obj.parentNode.parentNode.rowIndex;
    
    document.getElementById("medication_list").deleteRow(rowIndex);
  }
  


</script>
<!-- jQuery -->
<script src="assets/js/jquery.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/js/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->


<script src="assets/js/jquery_confirm/jquery-confirm.js"></script>

<script src="assets/js/common_javascript_functions.js"></script>
 
