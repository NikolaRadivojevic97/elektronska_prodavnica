<?php include("header.php");?>
  <div class="slideshow-container1">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>
  
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="cropped-Alcatel-Mobile-1200-x-400.png" style="width:100%;">
        </div>
  
        <div class="item">
          <img src="Realme-X-vs-Realme-X-Lite-back-of-the-phone-1200x400.jpg" style="width:100%;">
        </div>
      
        <div class="item">
          <img src="OnePlus-7-Pro-cameras-with-logo-1200x400.jpg" style="width:100%;">
        </div>
        <div class="item">
          <img src="pocophone-f1-armoured-edition-kevlar-xiaomi-aa-3-1200x400.jpg" style="width:100%;">
        </div>
        <div class="item">
            <img src="samsung-galaxy-s9-vs-s8-quick-look-a-4-1200x400.jpg" style="width:100%;">
          </div>
      </div>
  
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <br>
  <br>
  <br>

<div class="container">
  <div class="row" id="slider-text">
    <div class="col-md-6" >
      <h2>AKCIJE</h2>
    </div>
  </div>
</div>

<!-- Item slider-->
<div class="container-fluid">

  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
      <div class="carousel carousel-showmanymoveone slide" id="itemslider">
        <div class="carousel-inner">

          <div class="item active">
            <div class="col-xs-12 col-sm-6 col-md-2">
             
              <?php dajTelefon(7)?>
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
            <?php dajTelefon(8)?>
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
            <?php dajTelefon(3)?>
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
            <?php dajTelefon(4)?>
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
            <?php dajTelefon(5)?>
            </div>
          </div>

          <div class="item">
            <div class="col-xs-12 col-sm-6 col-md-2">
            <?php dajTelefon(6)?>
            </div>
          </div>

        </div>

        <div id="slider-control">
        <a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://cdn0.iconfinder.com/data/icons/website-kit-2/512/icon_402-512.png" alt="Left" class="img-responsive"></a>
        <a class="right carousel-control" href="#itemslider" data-slide="next"><img src="http://pixsector.com/cache/81183b13/avcc910c4ee5888b858fe.png" alt="Right" class="img-responsive"></a>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
    <div class="row" id="slider-text">
      <div class="col-md-6" >
        <h2>PAKETI</h2>
      </div>
    </div>
  </div>
  
  <!-- Item slider-->
  <div class="container-fluid">
  
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="carousel carousel-showmanymoveone slide" id="itemslider1">
          <div class="carousel-inner">
  
            <div class="item active">
              <div class="col-xs-12 col-sm-6 col-md-2">
                <?php dajPaket(3)?>
              </div>
            </div>
  
            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-2">
              <?php dajPaket(4)?>
              </div>
            </div>
  
            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-2">
              <?php dajPaket(5)?>
              </div>
            </div>
  
            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-2">
              <?php dajPaket(6)?>
              </div>
            </div>
  
            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-2">
              <?php dajPaket(7)?>
              </div>
            </div>
            <div class="item">
              <div class="col-xs-12 col-sm-6 col-md-2">
              <?php dajPaket(8)?>
              </div>
            </div>
           
  
          </div>
  
          <div id="slider-control">
          <a class="left carousel-control" href="#itemslider1" data-slide="prev"><img src="https://cdn0.iconfinder.com/data/icons/website-kit-2/512/icon_402-512.png" alt="Left" class="img-responsive"></a>
          <a class="right carousel-control" href="#itemslider1" data-slide="next"><img src="http://pixsector.com/cache/81183b13/avcc910c4ee5888b858fe.png" alt="Right" class="img-responsive"></a>
        </div>
        </div>
      </div>
    </div>
  </div>
<script>

$(document).ready(function(){

$('#itemslider').carousel({ interval: 3000 });
$('#itemslider1').carousel({ interval: 3000 });

$('.carousel-showmanymoveone .item').each(function(){
var itemToClone = $(this);

for (var i=1;i<6;i++) {
itemToClone = itemToClone.next();

if (!itemToClone.length) {
itemToClone = $(this).siblings(':first');
}

itemToClone.children(':first-child').clone()
.addClass("cloneditem-"+(i))
.appendTo($(this));
}
});
});
</script>
 
</script>

   <?php include("footer.php")?>
<?php
              function dajTelefon($id){
                $url = 'http://localhost/flight/model_telefona/'.$id.'.json';
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                curl_setopt($curl, CURLOPT_POST, false);
                $curl_odgovor = curl_exec($curl);
                curl_close($curl);
                $json_objekat=json_decode($curl_odgovor);
                $href="detalji.php?id=".$json_objekat->model_id;
                echo '<a href='.$href.'> <img src='.$json_objekat->slika.' class="img-responsive center-block"> </a>';
                echo '<h4 class="text-center">'.$json_objekat->naziv.'</h4>';
                echo '<h5 class="text-center">'.$json_objekat->cena.' RSD </h5>';
              }
              function dajPaket($id){
                $url = 'http://localhost/flight/paket/'.$id.'.json';
                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                curl_setopt($curl, CURLOPT_POST, false);
                $curl_odgovor = curl_exec($curl);
                curl_close($curl);
                $json_objekat=json_decode($curl_odgovor);
                echo '<a href="tarife.php"> <img src='.$json_objekat->url.' class="img-responsive center-block"> </a>';
                echo '<h4 class="text-center">'.$json_objekat->naziv_paketa.'</h4>';
                echo '<h5 class="text-center">'.$json_objekat->cena.'.00 RSD</h5>';
              }

?>