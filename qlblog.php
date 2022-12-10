<?php
include('./upload.php');
class qlblog extends upfiles
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
	public function blogs($sql)
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
					$tentintuc=$row['tentintuc'];
					$noidung=$row['noidung'];
					$tieude=$row['tieude'];
					$ngaydang=$row['ngaydang'];
					$anh=$row['anh'];
					$nguoidang= $row['nguoidang'];
					
					
				echo' 
				 <div class="col-sm-6 col-md-12 col-lg-4">
				  <div class="blog grid-blog">
				  
                            <div class="blog-image">
                                <a href="blog-details.php?id='.$id.'"><img class="img-fluid" src="assets/img/'.$anh.'" alt=""></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="edit-blog.php?id='.$id.'"><i class="fa fa-pencil m-r-5"></i> Chỉnh sửa</a>
                                   <a class="dropdown-item" href="delete-blog.php?id='.$id.'"> <data-toggle="modal" data-target="#delete_blog"><i class="fa fa-trash-o m-r-5"></i> Xóa</a>
                                </div>
                            </div>
                            <div class="blog-content">
                                <h2 class="blog-title"><a href="blog-details.php?id='.$id.'"><font color="#FF0000">'.$tentintuc.'</font></a></h2>
                                <h5>'.$tieude.'</h5>
                               
								<p>'.$nguoidang.'</p>

                                <a href="blog-details.php?id='.$id.'" class="read-more"><i class="fa fa-long-arrow-right"></i> Đọc thêm</a>
     
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
			public function chitietblogs($sql)
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
					$tentintuc=$row['tentintuc'];
					$noidung=$row['noidung'];
					$tieude=$row['tieude'];
					$ngaydang=$row['ngaydang'];
					$anh=$row['anh'];
					$nguoidang= $row['nguoidang'];
					
					
				echo' 
				 <div class="row">
                    <div class="col-md-8">
                        <div class="blog-view">
                            <article class="blog blog-single-post">
                                <h3 class="blog-title">'.$tieude.'</h3>
                                <div class="blog-info clearfix">
                                    <div class="post-left">
                                        <ul>
                                            <li><a href="#."><i class="fa fa-calendar"></i>Ngày đăng:  <span>'.$ngaydang.'</span></a></li>
                                            
                                        </ul>
                                    </div>
                                    <div class="post-right"><a href="#."><i class="fa fa-comment-o"></i>1 bình luận</a></div>
                                </div>
                                <div class="blog-image">
                                    <a href="#."><img alt="" class="img-fluid" src="assets/img/'.$anh.'"></a>
                                </div>
                                <div class="blog-content">
                                    <p>'.$noidung.'</p>
                                    </div>
                            </article>';	
				}
				}
		
			else
			{
				echo' Không có bài viết';
				
				}
		}
		public function blogkhac($sql)
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
					$tentintuc=$row['tentintuc'];
					$noidung=$row['noidung'];
					$tieude=$row['tieude'];
					$ngaydang=$row['ngaydang'];
					$anh=$row['anh'];
					$nguoidang= $row['nguoidang'];
					
					
				echo' 	
						<ul class="latest-posts">
                                <li>
                                    <div class="post-thumb">
                                        <a href="blog-details.html">
                                            <img class="img-fluid" src="assets/img/blog/blog-thumb-01.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <h4>
											<a href="blog-details.php?id='.$id.'">'.$tieude.'</a>
										</h4>
                                        <p><i aria-hidden="true" class="fa fa-calendar"></i>'.$ngaydang.'</p>
                                    </div>
                                </li>
                                
                            </ul>';
							}
				
					}
			else
			{
				echo' Không có bài viết';
				
				}
	}
	
		}

?>