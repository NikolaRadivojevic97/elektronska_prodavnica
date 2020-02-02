<?php
if(isset($_GET['marka'])){
    $marka=$_GET['marka'];
    $url = 'http://localhost/flight/model_telefona.json';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($curl, CURLOPT_POST, false);
    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    //ovo je niz
    // $json_objekat=json_decode($curl_odgovor);
    $json_array=json_decode($curl_odgovor,true);
    $brojac=0;
    echo '<option value="'.$brojac.'">MODEL</option>';
    foreach ($json_array as $json_element) {
      
      if($json_element!=null){
          if($json_element['proizvodjac']==$marka){
        $brojac++;
          echo '<option value="'.$brojac.'">'.$json_element['naziv'].'</option>';
        
          }
    }
    }
}
?>