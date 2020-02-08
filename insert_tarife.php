<?php
include('db.php');
include('function_tarife.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Dodaj")
 {
  $image = '';
  
  $statement = $connection->prepare("
   INSERT INTO paket (naziv_paketa,broj_minuta,broj_sms,broj_mb,cena,url) 
   VALUES (:naziv_paketa, :broj_minuta, :broj_sms, :broj_mb, :cena, :url)
  ");
  $result = $statement->execute(
   array(
    ':naziv_paketa' => $_POST["naziv_paketa"],
    ':broj_minuta' => $_POST["broj_minuta"],
    ':broj_sms' => $_POST["broj_sms"],
    ':broj_mb' => $_POST["broj_mb"],
    ':cena' => $_POST["cena"],
    ':url' => $_POST["url"]
   )
  );
  if(!empty($result))
  {
   echo 'Tarifa ubacena';
  }
 }
 if($_POST["operation"] == "Izmeni")
 {
  
  $statement = $connection->prepare(
   "UPDATE paket 
   SET naziv_paketa = :naziv_paketa, broj_minuta = :broj_minuta, broj_sms = :broj_sms, broj_mb = :broj_mb, cena = :cena, url = :url
   WHERE paket_id = :paket_id
   "
  );
  $result = $statement->execute(
   array(
    ':naziv_paketa' => $_POST["naziv_paketa"],
    ':broj_minuta' => $_POST["broj_minuta"],
    ':broj_sms' => $_POST["broj_sms"],
    ':broj_mb' => $_POST["broj_mb"],
    ':cena' => $_POST["cena"],
    ':url' => $_POST["url"],
    ':paket_id'   => $_POST["paket_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Podaci su izmenjeni';
  }
 }
}

?>