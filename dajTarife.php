<?php
    $url = 'http://localhost/flight/paket.json';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($curl, CURLOPT_POST, false);
    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    //ovo je niz
    // $json_objekat=json_decode($curl_odgovor);
    $json_array=json_decode($curl_odgovor,true);
    // $brojac=0;
    echo '<option value="'.$brojac.'">TARIFE</option>';
    foreach ($json_array as $json_element) {
      
      if($json_element!=null){
  
        // $brojac++;
          echo '<option value="'.$json_element['cena'].'">'.$json_element['naziv_paketa'].'</option>';
        
          }
    }
    

?>