<?php
function get_total_all_records()
{
 include('db.php');
 $statement = $connection->prepare("SELECT * FROM model_telefona");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}
?>