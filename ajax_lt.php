
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php 
// Include the database config file 
include_once 'qllt.php'; 
 
if(!empty($_POST["id"])){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM bacsi WHERE tenbs = ".$_POST['idck']." ORDER BY tenbs ASC"; 
    $result = $db->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Tên bác sĩ</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['idck'].'">'.$row['tenbs'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">State not available</option>'; 
    } 
}
?>