<?php
session_start();
    echo $_GET['name'];
    if(isset($_GET['name'])){
    $niz=$_SESSION['cart'];
    array_splice($niz, $_GET['name'], 1);
    var_dump($niz);
    $_SESSION['cart']=$niz;
    $brojac=$_SESSION['brojac'];
    $_SESSION['brojac']=$brojac-1;
    header('location:korpa.php');
}
?>