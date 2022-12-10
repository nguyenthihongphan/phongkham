<?php


   require('./assets/db_config.php');


   $sql = "SELECT * FROM bacsi where idck LIKE '%".$_GET['id']."%'"; 


   $result = $mysqli->query($sql);
   while($row = $result->fetch_assoc()){
        $json[$row['tenbs']] = $row['tenbs'];
		 
   }


   echo json_encode($json);
?>