<?php
require("conexion.php");

$idproducto=$_POST['idproducto'];
$nombre_producto=$_POST['nombre_producto'];
$idcategoria=$_POST['idcategoria'];
$descripcion=$_POST['descripcion'];
$precio=$_POST['precio'];
$cantidad=$_POST['cantidad'];
$url_imagen=$_POST['url_imagen'];
$fecha_creacion=$_POST['fecha_creacion'];
$idmarca=$_POST['idmarca'];

$insertar="INSERT INTO `productos`(`idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `cantidad`, `url_imagen`, `fecha_creacion`, `idmarca`) VALUES ('$idproducto',' $nombre_producto',' $idcategoria','$descripcion','$precio','$cantidad','$url_imagen','$fecha_creacion',' $idmarca')";
$query=mysqli_query($con,$insertar);

if($query){
    echo "<script> 
    location.href = '../?modulo=admin_productos';
    </script>"; 
} else{
    echo "<script> alert ('incorrecto'); </script>";
}

?>