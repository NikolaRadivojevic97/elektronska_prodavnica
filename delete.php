<?php

include('db.php');
include("function.php");

if(isset($_POST["model_id"]))
{
 
 $statement = $connection->prepare(
  "DELETE FROM model_telefona WHERE model_id = :model_id"
 );
 $result = $statement->execute(
  array(
   ':model_id' => $_POST["model_id"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Telefon obrisan';
 }
}



?>