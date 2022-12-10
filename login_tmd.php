<?php
class login
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
			$pass=md5($pass);
			$link=$this->connect();
			$sql="select id, username, password, phanquyen from taikhoan where username='$user' and password='$pass'  limit 1";
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
	
public function getMedicines($sql) {
	$link=$this->connect();
			$sql="select `id`,`loaithuoc` from `thuoc` 
	order by `tenthuoc` asc;";
			
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
if($i==1)
			{
	
	

	$data = '<option value="">chọn thuốc</option>';

	while($row=mysql_fetch_array($ketqua)) {
		if($id == $row['id']) {
			$data = $data.'<option selected="selected" value="'.$row['id'].'">'.$row['tenthuoc'].'</option>';

		} else {
		$data = $data.'<option value="'.$row['id'].'">'.$row['tenthuoc'].'</option>';
		}
	}
			}
	else{
	return $data;
	}
	
}
public function lichkham($sql)
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
					
					$tenbn=$row["tenbn"];
					$docname=$row["tenbs"];
					$sdtt=$row["sdt"];
					$scheduledate=$row["lichngaykham"];
					$scheduletime=$row["giokham"];				
				echo' 
				 <tbody>
											<tr>
												<td style="min-width: 200px;">
													<a class="avatar" href="profile.html">B</a>
													<h2><a href="profile.php">'.$tenbn.' <span>0'.$sdtt.'</span></a></h2>
												</td>                 
												<td>
													<h5 class="time-title p-0">Có lịch khám với</h5>
													<p>Bác sĩ '.$docname.'</p>
												</td>
												<td>
													<h5 class="time-title p-0">Thời gian</h5>
													<p>'.$scheduledate.'</p>
												</td>
												<td class="text-right">
													<a href="appointments.php?id='.$id.'" class="btn btn-outline-primary take-btn">Chi tiết</a>
												</td>
											</tr>
											
										</tbody>';	
				}
				}
		
			else
			{
				echo' Không có bài viết';
				
				}
		}
		public function timkiemthuoc($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			if($i>0)
					{
						echo' <thead>
                    <tr class="bg-gradient-primary ">
                      <th class="p-1 text-center">STT</th>
                      <th class="p-1 text-center">Ngày kê đơn</th>
                      
                      <th class="p-1 text-center">Tên bệnh nhân</th>
                      
                      <th class="p-1 text-center">Mã bệnh nhân</th>
                      
                      <th class="p-1 text-center">Thuốc</th>
                      
                      <th class="p-1 text-center">Loại thuốc</th>
                      
                      <th class="p-1 text-center">số lượng</th>
					   <th class="p-1 text-center">Lựa chọn</th>
                    </tr>
                  </thead>'	;
			  			$dem=1;	
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row['id'];
					$tenbn=$row["tenbn"];
					$idbn=$row["idbn"];
					$tenthuoc=$row["tenthuoc"];
					$loaithuoc=$row["loaithuoc"];
					$slthuoc=$row["slthuoc"];
					$scheduletime=$row["ngay"];	
							
				echo' 
				 <tbody >
                     <tr>
					 <td id="idbn">'.$dem.'</td>
			<td id="idbn">'.$scheduletime.'</td>
			<td id="tenbn">'.$tenbn.'</td>
			<td id="ngay">BN-0'.$idbn.'</td>
			<td id="tenthuoc">'.$tenthuoc.'</td>
			<td id="loaithuoc">'.$loaithuoc.'</td>
			<td id="slthuoc">'.$slthuoc.'</td>
			<td>
                                        <div >
                                        
                                        <a href="print_pdf.php?id='.$id.'" class="non-style-link"><button  class="btn-primary btn button-icon btn-view"  style="padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Print</font></button></a>
                                       &nbsp;&nbsp;&nbsp;
                                       <a href="?action=Hủy&id='.$id.'&name='.$tenbn.'" class="non-style-link"><button  class="btn-primary btn button-icon btn-delete"  style="padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Hủy</font></button></a>
                                        </div>
                                        </td>
		  </tr>
                  </tbody>';	
				  $dem++;
				}
				}
		
			else
			{
				echo' Bệnh nhân này chưa kê đơn';
				
				}
		}
		public function printhd($sql)
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
					$tenbn=$row["tenbn"];
					$tenhd=$row["tenhd"];
					$idbn=$row["idbn"];
					$tenthuoc=$row["tenthuoc"];
					$loaithuoc=$row["loaithuoc"];
					$slthuoc=$row["slthuoc"];
					$scheduletime=$row["ngay"];
					$diachi=$row["diachi"];
					$sdt=$row["sdt"];
					$email=$row["email"];	
					$kqdieutri=$row["kqdieutri"];
					$tenba=$row["tenba"];			
				echo' 
				<div class="row">
                    <div class=" col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row custom-invoice">
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <img src="assets/img/logo-dark.png" class="inv-logo" alt="">
                                        <ul class="list-unstyled">
                                            <li>PHÒNG KHÁM GIA ĐÌNH</li>
                                            <li>Gò Vấp,HCM</li>
                                            <li>SĐT:055557777</li>
                                            <li>GST No:120</li>
                                        </ul>
                                    </div>
                                    <div class="col-6 col-sm-6 m-b-20">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase">Mã hóa đơn :HD-0'.$id.'</h3>
                                            <ul class="list-unstyled">
                                                <li>Ngày khám: <span> '.$scheduletime.'</span></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6 m-b-20">
										
											<h5>Họ và tên bệnh nhân:</h5>
											<ul class="list-unstyled">
												<li>
													<h5><strong>'.$tenbn.'</strong></h5>
												</li>
												<li>Mã bệnh nhân: <span>'.$idbn.'</span></li>
												<li>Địa chỉ: '.$diachi.'</li>
												<li>Số điện thoại: '.$sdt.'</li>
												<li>Email: '.$email.'</li>
											</ul>
										
                                    </div>
                                    <div class="col-sm-6 col-lg-6 m-b-20">
										<div class="invoices-view">
											<span class="text-muted">Chi tiết bệnh án: '.$tenba.'</span>
											<ul class="list-unstyled invoice-payment-details">
												<li>
													Kết quả xét nghiệm:<b> '.$kqdieutri.'</b>
												</li>
												
											</ul>
										</div>
                                    </div>
                                </div>
                                <div class="table-responsive">
								<h5>Đơn thuốc:</h5>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                
                                                <th>Tên thuốc</th>
                                             
                                                <th>Loại thuốc</th>
                                                <th>Số lượng</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                
                                                <td>'.$tenthuoc.'</td>
                                                <td>'.$loaithuoc.'</td>
                                                <td>'.$slthuoc.'</td>
                                              
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <div class="row invoice-payment">
                                        <div class="col-sm-7">
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="m-b-20">
                                                <h6>Số tiền</h6>
                                                <div class="table-responsive no-border">
                                                    <table class="table mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th>Phí khám:</th>
                                                                <td class="text-right">300.000 đồng</td>
                                                            </tr>
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';	
				}
				}
		
			else
			{
				echo' Không có bài viết';
				
				}
		}
			
}
		?>
 