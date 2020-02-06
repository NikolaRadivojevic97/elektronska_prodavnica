<?php
  // function dajTelefon($id){
  //   //vrati sve

  //   // $url = 'http://localhost/flight/model_telefona/'.$id.'.json';
  //   $url = 'http://localhost/flight/model_telefona.json';
  //   $curl = curl_init($url);
  //   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //   curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
  //   curl_setopt($curl, CURLOPT_POST, false);
  //   $curl_odgovor = curl_exec($curl);
  //   curl_close($curl);
  //   //ovo je niz
  //   // $json_objekat=json_decode($curl_odgovor);
  //   $json_array=json_decode($curl_odgovor,true);
  //   $brojac=0;
  //   foreach ($json_array as $json_element) {
      
  //     if($json_element!=null){
  //       if($brojac==$id){
  //         echo '<a href="#"> <img src='.$json_element['slika'].' class="img-responsive center-block"> </a>';
  //         echo '<h4 class="text-center">'.$json_element['naziv'].'</h4>';
  //         echo '<h5 class="text-center">'.$json_element['cena'].' RSD </h5>';
  //       }
  //       $brojac++;
  //   }
  //   }
 
  // }
  function dajTelefon($id,$marka=null, $model=null,$ram=null,$kamera1=null,$kamera2=null,$mincena=null,$maxcena=null){

    $url = 'http://localhost/flight/model_telefona.json';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($curl, CURLOPT_POST, false);
    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
  
    $json_array=json_decode($curl_odgovor,true);
    $brojac=0;
    foreach ($json_array as $json_element) {
      
      if($json_element!=null){
        $memorija = explode("G", $json_element['memorija']);
        $kamere = explode("M", $json_element['kamera']);
        if($ram==">6"){
          if(($marka==null || $marka==$json_element['proizvodjac']) &&($model==null || $model==$json_element['naziv'])&&($ram==null || $memorija[0]>6)&&($kamera1==null || ($kamere[0]>$kamera1 && $kamere[0]<$kamera2))&&($mincena==null || ($json_element['cena']>$mincena && $json_element['cena']<$maxcena))){
            if($brojac==$id){
              $href="detalji.php?id=".$json_element['model_id'];
              echo '<a href='.$href.'> <img src='.$json_element['slika'].' class="img-responsive center-block"> </a>';
              echo '<h4 class="text-center">'.$json_element['naziv'].'</h4>';
              echo '<h5 class="text-center">'.$json_element['cena'].' RSD </h5>';
            }
            $brojac++;
          }    
        }
        elseif($ram=="<4"){
          if(($marka==null || $marka==$json_element['proizvodjac']) &&($model==null || $model==$json_element['naziv'])&&($ram==null || $memorija[0]<4)&&($kamera1==null || ($kamere[0]>$kamera1 && $kamere[0]<$kamera2))&&($mincena==null || ($json_element['cena']>$mincena && $json_element['cena']<$maxcena))){
            if($brojac==$id){
              $href="detalji.php?id=".$json_element['model_id'];
              echo '<a href='.$href.'> <img src='.$json_element['slika'].' class="img-responsive center-block"> </a>';
              echo '<h4 class="text-center">'.$json_element['naziv'].'</h4>';
              echo '<h5 class="text-center">'.$json_element['cena'].' RSD </h5>';
            }
            $brojac++;
          }  
        }else
        if(($marka==null || $marka==$json_element['proizvodjac']) &&($model==null || $model==$json_element['naziv'])&&($ram==null || $ram==$memorija[0])&&($kamera1==null ||  ($kamere[0]>$kamera1 && $kamere[0]<$kamera2))&&($mincena==null || ($json_element['cena']>$mincena && $json_element['cena']<$maxcena))){
        if($brojac==$id){
          $href="detalji.php?id=".$json_element['model_id'];
          echo '<a href='.$href.'> <img src='.$json_element['slika'].' class="img-responsive center-block"> </a>';
          echo '<h4 class="text-center">'.$json_element['naziv'].'</h4>';
          echo '<h5 class="text-center">'.$json_element['cena'].' RSD </h5>';
          //echo $kamere[0]."k1".$kamera1."k2".$kamera2;
        }
        $brojac++;
      }
    }
    }
    
 
  }
if(isset($_GET['gornja_granica']) && isset($_GET['donja_granica'])){
  if(isset($_GET['marka'])){
    $gornja_granica=$_GET['gornja_granica'];
    $donja_granica=$_GET['donja_granica'];
    $marka=$_GET['marka'];
    $model=$_GET['model'];
    $ram=$_GET['ram'];
    if($ram=="null"){
      $ram=null;
    }
    $kamera=$_GET['kamera'];
    if($kamera=="null"){
      $kamera1=null;
      $kamera2=null;
    }
    if($kamera=="<15"){
      $kamera1=2;
      $kamera2=15;
    }
    if($kamera=="15-20"){
      $kamera1=15;
      $kamera2=20;
    }
    if($kamera=="20-25"){
      $kamera1=20;
      $kamera2=25;
    }
    if($kamera==">25"){
      $kamera1=25;
      $kamera2=255;
    }
    $mincena=$_GET['mincena'];
    if($mincena==0){
      $mincena=1;
    }
    $maxcena=$_GET['maxcena'];
    if($marka=="BREND"){
      $marka=null;
    }
     if($model=="MODEL"){
      $model=null;
    }
    echo '<tr>';
    while($gornja_granica<$donja_granica-3){
        echo '<td style="width:500px">';
        dajTelefon($gornja_granica,$marka,$model,$ram,$kamera1,$kamera2,$mincena,$maxcena);
        echo '</td>';
        $gornja_granica++;
    }
    echo '</tr>';
    echo '<tr>';
    while($gornja_granica<$donja_granica){
        echo '<td style="width:500px">';
        dajTelefon($gornja_granica,$marka,$model,$ram,$kamera1,$kamera2,$mincena,$maxcena);
        echo '</td>';
        $gornja_granica++;
    }
    echo '</tr>';
  }else{
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
}

?>