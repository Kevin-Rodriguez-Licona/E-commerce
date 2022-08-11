<?php
require("conexion.php");

$idcategoria=$_POST['idcategoria'];
$nombre_categoria=$_POST['nombre_categoria'];
$descripcion=$_POST['descripcion'];
$url_imagen=$_POST['url_imagen'];


$insertar="UPDATE `categorias` SET `nombre_categoria`='$nombre_categoria',`descripcion`='$descripcion',`url_imagen`='$url_imagen' WHERE `idcategoria`='$idcategoria'";
$query=mysqli_query($con,$insertar);

if($query){
    echo "<script>
    location.href = '../?modulo=admin_categorias';
    </script>"; 
} else{
    echo "<script> alert ('incorrecto'); </script>";
}

?>