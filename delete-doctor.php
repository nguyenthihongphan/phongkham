<?php
header('Content-Type: text/html; charset=utf-8');
	$conn = mysqli_connect("localhost","pkgd","123456","phongkham");
	
		$username = $_GET["username"];


	
	//câu lệnh delete
	$sql = "DELETE bacsi, taikhoan FROM bacsi INNER JOIN taikhoan ON bacsi.username = taikhoan.username WHERE  bacsi.username = '$username'";
	if (mysqli_query($conn,$sql))//Nếu thành công chuyển về file ds
	{
		header('location: doctors.php');
	}
	else{//lỗi
		$result = "Xóa chưa thành công". mysqli_error($conn);
	}
//ngắt kết nối
mysqli_close($conn);
?>