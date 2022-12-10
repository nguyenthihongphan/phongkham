
<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=phongkham;charset=utf-8', 'pkgd', '123456');

$data = array();

$query = "SELECT * FROM lichtrinh ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$connect->exec('SET NAMES utf8');
foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'idck'   => $row["idck"],
  'tenbs'   => $row["tenbs"],
  'ngaykham'   => $row["ngaykham"],
   'soluong'   => $row["soluong"],
   'title'   => $row["title"]

 );
}

echo json_encode($data);

?>