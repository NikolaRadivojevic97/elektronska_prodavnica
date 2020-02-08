<?php
include('db.php');
include('function_tarife.php');
$query = '';
$output = array();
$query .= "SELECT * FROM paket ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE naziv_paketa LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY paket_id DESC ';
}
 if($_POST["length"] != -1)
 {
  $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
 }
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
 $sub_array = array();
 
 $sub_array[] = $row["naziv_paketa"];
 $sub_array[] = $row["broj_minuta"];
 $sub_array[] = $row["broj_sms"];
 $sub_array[] = $row["broj_mb"];
 $sub_array[] = $row["cena"];
 $sub_array[] = $row["url"];
 $sub_array[] = '<button type="button" name="update" id="'.$row["paket_id"].'" class="btn btn-warning btn-xs update">Izmeni</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["paket_id"].'" class="btn btn-danger btn-xs delete">Obrisi</button>';
 $data[] = $sub_array;
}
$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records(),
 "data"    => $data
);
echo json_encode($output);
?>