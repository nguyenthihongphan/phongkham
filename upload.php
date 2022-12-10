<?php
class upfiles
{		function uploadfile($name,$tmp_name,$folder)
		{
			if($name!="" && $folder!="")
			
			{		
					$newname=$folder."/".$name;
					if ( move_uploaded_file($tmp_name,$newname))
					{
						return 1;
						}
					else
					{ return 0;}
				
				}
			else{
				return 0;
				}
			
			}
	
	
	}

?>