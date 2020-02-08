<?php include("header.php");?>
<br><br><b><br><br><br>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:30%">Telefon</th>
							<th style="width:10%">Cena telefona</th>
                            <th style="width:30%">Tarifa</th>
                            <th style="width:10%">Cena tarife</th>
							<th style="width:10%" class="text-center">Ukupno</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
                    <script>
                    function izracunaj(){
                        return document.getElementById("cena_telefona")+document.getElementById("cena_tarife");
                    }
                    </script>
                    <?php
                    function dajTelefon($id){
                         $url = 'http://localhost/flight/model_telefona/'.$id.'.json';
                        $curl = curl_init($url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                        curl_setopt($curl, CURLOPT_POST, false);
                        $curl_odgovor = curl_exec($curl);
                        curl_close($curl);
                         $json_objekat=json_decode($curl_odgovor,true);
                          
                          if($json_objekat!=null){
                              echo '<tr>';
                              echo '<td data-th="Telefon">';
                              echo '<div class="row">';
                              echo '<div class="col-sm-2 hidden-xs"><img src='.$json_objekat['slika'].' alt="..." class="img-responsive"/></div>';
                              echo '<div class="col-sm-10">';
                              echo '<h4 class="nomargin">'.$json_objekat['proizvodjac'].'</h4>';
                              echo '<p>'.$json_objekat['naziv'].'</p>';
                              echo '</div>';
                              echo '</div>';
                              echo '</td>';
                              echo '<td id="cena_telefona" data-th="Cena telefona">'.$json_objekat['cena'].'</td>';
                        }
                    }
                       function dajTarife($telefon,$naziv){
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
                        $url2 = 'http://localhost/flight/model_telefona/'.$telefon.'.json';
                        $curl2 = curl_init($url2);
                        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl2, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                        curl_setopt($curl2, CURLOPT_POST, false);
                        $curl_odgovor2 = curl_exec($curl2);
                        curl_close($curl2);
                        $json_objekat=json_decode($curl_odgovor2,true);
                        foreach ($json_array as $json_element) {
                          
                          if($json_element!=null){
                            if($json_element['naziv_paketa']==$naziv){
                                echo '<td data-th="Tarifa">';
                                echo '<div class="row">';
                                echo '<div class="col-sm-2 hidden-xs"><img src='.$json_element['url'].' alt="..." class="img-responsive"/></div>';
                                echo '<div class="col-sm-10">';
                                echo '<h4 class="nomargin">'.$json_element['naziv_paketa'].'</h4>';
                                echo '<p>'.$json_element['broj_mb'].' MB</p>';
                                echo '</div>';
                                echo '</div>';
                                echo '</td>';
                                echo '<td id="cena_tarife" data-th="Cena tafire">'.$json_element['cena'].'</td>';
                                echo '<td data-th="Ukupno" class="text-center">';
                                echo $json_element['cena']+$json_objekat['cena'];
                                $mrk=$_SESSION['cena_korpe'];
                                
                                $_SESSION['cena_korpe']=$mrk+$json_element['cena']+$json_objekat['cena'];
                                
                            }
                                
                            
                              }
                            
                        }
                       }
                       
                      
                      
                        if (!isset( $_SESSION['login_user'])) {
                            echo "korpa je prazna, prijaviti se za kupovinu";
                        }else{
                            $_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
                            //echo"dobro dosli ".$korisnik;
                            //echo count($_SESSION['cart']);
                            //echo '\n';
                            for($i=0;$i<$_SESSION['brojac'];$i++){
                                $telefon=$_SESSION['cart'][$i]['id'];
                                $tarifa=$_SESSION['cart'][$i]['tarifa'];
                                dajTelefon($telefon);
                                dajTarife($telefon,$tarifa);
                                
                                echo '</td>';
                                echo '<td class="actions" data-th="">';
                                echo '<form action="obrisi.php?name='.$i.'" mathod="post">';
                                echo '<input type="hidden" name="name" value='.$i.'>';
                                echo '<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>';
                                echo "</form>";
                                echo '</td>';
                                echo '</tr>';

                            }
                        }
                        
                        
                       
                    ?>
						
						
					</tbody>
					<tfoot>
						
						<tr>
							<td><a href="mobilni_telefoni.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Nastavi Kupovinu</a></td>
							<td colspan="2" class="hidden-xs"></td>
                            <td>
                    </td>
                            <?php $_SESSION['cena']=$_SESSION['cena_korpe']; echo '<td id="cena" class="hidden-xs text-center"><strong>'.$_SESSION['cena_korpe'].'</strong></td>'; $_SESSION['cena_korpe']=0;?>
                            <td><form action="potvrdi_kupovinu.php" mathod="post">
                                <button type="submit" class="btn btn-success btn-block">Potvrdi<i class="fa fa-angle-right"></i></button></td>
							<!-- <td><a href="#" class="btn btn-success btn-block">Potvrdi <i class="fa fa-angle-right"></i></a></td> -->
                            </form>
						</tr>
					</tfoot>
				</table>
                <form action="" mathod="post">
                            <div class="box"  style="width:200px;">
                            <select name="valute">
                        <option value="">Valuta</option>
                        
                        <option value="eur" >eur</option>
                        
                        <option value="usd" >usd</option>
                        
                        <option value="chf" >chf</option>
                        
                        <option value="gbr" >gbr</option>
                        
                        <option value="aud" >aud</option>     
                        
                        <option value="cad" >cad</option>
                        
                        <option value="sek" >sek</option>
                        
                        <option value="dkk" >dkk</option>
                        
                        <option value="nok" >nok</option>
                        
                        <option value="jpy" >jpy</option>
                        
                        <option value="rub" >rub</option>
                        
                        <option value="cny" >cny</option>
                        
                        <option value="hrk" >hrk</option>
                        
                        <option value="kwd" >kwd</option>
                        
                        <option value="pln" >pln</option>
                        
                        <option value="czk" >czk</option>

                        <option value="huf" >huf</option>
                        
                        <option value="bam" >bam</option>
                        
                    </select>
                    <button type="submit1" name="submit1" class="btn btn-success btn-block">Zameni valutu<i class="fa fa-angle-right"></i></button>
                    </form>
                    <?php
                    if(isset($_GET['submit1'])){
                        //echo "uso";
                        $valuta=isset($_GET['valute'])? $_GET['valute'] : false;
                        $cena=$_SESSION['cena'];
                        //echo $valuta;
                        //echo $cena;
                        $url='https://api.kursna-lista.info/0e0156083e1ccc17dc40319ca542628a/konvertor/rsd/'.$valuta.'/'.$cena;
                        $curl = curl_init($url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                            curl_setopt($curl, CURLOPT_POST, false);
                            $curl_odgovor = curl_exec($curl);
                            curl_close($curl);
                            $json_objekat=json_decode($curl_odgovor);
                            //print_r($json_objekat);
                            //echo $json_objekat->result->value;
                        
                            $_SESSION['promenjena_cena']=$json_objekat->result->value;
                            
                    echo '<td id="cena" class="hidden-xs text-center"><strong>'.$_SESSION['promenjena_cena'].' '.$valuta.'</strong></td>'; $_SESSION['promenjena_cena']=0;
                    }?>
                        </div>
               
                
</div>
<!-- <script>
                $(document).ready(function(){
                $("#valute").on("change", function() {
                    alert("aaa");
                    var valuta=$("#valute option:selected" ).text();
                    var cena=5;
                    $.ajax({
                    type: 'GET',
                    url: 'https://api.kursna-lista.info/0e0156083e1ccc17dc40319ca542628a/konvertor/rsd/'.valuta.'/'.cena,
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8',
                    success: function(response) {
                        $('#cena').html(JSON.stringify(response));
                    }
                });
                });
                });
                </script> -->
<br><br><br><br><br><br><br>
<style>
.table>tbody>tr>td, .table>tfoot>tr>td{
    vertical-align: middle;
}
@media screen and (max-width: 600px) {
    table#cart tbody td .form-control{
		width:20%;
		display: inline !important;
	}
	.actions .btn{
		width:36%;
		margin:1.5em 0;
	}
	
	.actions .btn-info{
		float:left;
	}
	.actions .btn-danger{
		float:right;
	}
	
	table#cart thead { display: none; }
	table#cart tbody td { display: block; padding: .6rem; min-width:320px;}
	table#cart tbody tr td:first-child { background: #333; color: #fff; }
	table#cart tbody td:before {
		content: attr(data-th); font-weight: bold;
		display: inline-block; width: 8rem;
	}
	
	
	
	table#cart tfoot td{display:block; }
	table#cart tfoot td .btn{display:block;}
	
}
</style>
<?php include("footer.php");?>
