<?php include("header.php");?>
    </script>
    
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
<br>
<br>
<br>
<br>

<style>

  
  .box select {
    background-color: #0563af;
    color: white;
    padding: 12px;
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
<div class="mom">
    <div class="child">
            <div class="box" id="marke" style="width:200px;">
                    <select >
                        <option value="">BREND</option>
                        
                        <option value="1" >Alcatel</option>
                        
                        <option value="2" >Apple</option>
                        
                        <option value="3" >Honor</option>
                        
                        <option value="4" >HTC</option>
                        
                        <option value="5" >Huawei</option>
                        
                        <option value="6" >LG</option>
                        
                        <option value="7" >MLS</option>
                        
                        <option value="8" >MobiWire</option>
                        
                        <option value="9" >Motorola</option>
                        
                        <option value="10" >MyKi</option>
                        
                        <option value="11" >Nokia</option>
                        
                        <option value="12" >Samsung</option>
                        
                        <option value="13" >TCL</option>
                        
                        <option value="14" >Wiko</option>
                        
                        <option value="15" >Xiaomi</option>
                        
                        <option value="16" >ZTE</option>
                        
                    </select>
                    </div>
                    <div class="box" style="width:200px;">
                        <select id="model_select" name="id" >
                        <option value="">MODEL</option>

                    </select>
                    </div>
                    </div>
                    <div class="child">

                    <label class="cbcontainer">< 4GB
  <input id="<4" class="ram" type="checkbox">
  <span class="cbcheckmark"></span>
</label>

<label class="cbcontainer">4GB
  <input id="4" class="ram" type="checkbox">
  <span class="cbcheckmark"></span>
</label>

<label class="cbcontainer">6GB
  <input id="6" class="ram" type="checkbox">
  <span class="cbcheckmark"></span>
</label>

<label class="cbcontainer">> 6GB
  <input id=">6" class="ram" type="checkbox">
  <span class="cbcheckmark"></span>
</label>
</div>
<div class="child">

<label class="cbcontainer">< 15Mpx
  <input id="<15" class="kamera" type="checkbox">
  <span class="cbcheckmark"></span>
</label>

<label class="cbcontainer">15Mpx-20Mpx
  <input id="15-20" class="kamera" type="checkbox">
  <span class="cbcheckmark"></span>
</label>

<label class="cbcontainer">20Mpx-25Mpx
  <input id="20-25" class="kamera" type="checkbox">
  <span class="cbcheckmark"></span>
</label>

<label class="cbcontainer">> 25Mpx
  <input id=">25" class="kamera" type="checkbox">
  <span class="cbcheckmark"></span>
</label>

</div>


              <style>
  .cbcontainer {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 15px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.cbcontainer input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.cbcheckmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.cbcontainer:hover input ~ .cbcheckmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.cbcontainer input:checked ~ .cbcheckmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.cbcheckmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.cbcontainer input:checked ~ .cbcheckmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.cbcontainer .cbcheckmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
              </style>                      
      <div class="child">                            
    <div class="price-slider"><span>OD:
    <input id="mincena" type="number" value="0" min="0" max="200000"/>	DO:
    <input id="maxcena" type="number" value="120000" min="0" max="200000"/></span>
  <input id="minrange" value="0" min="0" max="120000" step="500" type="range"/>
  <input id="maxrange"value="120000" min="0" max="120000" step="500" type="range"/>
  <svg width="100%" height="24">
    <line x1="4" y1="0" x2="300" y2="0" stroke="#212121" stroke-width="12" stroke-dasharray="1 28"></line>
  </svg>
</div>
</div>
<style>
input {
  box-shadow: 0;
  outline: 0;
}
.price-slider {
  width: 300px;
  margin: auto;
  text-align: center;
  position: relative;
  height: 6em;
}
.price-slider svg,
.price-slider input[type=range] {
  position: absolute;
  left: 0;
  bottom: 0;
}
input[type=number] {
  border: 1px solid #ddd;
  text-align: center;
  font-size: 1.6em;
  -moz-appearance: textfield;
}
input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
  -webkit-appearance: none;
}
input[type=number]:invalid,
input[type=number]:out-of-range {
  border: 2px solid #e60023;
}
input[type=range] {
  -webkit-appearance: none;
  width: 100%;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #1da1f2;
}
input[type=range]:focus::-ms-fill-lower {
  background: #1da1f2;
}
input[type=range]:focus::-ms-fill-upper {
  background: #1da1f2;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  animate: 0.2s;
  background: #1da1f2;
  border-radius: 1px;
  box-shadow: none;
  border: 0;
}
input[type=range]::-webkit-slider-thumb {
  z-index: 2;
  position: relative;
  box-shadow: 0px 0px 0px #000;
  border: 1px solid #1da1f2;
  height: 18px;
  width: 18px;
  border-radius: 25px;
  background: #a1d0ff;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -7px;
}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  animate: 0.2s;
  background: #1da1f2;
  border-radius: 1px;
  box-shadow: none;
  border: 0;
}
input[type=range]::-moz-range-thumb {
  z-index: 2;
  position: relative;
  box-shadow: 0px 0px 0px #000;
  border: 1px solid #1da1f2;
  height: 18px;
  width: 18px;
  border-radius: 25px;
  background: #a1d0ff;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 5px;
  cursor: pointer;
  animate: 0.2s;
  background: transparent;
  border-color: transparent;
  color: transparent;
}
input[type=range]::-ms-fill-lower,
input[type=range]::-ms-fill-upper {
  background: #1da1f2;
  border-radius: 1px;
  box-shadow: none;
  border: 0;
}
input[type=range]::-ms-thumb {
  z-index: 2;
  position: relative;
  box-shadow: 0px 0px 0px #000;
  border: 1px solid #1da1f2;
  height: 18px;
  width: 18px;
  border-radius: 25px;
  background: #a1d0ff;
  cursor: pointer;
}
</style>
 

