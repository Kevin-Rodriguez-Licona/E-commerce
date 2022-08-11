<?php
require("conexion.php");

$idcategoria=$_POST['idcategoria'];
$nombre_categoria=$_POST['nombre_categoria'];
$descripcion=$_POST['descripcion'];
$fecha_creacion=$_POST['fecha_creacion'];
$url_imagen=$_POST['url_imagen'];


$insertar="INSERT INTO `categorias`(`idcategoria`, `nombre_categoria`, `descripcion`, `fecha_creacion`, `url_imagen`) VALUES ('$idcategoria','$nombre_categoria','$descripcion','$fecha_creacion','$url_imagen')";
$query=mysqli_query($con,$insertar);

if($query){
    echo "<script>
    location.href = '../?modulo=admin_categorias';
    </script>"; 
} else{
    echo "<script> alert ('incorrecto'); </script>";
}

?>