<?php

//update.php

$connect = new PDO('mysql:host=localhost;dbname=phongkham', 'pkgd', '123456');

if(isset($_POST["id"]))
{
 $query = "
 UPDATE lichtrinh
 SET title=:title, start=:start_event, end=:end_event 
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>
