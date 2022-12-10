<?php
include('./upload.php');
class qllt extends upfiles
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
	
			public function schedule($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			if($i>0)
					{	echo' <div class="col-md-12">
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
								</thead>';
					
				while($row=mysql_fetch_array($ketqua))
				{
					
					$id=$row['id'];
					$tenck=$row['idck'];
					$tenbs=$row['tenbs'];
					$ngaykham=$row['ngaykham'];
					$giokham=$row['giokham'];
					$soluong=$row['soluong'];
				echo' 
								<tbody>
									<tr><td>'.$id.'</td>
										<td>'.$tenck.'</td>
										<td>'.$tenbs.'</td>
										<td>'.$ngaykham.'</td>
										<td>'.$giokham.'</td>
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
                                    
                                </tbody>';																			 					}
				echo'</table>';
				}
		
			else
			{
				echo' Không có lịch trình';
				
				}
		}

			public function loadcombo_chuyenkhoa($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			if($i>0)
			{	echo' <select name="chuyenkhoa" value="0" class="form-control" id="chuyenkhoa" onchange="showUser(this.value)">
       				 ';
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row['id'];
					$tenck=$row['tenck'];
					echo' <label >
					 <option value="" disabled selected hidden>Chọn chuyên khoa</option>
					<option  value="'.$id.'">'.$tenck.'</option>
					</label>';
					}
				echo '</select>';
				}
			}
	}
	

?>