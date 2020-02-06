<?php include("header.php");?>
<br><br><br><br><br><br>
<?php 
  $url = 'http://localhost/flight/korisnik.json';
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
 $niz="";
 $brojac=0;
  foreach ($json_array as $json_element) {
    
    if($json_element!=null){

      $niz.=$json_element['korisnicko_ime'];
      $niz.=' ';
      
        }
  }
  // echo '<form method="post"  action="reg.php" onsubmit="return validate('.$niz.')">';
  ?>
   <script>
     
   
   function validate() {  
     var result = "";	
       result += validateFName(); 	
       result += validateLName(); 	
       result += validateUName(); 	
     result += validateAddress();
     result += validatePassword();
     result += validateKPhone();
     
     if (result == "") return true;
     
     alert("Greska:\n\n" + result);
     return false;	
   }
   
   function validateFName() {
     var name = document.getElementsByName("ime")[0].value;
     if (name.length <= 2)
       return "Ime mora imati vise od 2 karaktera.\n";	
     return "";
   }
   function validateLName() {
     var name = document.getElementsByName("prezime")[0].value;
     if (name.length <= 3)
       return "Prezime mora imati vise od 2 karaktera.\n";	
     return "";
   }
   function validateUName() {
     var name = document.getElementsByName("korisnicko_ime")[0].value;
     var res1="<?php echo $niz;?>";
    var res=res1.split(' ');
     for(var i=0;i<res.length;i++){
     	if(res[i]==name){
     		return "Korisnik vec postoji u bazi.\n"
     	}
     }
     if (name.length <= 3)
       return "Korisnicko ime mora imati vise od 2 karaktera.\n";	
     return "";
   }
   function validateKPhone() {
     var name = document.getElementsByName("kontakt_telefon")[0].value;
     if (name.length <= 11)
       return "Kontakt telefon mora imati vise od 11 karaktera.\n";	
     return "";
   }
   function validateAddress() {
     var name = document.getElementsByName("adresa")[0].value;
     if (name.length <= 3)
           return "Adresa mora imati vise od 2 karaktera.\n";
     return "";
   }
   
   function validatePassword() {
     var password = valueOf("sifra");
     var retype = valueOf("ponovi_sifru");
     
     if (password.length <= 6) 
       return "Sifra mora imati vise od 6 karaktera.\n";
     
     if (password != retype) 
       return "Sifre se ne poklapaju.\n";	
     return "";
   }
   
   
   // function validateTerms() {
   // 	var terms = document.getElementsByName("terms")[0];
   // 	if (!terms.checked)
   // 		return "Please accept the Terms of Service and Privacy Policy";	
   // 	return "";
   // }
   
   function valueOf(name) {
     return document.getElementsByName(name)[0].value;
   }
      </script>

<form action="reg.php" method="post" onsubmit="return validate()">
  <div class="container">
    <h1>Registracija</h1>
    <h2>Popunite polja da bi ste se registrovali.</h2>
    <hr>
    <label for="ime"><b>Ime</b></label>
    <input class="input" type="text" placeholder="Ime" name="ime" required>
    <label for="prezime"><b>Prezime</b></label>
    <input class="input" type="text" placeholder="Prezime" name="prezime" required>
    <label for="Korisnicko_ime"><b>Korisnicko ime</b></label>
    <input class="input" type="text" placeholder="Korisnicko ime" name="korisnicko_ime" required>
    <label for="email"><b>Email</b></label>
    <input class="input" type="text" placeholder="Enter Email" name="email" required>
    <label for="kontakt_telefon"><b>Kontakt telefon</b></label>
    <input class="input" type="text" placeholder="Kontakt telefon" name="kontakt_telefon" required>
    <label for="adresa"><b>Adresa</b></label>
    <input class="input" type="text" placeholder="Adresa" name="adresa" required>
    <label for="sifra"><b>Sifra</b></label>
    <input class="input" type="password" placeholder="*********" name="sifra" required>
    <label for="ponovi_sifru"><b>Ponovi sifru</b></label>
    <input class="input" type="password" placeholder="***********" name="ponovi_sifru" required>
    <hr>

    <button type="submit" name="submit" class="registerbtn" style="background-color:#228cdb;">Registruj se</button>
  </div>

 
</form>
<br><br>
<?php include("footer.php");?>
<style>
    button{
        font-size:20px;
    }
/* * {box-sizing: border-box} */



/* Full-width input fields */
.input{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  font-size:15px;
  background: #f1f1f1;
}

.input:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
  hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
  }

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

label{
    font-size:20px;
}
</style>