<script  src="function.js"></script> 
</div>
<style>
.mom{
    width: 100%;        
}

.child{ 
    text-align: center;
    float: left;
    position: relative;
    width: 19.0%; 
    margin-left: 3% ;
     margin-left: 3% ;
}
</style>
   
<div class="container">
  <div class="row" id="slider-text">
    <div class="col-md-6" >
      <h2>SVI MODELI</h2>
    </div>
  </div>
</div>
<table >


</table>

<script>
$(document).ready(function(){
  $('.ram').on('change', function() {
        $('.ram').not(this).prop('checked', false);         
      });
      $('.kamera').on('change', function() {
        $('.kamera').not(this).prop('checked', false); 
      });
    var brojac=0;
    //brojac na 0
    $.ajax({
        type:"GET",
        url:"daj_modele.php",
        //prosledi 0 i 6
        //proveri sta je chekovano pa na osnovu toga prosledi
        data:{'gornja_granica':0, 'donja_granica':6},
        success:function(data){
            $('table').append(data);
            //uvecava za 6
            brojac=brojac+6;
        }
    });
    $(window).scroll(function(){
        if($(window).scrollTop()>=$(document).height()-$(window).height() &&  $('table tr').length==2){
          var marka=$("#marke option:selected" ).text();
      var model=$("#model_select option:selected" ).text();
      var ram=$("input[class='ram']:checked").attr('id');
      var kamera=$("input[class='kamera']:checked").attr('id');
      var mincena=$("input[id='mincena']").val();
      var maxcena=$("input[id='maxcena']").val();
      if($("input[class='ram']:checked").attr('id')==null){
        ram="null";
      }
      if($("input[class='kamera']:checked").attr('id')==null){
        kamera="null";
      }
            $.ajax({
                type:"GET",
                url:"daj_modele.php",
                //proveri sta je chekovano pa na osnovu toga prosledi
                
                data:{'gornja_granica':brojac, 'donja_granica':brojac+6,'marka':marka,'model':model,'kamera':kamera,'ram':ram,'mincena':mincena,'maxcena':maxcena},
                success:function(data){
                    $('table').append(data);
                    //uvecava za 6
                    brojac=brojac+6;
                }
            });
        }

    });
    $("#marke").on("change",function(){
      $('table').empty();
      $('#model_select').empty();
      var marka=$("#marke option:selected" ).text();
      var model=$("#model_select option:selected" ).text();
      var ram=$("input[class='ram']:checked").attr('id');
      var kamera=$("input[class='kamera']:checked").attr('id');
      var mincena=$("input[id='mincena']").val();
      var maxcena=$("input[id='maxcena']").val();
      if($("input[class='ram']:checked").attr('id')==null){
        ram="null";
      }
      if($("input[class='kamera']:checked").attr('id')==null){
        kamera="null";
      }
      $.ajax({
        type:"GET",
        url:"daj_modelUCombo.php",
        data:{'marka':marka},
        success:function(data){   
            $('#model_select').append(data);
        }
    });
    //if($('#marke option:selected').val()!=0){
      brojac=0;
      $.ajax({
                type:"GET",
                url:"daj_modele.php",
                //proveri sta je chekovano pa na osnovu toga prosledi
                data:{'gornja_granica':brojac, 'donja_granica':brojac+6,'marka':marka,'model':model,'kamera':kamera,'ram':ram,'mincena':mincena,'maxcena':maxcena},
                success:function(data){
                    $('table').append(data);

                    //uvecava za 6
                    brojac=brojac+6;
                }
            });
        //  }
      });
        //dodati isto kad se izabere iz drugog kombo ili kad se nesto cekira ili kad se promeni cena
        $("#model_select").on("change",function(){
      $('table').empty();
     
      var marka=$("#marke option:selected" ).text();
      var model=$("#model_select option:selected" ).text();
      var ram=$("input[class='ram']:checked").attr('id');
      var kamera=$("input[class='kamera']:checked").attr('id');
      var mincena=$("input[id='mincena']").val();
      var maxcena=$("input[id='maxcena']").val();
      if($("input[class='ram']:checked").attr('id')==null){
        ram="null";
      }
      if($("input[class='kamera']:checked").attr('id')==null){
        kamera="null";
      }
      
    //if($('#marke option:selected').val()!=0){
      brojac=0;
      $.ajax({
                type:"GET",
                url:"daj_modele.php",
                //proveri sta je chekovano pa na osnovu toga prosledi
                data:{'gornja_granica':brojac, 'donja_granica':brojac+6,'marka':marka,'model':model,'kamera':kamera,'ram':ram,'mincena':mincena,'maxcena':maxcena},
                success:function(data){
                    $('table').append(data);

                    //uvecava za 6
                    brojac=brojac+6;
                }
            });
        //  }
      });
      $("#minrange").change(function(){
      $('table').empty();
     
      var marka=$("#marke option:selected" ).text();
      var model=$("#model_select option:selected" ).text();
      var ram=$("input[class='ram']:checked").attr('id');
      var kamera=$("input[class='kamera']:checked").attr('id');
      var mincena=$("input[id='mincena']").val();
      var maxcena=$("input[id='maxcena']").val();
      if($("input[class='ram']:checked").attr('id')==null){
        ram="null";
      }
      if($("input[class='kamera']:checked").attr('id')==null){
        kamera="null";
      }
      
    //if($('#marke option:selected').val()!=0){
      brojac=0;
      $.ajax({
                type:"GET",
                url:"daj_modele.php",
                //proveri sta je chekovano pa na osnovu toga prosledi
                data:{'gornja_granica':brojac, 'donja_granica':brojac+6,'marka':marka,'model':model,'kamera':kamera,'ram':ram,'mincena':mincena,'maxcena':maxcena},
                success:function(data){
                    $('table').append(data);

                    //uvecava za 6
                    brojac=brojac+6;
                }
            });
        //  }
      });
      $("#maxrange").change(function(){
      $('table').empty();
     
      var marka=$("#marke option:selected" ).text();
      var model=$("#model_select option:selected" ).text();
      var ram=$("input[class='ram']:checked").attr('id');
      var kamera=$("input[class='kamera']:checked").attr('id');
      var mincena=$("input[id='mincena']").val();
      var maxcena=$("input[id='maxcena']").val();
      if($("input[class='ram']:checked").attr('id')==null){
        ram="null";
      }
      if($("input[class='kamera']:checked").attr('id')==null){
        kamera="null";
      }
      
    //if($('#marke option:selected').val()!=0){
      brojac=0;
      $.ajax({
                type:"GET",
                url:"daj_modele.php",
                //proveri sta je chekovano pa na osnovu toga prosledi
                data:{'gornja_granica':brojac, 'donja_granica':brojac+6,'marka':marka,'model':model,'kamera':kamera,'ram':ram,'mincena':mincena,'maxcena':maxcena},
                success:function(data){
                    $('table').append(data);

                    //uvecava za 6
                    brojac=brojac+6;
                }
            });
        //  }
      });
      $('.ram').change(function() {
        $('table').empty();
     
     var marka=$("#marke option:selected" ).text();
     var model=$("#model_select option:selected" ).text();
     var ram=$("input[class='ram']:checked").attr('id');
     var kamera=$("input[class='kamera']:checked").attr('id');
     var mincena=$("input[id='mincena']").val();
     var maxcena=$("input[id='maxcena']").val();
     if($("input[class='ram']:checked").attr('id')==null){
       ram="null";
     }
     if($("input[class='kamera']:checked").attr('id')==null){
       kamera="null";
     }
     
   //if($('#marke option:selected').val()!=0){
     brojac=0;
     $.ajax({
               type:"GET",
               url:"daj_modele.php",
               //proveri sta je chekovano pa na osnovu toga prosledi
               data:{'gornja_granica':brojac, 'donja_granica':brojac+6,'marka':marka,'model':model,'kamera':kamera,'ram':ram,'mincena':mincena,'maxcena':maxcena},
               success:function(data){
                   $('table').append(data);

                   //uvecava za 6
                   brojac=brojac+6;
               }
           });
  
});
$('.kamera').change(function() {
        $('table').empty();
     
     var marka=$("#marke option:selected" ).text();
     var model=$("#model_select option:selected" ).text();
     var ram=$("input[class='ram']:checked").attr('id');
     var kamera=$("input[class='kamera']:checked").attr('id');
     var mincena=$("input[id='mincena']").val();
     var maxcena=$("input[id='maxcena']").val();
     if($("input[class='ram']:checked").attr('id')==null){
       ram="null";
     }
     if($("input[class='kamera']:checked").attr('id')==null){
       kamera="null";
     }
     
   //if($('#marke option:selected').val()!=0){
     brojac=0;
     $.ajax({
               type:"GET",
               url:"daj_modele.php",
               //proveri sta je chekovano pa na osnovu toga prosledi
               data:{'gornja_granica':brojac, 'donja_granica':brojac+6,'marka':marka,'model':model,'kamera':kamera,'ram':ram,'mincena':mincena,'maxcena':maxcena},
               success:function(data){
                   $('table').append(data);

                   //uvecava za 6
                   brojac=brojac+6;
               }
           });
  
});
});
      

</script>   
   

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
                echo '<h5 class="text-center">'.$json_objekat->cena.' RSD</h5>';
              }
              ?>