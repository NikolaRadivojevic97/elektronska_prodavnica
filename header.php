<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elektronska prodavnica</title>
    <link rel="shortcut icon" href="63390996-vector-plantilla-de-logotipo-abstracta-tienda-de-telefonía-móvil-signo-concepto-de-tienda-de-teléfonos-inte.jpg" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <!-- <link rel="stylesheet" href="bootstrap-4.4.1-dist\css\bootstrap.min.css"> -->
            <!-- <script src="bootstrap-4.4.1-dist\js\bootstrap.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       
        
    
</head>
<body>
    <header id="header" class="navigation" style="font-size:40px; width:100%">
        <div class="container">
            <div class="navigation-bar">
                <!-- <div class="logo"> -->
                  
                    <a href="index.php">
                        <!-- <div class="logo-container"> -->
                          <div class=""><span><img src="63390996-vector-plantilla-de-logotipo-abstracta-tienda-de-telefonía-móvil-signo-concepto-de-tienda-de-teléfonos-inte.jpg" style="width:80px;height:80px;"></span></div>
                            
                        <!-- </div> -->
                    </a>
                <!-- </div> -->

                <ul class="navigation-list">
                    <li class="navigation-item">
                        <a href="mobilni_telefoni.php">Mobilni telefoni</a>
                    </li>
                    <li class="navigation-item">
                        <a href="tarife.php">Tarife</a>
                    </li>
                    <li class="navigation-item">
                        <a href="lokacije.php">Lokacije</a>
                    </li>
                    <?php 
                        session_start();
                        if ( isset( $_SESSION['login_user'] ) ) {
                            $korisnik=$_SESSION['login_user'];
                            echo '<li class="navigation-item">
                            <a href="log_out.php">Odjavi se</a>
                        </li>';
                            echo '<li class="navigation-item">'.$korisnik.'</li>';
                            echo '<li>';
                            if($_SESSION['brojac']>0){
                                echo '<a href="korpa.php">';
                            }else{
                                echo '<a href="#">';
                            }
                                   echo '<!-- <div class="logo-container"> -->
                                        <span class="fa fa-shopping-cart"></span>
                                    <!-- </div> -->
                                </a>
                            <!-- </div> -->
                        </li>';
                            
                        } elseif(isset( $_SESSION['login_admin'] )){
                            $korisnik=$_SESSION['login_admin'];
                            echo '<li class="navigation-item">
                            <a href="log_out.php">Odjavi se</a>
                        </li>';
                            echo '<li class="navigation-item">'.$korisnik.'</li>';
                            echo '<li class="navigation-item">
                            <a href="admin.php">Admin</a>
                        </li>';
                        }else {
                            echo '<li class="navigation-item">
                      <a href="registracija.php">Registracija</a>
                  </li>';
                          echo'<li class="dropdown" style=" font-weight: bold;
                          color: #909491;
                          -webkit-transition: color 0.3s;
                          transition: color 0.3s;
                          font-size: large;
                          display: block;
                          padding: 10px;">
                          <a class="dropdown-toggle" href="#" data-toggle="dropdown">Prijavi se<strong></strong></a>
                          <div class="dropdown-menu" style="padding: 15px; padding-bottom: 20px;">
                          <form action="login.php" method="post" accept-charset="UTF-8">
                          <input id="user_username" placeholder="Korisnicko ime" style="margin-bottom: 15px;" type="text" name="username" size="30" />
                          <input id="user_password" placeholder="sifra" style="margin-bottom: 15px;" type="password" name="password" size="30" />
                          
                         
                          <input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="submit" value="Prijavi se" />
                        </form>
                          </div>
                        </li>';
                        echo '<li>
                        <!-- <div class="logo"> -->
                            <a href="#">
                                <!-- <div class="logo-container"> -->
                                    <span class="fa fa-shopping-cart"></span>
                                <!-- </div> -->
                            </a>
                        <!-- </div> -->
                    </li>';
                      
                        }
                    ?> 
                   
                </ul>
                
            </div>
        </div>
    </header>
    <script>
        $(function() {
  // Setup drop down menu
  $('.dropdown-toggle').dropdown();
 
  // Fix input element click problem
  $('.dropdown input, .dropdown label').click(function(e) {
    e.stopPropagation();
  });
});
    window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("header").style.fontSize = "20px";
  } else {
    document.getElementById("header").style.fontSize = "40px";
  }
}
    </script>
    <br>
    <br>
    <br>
    <br>
    <br>