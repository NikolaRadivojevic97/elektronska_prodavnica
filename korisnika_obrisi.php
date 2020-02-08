<?php 
function curl_del($url, $json = '')
{
   
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $result = json_decode($result);
    curl_close($ch);

    return $result;
}
if(isset($_GET['name'])){
    $id=$_GET['name'];
    $link="http://localhost/flight/korisnik/".$id;
    curl_del($link);
    header('location:admin_korisnici.php');
}

?>