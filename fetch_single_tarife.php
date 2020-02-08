<?php
include('db.php');
include('function_tarife.php');
if(isset($_POST["paket_id"]))
{
 $output = array();
 $statement = $connection->prepare(
  "SELECT * FROM paket 
  WHERE paket_id = '".$_POST["paket_id"]."' 
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["naziv_paketa"] = $row["naziv_paketa"];
  $output["broj_minuta"] = $row["broj_minuta"];
  $output["broj_sms"] = $row["broj_sms"];
  $output["broj_mb"] = $row["broj_mb"];
  $output["cena"] = $row["cena"];
  $output["url"] = $row["url"];
 
 }
 echo json_encode($output);
}
?>