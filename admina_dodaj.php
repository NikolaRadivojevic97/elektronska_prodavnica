<?php 
function uradi_put($url,$data){
   
  

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data)));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
curl_close($ch);
}
function curl_up($url, $id, $json = '')
{
    $url1 = 'http://localhost/flight/korisnik/'.$id.'.json';
    $curl1 = curl_init($url1);
    curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl1, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($curl1, CURLOPT_POST, false);
    $curl_odgovor = curl_exec($curl1);
    curl_close($curl1);
    $json_objekat=json_decode($curl_odgovor,true);
                          
    if($json_objekat!=null){
        $data ='{
            "ime":"'.$json_objekat["ime"].'",
            "prezime":"'.$json_objekat["prezime"].'",
            "korisnicko_ime":"'.$json_objekat["korisnicko_ime"].'",
            "sifra":"'.$json_objekat["sifra"].'",
            "email":"'.$json_objekat["email"].'",
            "kontakt_telefon":"'.$json_objekat["kontakt_telefon"].'",
            "adresa":"'.$json_objekat["adresa"].'",
            "admin":"1"
          }';
         
            uradi_put($url,$data);
       
             }
}
if(isset($_GET['name'])){
    $id=$_GET['name'];
    $link="http://localhost/flight/korisnik/".$id;
    echo $link;
    curl_up($link,$id);
    header('location:admin_korisnici.php');
}

?>