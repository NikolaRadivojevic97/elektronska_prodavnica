<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
// $connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
//$username = mysql_real_escape_string($username);
//$password = mysql_real_escape_string($password);
// Selecting Database
// $db = mysql_select_db("company", $connection);
// SQL query to fetch information of registerd users and finds user match.
// $query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
// $rows = mysql_num_rows($query);
$url = 'http://localhost/flight/korisnik.json';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
curl_setopt($curl, CURLOPT_POST, false);
$curl_odgovor = curl_exec($curl);
curl_close($curl);
//ovo je niz
// $json_objekat=json_decode($curl_odgovor);
$json_array=json_decode($curl_odgovor,true);
$ima=false;
foreach ($json_array as $json_element) {
  if($json_element!=null){
      if($username==$json_element['korisnicko_ime'] && $password==$json_element['sifra']){
          if($json_element['admin']==1){
            $_SESSION['login_admin']=$username;
            header("location: index.php");
            $ima=true;
          }else{
            $_SESSION['login_user']=$username;
            $_SESSION['brojac']=0; // Initializing Session
            $_SESSION['cena_korpe']=0;
            header("location: index.php"); // Redirecting To Other Page
            $ima=true;
          }
      } 
      }
}
if($ima==false){
    header("location: index.php");   
}
}
}
?>