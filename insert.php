<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Dodaj")
 {
  $image = '';
  
  $statement = $connection->prepare("
   INSERT INTO model_telefona (proizvodjac,naziv,masa,dimenzije,kamera,procesor,baterija,oprativni_sistem,memorija,slika,cena) 
   VALUES (:proizvodjac, :naziv, :masa, :dimenzije, :kamera, :procesor, :baterija, :oprativni_sistem, :memorija, :slika, :cena)
  ");
  $result = $statement->execute(
   array(
    ':proizvodjac' => $_POST["proizvodjac"],
    ':naziv' => $_POST["naziv"],
    ':masa' => $_POST["masa"],
    ':dimenzije' => $_POST["dimenzije"],
    ':kamera' => $_POST["kamera"],
    ':procesor' => $_POST["procesor"],
    ':baterija' => $_POST["baterija"],
    ':oprativni_sistem' => $_POST["oprativni_sistem"],
    ':memorija' => $_POST["memorija"],
    ':slika' => $_POST["slika"],
    ':cena' => $_POST["cena"]
   )
  );
  if(!empty($result))
  {
   echo 'Telefon ubacen';
  }
 }
 if($_POST["operation"] == "Izmeni")
 {
  
  $statement = $connection->prepare(
   "UPDATE model_telefona 
   SET proizvodjac = :proizvodjac, naziv = :naziv, masa = :masa, dimenzije = :dimenzije, kamera = :kamera, procesor = :procesor, baterija = :baterija, oprativni_sistem = :oprativni_sistem, memorija = :memorija, slika = :slika, cena = :cena
   WHERE model_id = :model_id
   "
  );
  $result = $statement->execute(
   array(
    ':proizvodjac' => $_POST["proizvodjac"],
    ':naziv' => $_POST["naziv"],
    ':masa' => $_POST["masa"],
    ':dimenzije' => $_POST["dimenzije"],
    ':kamera' => $_POST["kamera"],
    ':procesor' => $_POST["procesor"],
    ':baterija' => $_POST["baterija"],
    ':oprativni_sistem' => $_POST["oprativni_sistem"],
    ':memorija' => $_POST["memorija"],
    ':slika' => $_POST["slika"],
    ':cena' => $_POST["cena"],
    ':model_id'   => $_POST["model_id"]
   )
  );
  if(!empty($result))
  {
   echo 'Podaci su izmenjeni';
  }
 }
}

?>