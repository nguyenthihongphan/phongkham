<?php


   require('../Admin/assets/db_config.php');


   $sql = "SELECT * FROM chitietdonthuoc where idloaithuoc LIKE '%".$_GET['id']."%'"; 


   $result = $mysqli->query($sql);
   while($row = $result->fetch_assoc()){
        $json[$row['tenthuoc']] = $row['tenthuoc'];
		 
   }


   echo json_encode($json);
?>