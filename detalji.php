<?php include("header.php");?>
    <br>
    <br>
    <br>
    <br>
    <br><br>
    <br>
    <style>
.mom{
    width: 100%;        
}

.child{ 
    text-align: center;
    float: left;
    position: relative;
    width: 33.3%; 
    margin-left: 0% ;
     margin-left: 0% ;
}
</style>
<div class="row">
    <?php 
  $id = $_GET['id'];
  // echo "ovo je id".$id;
  dajTelefon($id);
  //dajTelefon($id);
  function dajTelefon($id){
    $url = 'http://localhost/flight/model_telefona/'.$id.'.json';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($curl, CURLOPT_POST, false);
    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $json_objekat=json_decode($curl_odgovor);
    echo "<div class='child'>";
    echo '<h2 class="text-center" >SPECIFIKACIJE</h2>';
    echo "<br>";
    echo '<h4 class="text-center">Proizvodjac: '.$json_objekat->proizvodjac.'</h4>';
    echo '<h4 class="text-center">Naziv: '.$json_objekat->naziv.'</h4>';
    echo '<h4 class="text-center">Dimenzije: '.$json_objekat->dimenzije.'</h4>';
    echo '<h4 class="text-center">Procesor: '.$json_objekat->procesor.'</h4>';
    echo '<h4 class="text-center">Kamera: '.$json_objekat->kamera.'</h4>';
    echo '<h4 class="text-center">Memorija: '.$json_objekat->memorija.'</h4>';
    echo '<h4 class="text-center">Masa: '.$json_objekat->masa.' grama</h4>';
    echo '<h4 class="text-center">Baterija: '.$json_objekat->baterija.'</h4>';
    echo '<h4 class="text-center">Operativni sistem: '.$json_objekat->oprativni_sistem.'</h4>';
    echo "<br>";
    echo '<h3 id="cena_telefona" value='.$json_objekat->cena.' class="text-center"> Cena: '.$json_objekat->cena.' RSD </h3>';
    echo "</div>";
    echo "<div class='child'>";
    echo '<a href="#"> <img src='.$json_objekat->slika.' class="h-100 d-inline-block class="img-responsive center-block"> </a>';
    echo "</div>";

  }
?>
<style>

  
.box select {
  background-color: #0563af;
  color: white;
  padding: 12px;
  /* position: absolute; */
  width: 250px;
  border: none;
  font-size: 20px;
  box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
  -webkit-appearance: button;
  appearance: button;
  outline: none;
}

.box::before {
  content: "\f13a";
  font-family: FontAwesome;
  position: absolute;
  top: 0;
  right: 0;
  width: 20%;
  height: 100%;
  text-align: center;
  font-size: 28px;
  line-height: 45px;
  color: rgba(255, 255, 255, 0.5);
  background-color: rgba(255, 255, 255, 0.1);
  pointer-events: none;
}

.box:hover::before {
  color: rgba(255, 255, 255, 0.6);
  background-color: rgba(255, 255, 255, 0.2);
}

.box select option {
  padding: 30px;
}
</style>
<div class="child">
<br>
<button class="btn btn-primary btn-lg"style="background-color: #0563af; width: 40%;
  height: 50px; margin-right:200px;">Dodaj u korpu</button>
  <br><br>
<div class="box"style="width:200px; ">
                        <h3></h3>
                        <select id="tarife" name="id" >
                        <!-- <option value="">TARIFE</option> -->

                    </select>
                    </div>
                    <div class="cena">
                    <h2 style="text-align: left;" id="cena"></h2>
                    <br>    <br>
                    <h2 style="text-align: left;" id="ukupnacena"></h2>
                    

</div>
</div>
</div>
<br><br><br><br>

<?php include("footer.php")?>
<script>
$(document).ready(function(){
 $.ajax({
        type:"GET",
        url:"dajTarife.php",
        success:function(data){   
            $('#tarife').append(data);
        }
    });
    $("#tarife").on("change",function(){
        if($("#tarife option:selected" ).val()==0){
        document.getElementById('cena').innerHTML="";
        document.getElementById('ukupnacena').innerHTML="";
        }else{
        var cena=$("#tarife option:selected" ).val();
        var cenatelefona=$('h3')[0].innerHTML;
        var elementi=cenatelefona.split(" ");
        
        var ukupno=parseInt(cena)+parseInt(elementi[2]);
        
        document.getElementById('cena').innerHTML="Cena tarife: "+cena+" RSD";
        document.getElementById('ukupnacena').innerHTML="Ukupna cena: "+ukupno+" RSD";
        }
    });
});
</script>
