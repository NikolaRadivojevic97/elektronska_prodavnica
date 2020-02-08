<?php

include('db.php');
include("function_tarife.php");

if(isset($_POST["paket_id"]))
{
 
 $statement = $connection->prepare(
  "DELETE FROM paket WHERE paket_id = :paket_id"
 );
 $result = $statement->execute(
  array(
   ':paket_id' => $_POST["paket_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Tarifa obrisana';
 }
}



?>