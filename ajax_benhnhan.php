
<?php
include("../Admin/assets/db_config.php");
if($_REQUEST['idbn']) {
	$sql = "select m.tenthuoc, md.loaithuoc, 
    pmh.ngay, pmh.slthuoc,py.tenbn,pv.id
    from chitietdonthuoc as m,benhnhan as pv, thuoc as md, hoadon as pmh 
	WHERE pv.id='".$_REQUEST['idbn']."'";
	$resultSet = mysqli_query($mysqli, $sql);	
	$empData = array();
	while( $emp = mysqli_fetch_assoc($resultSet) ) {
		$empData = $emp;
	}
	echo json_encode($empData);
} else {
	echo 0;	
}
?>
