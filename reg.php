<?php 
$url = "http://localhost/flight/korisnik";
if(isset($_POST['submit'])){
    $ime=$_POST['ime'];
    $prezime=$_POST['prezime'];
    $korisnicko_ime=$_POST['korisnicko_ime'];
    $email=$_POST['email'];
    $kontakt_telefon=$_POST['kontakt_telefon'];
    $adresa=$_POST['adresa'];
    $sifra=$_POST['sifra'];
    $ponovi_sifru=$_POST['ponovi_sifru'];
    $fields_string = '{
        "ime":"'.$ime.'",
        "prezime":"'.$prezime.'",
        "korisnicko_ime":"'.$korisnicko_ime.'",
        "sifra":"'.$sifra.'",
        "email":"'.$email.'",
        "kontakt_telefon":"'.$kontakt_telefon.'",
        "adresa":"'.$adresa.'",
        "admin":"0"
      }';

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);
session_start();
$_SESSION['login_admin']=$korisnicko_ime;
header('location:index.php');
 }
//The data you want to send via POST
// $fields = [
//     '__VIEWSTATE '      => $state,
//     '__EVENTVALIDATION' => $valid,
//     'btnSubmit'         => 'Submit'
// ];

//url-ify the data for the POST



?>
