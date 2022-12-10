<?php
include('upload.php');
 
class qlthuoc extends upfiles
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
	
	public function loadchitietthuoc($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
	
			if($i>0)
			{
				
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row['id'];
					$tenthuoc=$row['tenthuoc']; 
					$loaithuoc =$row['loaithuoc'];
					$tp=$row['tp'];
					$xuatxu=$row['xuatxu'];
					$donvitinh=$row['donvitinh'];
					$gia=$row['gia'];
					
			 echo '
            <div id="popup1" class="overlay">
                    <div class="popup" style="width: 70%;">
                    <center>
                        <h2></h2>
                        <a class="close" href="medicine.php">&times;</a>
                        <div class="content">
                            
                            
                        </div>
                        <div class="abc scroll" style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Xem</p><br><br>
                                </td>
                            
                                <td class="label-td" colspan="2">
                                    '.$id.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Tên thuốc: </label>
                                </td>
                       
                       
                                <td class="label-td" colspan="2">
                                '.$tenthuoc.'<br><br>
                                </td>
                       </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">loại thuốc: </label>
                                </td>
                          
                                <td class="label-td" colspan="2">
                                '.$loaithuoc.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Xuất xứ: </label>
                                </td>
                          
                                <td class="label-td" colspan="2">
                                '.$xuatxu.'<br><br>
                                </td>
                          </tr>
						  <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Đơn vị tính: </label>
                                </td>
                           
                                <td class="label-td" colspan="2">
                                '.$donvitinh.'<br><br>
                                </td>
                            </tr>

                          
                           
                                 <tbody>'
						
						;
					
				}
				}
			else
			{
				echo' không có thuoc...';
				

				}
		}

	public function medicine($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			if($i>0)
					{	echo' <table class="table table-striped custom-table">
					   <thead>
                                    <tr><th>STT</th>
									<th>Tên thuốc</th>
                                        <th style="min-width:200px;">Phân Loại thuốc</th>
                                    
									
                                        <th class="text-right">Hoạt động</th>
                                    </tr>
                                </thead>';
			  			$dem=1;
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row['id'];
					$tenthuoc=$row['tenthuoc'];
					$loaithuoc=$row['loaithuoc'];
					$idloaithuoc=$row['idloaithuoc'];
				
					
				echo'  <tbody>
                                    <tr>
									<td>'.$dem.'</td>
                                      
                                        <td><a href="medicine.php?id='.$id.'">'.$tenthuoc.'</a></td>
                                        
										<td><a href="medicine.php?id='.$id.'">'.$idloaithuoc.'</a></td>
                                     
										
                                        
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                 <a class="dropdown-item" href="?action=Xem&id='.$id.'" class="non-style-link"><i class="fa fa-pencil m-r-5"></i><font class="tn-in-text">Xem chi tiết</font></a>
                                    <a class="dropdown-item" href="edit-medicine.php?id='.$id.'"><i class="fa fa-pencil m-r-5"></i> Chỉnh sửa</a>
                                    <a class="dropdown-item" href="delete-medicine.php?id='.$id.'" ><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
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
				echo' Không có thuốc';
				
				}
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
}
	

?>