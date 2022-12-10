<?php
include('upload.php');
 
class qlbn extends upfiles
{
		private function connect()
	{
		$con=mysql_connect("localhost","pkgd","123456");
		if(!$con)
		{
			echo'Không kết nối cơ sở dữ liệu';
			exit();
			}
		else
		{
			mysql_select_db("phongkham");
			mysql_query("SET NAMES UTF8");
			return $con; 
			}
		}
public function mylogin($user,$pass)
		{
			$pass=($pass);
			$link=$this->connect();
			$sql="select id, username, password, phanquyen from taikhoan where username='$user' and password='$pass' limit 1";
			$ketqua=mysql_query($sql,$link);
			$i=mysql_num_rows($ketqua);
			if($i==1)
			{
					while($row=mysql_fetch_array($ketqua))
					{
						$id=$row['id'];
						$username=$row['username'];
						$password=$row['password'];
						$phanquyen=$row['phanquyen'];
						session_start();
						$_SESSION['id']=$id;
						$_SESSION['user']=$username;
						$_SESSION['pass']=$password;
						$_SESSION['phanquyen']=$phanquyen;
						return 1;
						}
				}
			else
			{
				return 0;
				}
			}
		public function confirmlogin($id,$user,$pass,$phanquyen)
		{
			$link=$this->connect();
			$sql="select id from taikhoan where id='$id' and password='$pass' and phanquyen='$phanquyen' limit 1";
			$ketqua=mysql_query($sql,$link);
			$i=mysql_num_rows($ketqua);
			if($i!=1)
			{
					header("location:index.php");
							}
			}
			public function luachon($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			$kq='';
			if($i>0)
			{
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row[0];
					$kq=$id;
					}
				}
				return $kq;
			}
				public function themxoasua($sql)
	{
		$link=$this->connect();
		if(mysql_query($sql,$link))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function patients($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			if($i>0)
					{	echo' <table class="table table-striped custom-table">
					   <thead>
                                    <tr><th>STT</th>
										<th>Họ tên</th>
										<th>Mã bệnh nhân</th>
										<th>Ngày sinh</th>
										<th>Giới tính</th>
										<th>Địa chỉ</th>
										<th>Số điện thoại</th>
										<th>Email</th>
										<th class="text-right">Hoạt động</th>
									</tr>
                                </thead>';
			  			$dem=1;
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row['id'];
					
					$tenbn=$row['tenbn'];
					$gioitinh=$row['gioitinh'];
					$ngaysinh=$row['ngaysinh'];
					$diachi=$row['diachi'];
					$mabn=$row['id'];
					$sdt=$row['sdt'];
					$email=$row['email'];
					$chucvu=$row['chucvu'];
					$phanquyen=$row['phanquyen'];
					
				echo'  <tbody>
                                    <tr>
									<td>'.$dem.'</td>
                                        <td>
										
										<a><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt="">'.$tenbn.'</a>
										</td>
                                       <td href="#">BN-0'.$mabn.'</td>
									   <td href="#">'.$ngaysinh.'</td>
									    <td href="#">'.$gioitinh.'</td>
										<td href="#">'.$diachi.'</td>
										<td href="#">0'.$sdt.'</td>
										<td href="#">'.$email.'</td>
										<td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="edit-patient.php"><i class="fa fa-pencil m-r-5"></i> Sửa</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_patient"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
												</div>
											</div>
										</td>
									</tr>
								</tbody>';	
						  $dem++;																		 					}
				echo'</table>';
				}
		
			else
			{
				echo' Không có nhân viên';
				
				}
		}
			
}
?>