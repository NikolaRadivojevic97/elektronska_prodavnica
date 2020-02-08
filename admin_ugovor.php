<?php include("admin_header.html");?>
<br><br>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #93d4ff;
  color: black;
}
</style>
<?php 
include('db.php');
include('function_tarife.php');



$query = '';
$output = array();
$query .= "select u.datum as datum, u.trajanje_ugovora as trajanje, k.korisnicko_ime as korisnik, p.naziv_paketa as paket, mt.naziv as telefon from ugovor u join korsinik k on u.korisnik_id=k.korisnik_id join model_telefona mt on mt.model_id=u.model_id join paket p on p.paket_id=u.paket_id";

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();




echo '<table id="customers">';
echo "<tr>";
echo "<th>Datum</th>";
echo "<th>Trajanje</th>";
echo "<th>Korisnik</th>";
echo "<th>Paket</th>";
echo "<th>Telefon</th>";
echo "</tr>";

foreach($result as $row)
{
    echo "<tr>";
    echo "<td>".$row['datum']."</td>";
    echo "<td>{$row['trajanje']}</td>";
    echo "<td>{$row['korisnik']}</td>";
    echo "<td>{$row['paket']}</td>";
    echo "<td>{$row['telefon']}</td>";
    
    echo "</tr>";
}
echo "</table>";

?>
