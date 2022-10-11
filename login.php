<?php
$user = $_GET['user'];
$pass = $_GET['pass'];

$mysqli = new mysqli("localhost", "root", "", "test");
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$resultado = $mysqli->query("select contra from test where nombre ='" .$user . "'");


while ($row = $resultado->fetch_assoc()) {
    $contra=$row['contra'];
}

 if($user=="plaiaundi" && $pass=="1234"){
     echo "user y pass correctos";
     session_start();
     $_SESSION['user']=$user;
    header("Location: insert_form.php");
 }elseif ($pass==$contra){
     echo "user y pass correctos";
     session_start();
     $_SESSION['user']=$user;
     header("Location: dashboard.php");
 }else{
    header("Location: loginform.php");
 }

$mysqli->close();