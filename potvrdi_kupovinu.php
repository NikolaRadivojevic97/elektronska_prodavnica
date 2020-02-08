<script>
function aalert(){
    alert("uspesno izvrsena kupovina");
}
</script>
<?php
session_start();
 for($i=0;$i<$_SESSION['brojac'];$i++){
    $telefon=$_SESSION['cart'][$i]['id'];
    $tarifa=$_SESSION['cart'][$i]['tarifa'];
    $korisnik=$_SESSION['login_user'];
    $url1 = 'http://localhost/flight/paket.json';
                        $curl1 = curl_init($url1);
                        curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl1, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                        curl_setopt($curl1, CURLOPT_POST, false);
                        $curl_odgovor1 = curl_exec($curl1);
                        curl_close($curl1);
                        //ovo je niz
                        // $json_objekat=json_decode($curl_odgovor);
                        $json_array=json_decode($curl_odgovor1,true);
                        foreach ($json_array as $json_element) {
                          
                            if($json_element!=null){
                              if($json_element['naziv_paketa']==$tarifa){
                                  $paket_id=$json_element['paket_id'];

                              }}}
                              $url2 = 'http://localhost/flight/korisnik.json';
                              $curl2 = curl_init($url2);
                              curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
                              curl_setopt($curl2, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                              curl_setopt($curl2, CURLOPT_POST, false);
                              $curl_odgovor2 = curl_exec($curl2);
                              curl_close($curl2);
                              //ovo je niz
                              // $json_objekat=json_decode($curl_odgovor);
                              $json_array2=json_decode($curl_odgovor2,true);
                              foreach ($json_array2 as $json_element2) {
                                
                                  if($json_element2!=null){
                                    if($json_element2['korisnicko_ime']==$korisnik){
                                        $korisnik_id=$json_element2['korisnik_id'];
      
                                    }}}
    $fields_string = '{
    "datum":"'.date("Y/m/d").'",
    "trajanje_ugovora":"12",
    "model_id":"'.$telefon.'",
    "paket_id":"'.$paket_id.'",
    "korisnik_id":"'.$korisnik_id.'"
      }';
// echo $fields_string;
//open connection
$ch = curl_init();

$url = "http://localhost/flight/ugovor";
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);
    }
$_SESSION['cart']=array();
$_SESSION['brojac']=0;
echo '<script type="text/javascript"> aalert();</script>';
header('location:index.php');
 
 
?>