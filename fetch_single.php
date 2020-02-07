<?php
include('db.php');
include('function.php');
if(isset($_POST["model_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM model_telefona 
  WHERE model_id = '".$_POST["model_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["proizvodjac"] = $row["proizvodjac"];
  $output["naziv"] = $row["naziv"];
  $output["masa"] = $row["masa"];
  $output["dimenzije"] = $row["dimenzije"];
  $output["kamera"] = $row["kamera"];
  $output["procesor"] = $row["procesor"];
  $output["baterija"] = $row["baterija"];
  $output["oprativni_sistem"] = $row["oprativni_sistem"];
  $output["memorija"] = $row["memorija"];
  $output["slika"] = $row["slika"];
  $output["cena"] = $row["cena"];
 
 }
 echo json_encode($output);
}
?>