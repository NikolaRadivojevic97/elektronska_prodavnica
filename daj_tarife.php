<?php
  function dajTelefon($id){
    //vrati sve

    // $url = 'http://localhost/flight/model_telefona/'.$id.'.json';
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
    $brojac=0;
    foreach ($json_array as $json_element) {
      
      if($json_element!=null){
        if($brojac==$id){
            echo '<div class="mng-Html-content">';
            echo '<div class="box-container1" style="width:80%; margin-left:10%">';
            echo '<div class="sub-header">';
            echo '<h3 style="font-size:22px; font-align:center; font-weight:bold; ">'.$json_element['naziv_paketa'].'</h3>';
            echo '</div>';
            echo '<h3 style="text-align: center; "><span style="color: inherit;"><span style="font-weight: bold; font-size: 30px;">'.$json_element['broj_mb'].' MB </span>&nbsp;</span></h3>';
            echo '<p style=""><br></p>';
            echo '<a href="#"> <img src='.$json_element['url'].' class="img-responsive center-block"> </a>';
            echo '<p style=""><span class="ga-test" style=""><br></span></p>';
            echo '<hr>';
            echo '<h4 style="text-align: center; "><br></h4>';
            echo '<h4 style="text-align: center; "><span style="font-weight: bold; font-size:20px;">'.$json_element['broj_minuta'].' minuta </span></h4>';
            echo '<h4 style="text-align: center; "><span style="font-weight: bold; font-size:20px;">'.$json_element['broj_sms'].' poruka </span></h4>';
            echo '<p style="text-align: center; "><br></p>
            <hr>
            <h4 style="text-align: center; "><br></h4>';
            echo '<h5 style="margin: 0px; color: rgb(34, 40, 46); font-family: telenorlight, Arial, sans-serif; letter-spacing: -0.26px; text-align: center;"><span style="color: rgb(66, 66, 66);"><span style="font-weight: bold; font-size: 32px;">'.$json_element['cena'].'</span><span style="font-size: 18px;"><span style="font-weight: bold;">RSD</span>/mes.</span></span></h5>';
            echo '<h4 style="text-align: center; "><br></h4>';
            echo '<h4 style="text-align: center; "><a href="/sajt/mobilni_telefoni.php"><input class="BlueButton" type="button" value="Izaberi telefon" onClick></a></h4>';
            echo '</div>
            <p><br></p>    </div>
            </div>  ';
        }
        $brojac++;
    }
    }
 
  }
  if(isset($_GET['gornja_granica']) && isset($_GET['donja_granica'])){
    $gornja_granica=$_GET['gornja_granica'];
    $donja_granica=$_GET['donja_granica'];
    echo '<tr>';
    while($gornja_granica<$donja_granica-3){
        echo '<td style="width:500px">';
        dajTelefon($gornja_granica);
        echo '</td>';
        $gornja_granica++;
    }
    echo '</tr>';
    echo '<tr>';
    while($gornja_granica<$donja_granica){
        echo '<td style="width:500px">';
        dajTelefon($gornja_granica);
        echo '</td>';
        $gornja_granica++;
    }
    echo '</tr>';
  }


?>