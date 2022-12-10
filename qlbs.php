<?php
include('../Admin/upload.php');
class qlbs extends upfiles
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
public function loadchitietbs($sql)
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
					$anh=$row['anh']; 
					$tenbs =$row['tenbs'];
					$username =$row['username'];
					$ngaysinh=$row['ngaysinh'];
					$gioitinh=$row['gioitinh'];
					$email=$row['email'];
					$sdt=$row['sdt']; 
					$diachi=$row['diachi'];
					$chucvu=$row['chucvu'];
					$linhvuc=$row['linhvuc'];
					$chuyenkhoa = $row['tenck'];
					
				
			echo '<aside>
			<section class="text-center" style="padding:0">
                  <img class="porfile-pic" src="assets/img/'.$anh.'" alt="">
				  <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="edit-doctor.php?id='.$id.'"><i class="fa fa-pencil m-r-5"></i> Chỉnh sửa</a>
                                    <a class="dropdown-item" href="delete-doctor.php?username='.$username.'" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                                </div>
                            </div>
                  <h2 style="margin-bottom: 5px">'.$tenbs.'</h2>
                  <small class="text-muted">'.$chucvu.'</small>
			 <p class="text-muted">
               <small>
              <b>Giới tính:</b>'.$gioitinh.'</small>
            </p>
			 <p class="text-muted">
               <small>
              <b>Ngày sinh:</b>'.$ngaysinh.'</small>
            </p>
            <p class="text-muted">
               <small>
              <b>Số điện thoại:</b>'.$sdt.'</small>
            </p>
           <p class="text-muted">
              <small>
              <b>Email:</b> '.$email.'
                
              </small>
           </p>
                 <p class="text-muted">
              <small>
              <b>Địa chỉ:</b> '.$diachi.'
                
              </small>
           </p>
            
              </section>
			  <section>
              <h3 class="line-title center">Chuyên khoa</h3>
              
              <article class="flex-group">
               
                  <p>'.$chuyenkhoa.'</p>
                
               
              </article>
       			
            </section>
             <section>
              <h3 class="line-title center">Lĩnh vực</h3>
              
              <article class="flex-group">
               
                  <p>'.$linhvuc.'</p>
                
               
              </article>
       			
            </section>
           
          </aside>
          
      </div>

    '
						
						;
					
				}
				}
			else
			{
				echo' không có bác sĩ...';
				
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
	
			public function doctors($sql)
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
					$anh=$row['anh'];
					$tenbs=$row['tenbs'];
					$username=$row['username'];
					$gioitinh=$row['gioitinh'];
					$ngaysinh=$row['ngaysinh'];
					$sdt=$row['sdt'];
					$email=$row['email'];
					$tenck=$row['tenck'];
					$diachi=$row['diachi'];
					$chucvu=$row['chucvu'];
					$linhvuc=$row['linhvuc'];
					
					
					
				echo' <div class="col-md-4 col-sm-4  col-lg-3" >
				 <div class="profile-widget" >
                            <div class="doctor-img">
                                <a class="avatar" href="profile.php?id='.$id.'"><img alt="" src="assets/img/'.$anh.'"></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="edit-doctor.php?id='.$id.'"><i class="fa fa-pencil m-r-5"></i> Chỉnh sửa</a>
                                    <a class="dropdown-item" href="delete-doctor.php?username='.$username.'"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                                </div>
                            </div>
                            <h4 class="doctor-name text-ellipsis"><a href="profile.php?id='.$id.'">'.$tenbs.'</a></h4>
                            <div class="doc-prof">'.$tenck.'</div>
                            <div class="user-country">
                                <i class="fa fa-map-marker"></i> '.$email.'
                            </div>
                        </div> 
						</div>';	
																							 					}
			
				}
		
			else
			{
				echo' Không có bác sĩ';
				
				}
		}
		public function loadchuyenkhoa($sql)
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
					$tenck=$row['tenck'];
						echo '<div id = chuyenkhoa ><a href="index.php?id='.$id.'">'.$tenck.'</a></div>';
					echo '<br>';
					}
				}
			else
			{
				echo' không có dữ liệu';
				
				}
			}
		public function loadcombo_chuyenkhoa($sql)
		{
			$link=$this->connect();
			$ketqua=mysql_query($sql,$link);
			mysql_close($link);
			$i=mysql_num_rows($ketqua);
			if($i>0)
			{	echo' <select name="chuyenkhoa" class="form-control" id="chuyenkhoa">
       				 ';
				while($row=mysql_fetch_array($ketqua))
				{
					$id=$row['id'];
					$tenck=$row['tenck'];
					echo' <label ><option  value="'.$id.'">'.$tenck.'</option></label>';
					}
				echo '</select>';
				}
			}
	}
	

?>