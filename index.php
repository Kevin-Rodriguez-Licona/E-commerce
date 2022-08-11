<?php
require "config.php";
require "funciones.class.php";
$funciones = new funciones($mysqli);
$modulo = isset($_GET['modulo']) ? $_GET['modulo'] : 'inicio';//valida si la palabra modulo llega como get si no existe se enviara inicio
require 'app/index.php';

?>