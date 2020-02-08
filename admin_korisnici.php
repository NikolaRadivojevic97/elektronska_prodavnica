<?php include('admin_header.html');?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:10%">Ime</th>
							<th style="width:10%">Prezime</th>
                            <th style="width:10%">Korisnicko ime</th>
                            <th style="width:15%">Email</th>
                            <th style="width:10%" >Kontakt telefon</th>
                            <th style="width:15%" >Adresa</th>
                            <th style="width:10%" >Admin</th>
                            <th style="width:10%">Obrisi</th>
                            <th style="width:10%">Privilegije</th>
						</tr>
					</thead>
					<tbody>
                    <!-- <script>
                    function izracunaj(){
                        return document.getElementById("cena_telefona")+document.getElementById("cena_tarife");
                    }
                    </script> -->
                    <?php
                    //function dajKorisnike(){
                            $url = 'http://localhost/flight/korisnik.json';
                            $curl = curl_init($url);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                            curl_setopt($curl, CURLOPT_POST, false);
                            $curl_odgovor = curl_exec($curl);
                            curl_close($curl);
                            $json_array=json_decode($curl_odgovor,true);

                            foreach ($json_array as $json_element) {
                              
                              if($json_element!=null){
                               
                                echo '<tr>';
                                echo '<td data-th="Ime">'.$json_element['ime'].'</td>';
                                echo '<td data-th="Prezime">'.$json_element['prezime'].'</td>';
                                echo '<td data-th="Korisnicko ime">'.$json_element['korisnicko_ime'].'</td>';
                                echo '<td data-th="Email">'.$json_element['email'].'</td>';
                                echo '<td data-th="Kontakt telefon">'.$json_element['kontakt_telefon'].'</td>';
                                echo '<td data-th="Adresa">'.$json_element['adresa'].'</td>';
                                echo '<td data-th="Admin">'.$json_element['admin'].'</td>';
                                echo '<td class="actions" data-th="Obrisi">';
                                echo '<form action="korisnika_obrisi.php?name='.$json_element['korisnik_id'].'" mathod="post">';
                                echo '<input type="hidden" name="name" value='.$json_element['korisnik_id'].'>';
                                echo '<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>';
                                echo "</form>";
                                echo '</td>';
                                echo '<td class="actions" data-th="Privilegije">';
                                echo '<form action="admina_dodaj.php?name='.$json_element['korisnik_id'].'" mathod="post">';
                                echo '<input type="hidden" name="name" value='.$json_element['korisnik_id'].'>';
                                echo '<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-bars"></i></button>';
                                echo "</form>";
                                echo '</td>';
                                echo '</tr>';
                            }
                            }
                         
                         // }   
                    ?>
						
						
					</tbody>
					
				</table>
</div>
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