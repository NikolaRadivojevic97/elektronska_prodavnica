<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM model_telefona ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE naziv LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY model_id DESC ';
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
 
 $sub_array[] = $row["proizvodjac"];
 $sub_array[] = $row["naziv"];
 $sub_array[] = $row["masa"];
 $sub_array[] = $row["dimenzije"];
 $sub_array[] = $row["kamera"];
 $sub_array[] = $row["procesor"];
 $sub_array[] = $row["baterija"];
 $sub_array[] = $row["oprativni_sistem"];
 $sub_array[] = $row["memorija"];
 $sub_array[] = $row["slika"];
 $sub_array[] = $row["cena"];
 $sub_array[] = '<button type="button" name="update" id="'.$row["model_id"].'" class="btn btn-warning btn-xs update">Izmeni</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["model_id"].'" class="btn btn-danger btn-xs delete">Obrisi</button>';
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