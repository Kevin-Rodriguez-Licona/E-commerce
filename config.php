<?php
$servicio = "localhost";
$basedatos = "desarrollo_aplicaciones";
$usuario = "root";
$password = "";
$mysqli = new mysqli($servicio, $usuario, $password, $basedatos);
    if($mysqli->connect_errno) {
        echo $mysqli->connect_error;
    }
$urlweb = "http://localhost/E-commerce/";
?>