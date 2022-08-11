<?php

class funciones{
    var $mysqli;

    function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    function modulo($idmodulo) //Abrir el modulo y si no existe que retorne error
    {
        if(file_exists("modulos/$idmodulo.php")){
            require "modulos/$idmodulo.php";
        } else{
            echo "<img src='https://www.gstatic.com/youtube/src/web/htdocs/img/monkey.png'>";
        }
    }
}




?>