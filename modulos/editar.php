<?php
require("conexion.php");

$idproducto=$_POST['idproducto'];
$nombre_producto=$_POST['nombre_producto'];
$idcategoria=$_POST['idcategoria'];
$descripcion=$_POST['descripcion'];
$precio=$_POST['precio'];
$cantidad=$_POST['cantidad'];
$url_imagen=$_POST['url_imagen'];


$editar="UPDATE `productos` SET `nombre_producto`='$nombre_producto',`idcategoria`='$idcategoria',`descripcion`='$descripcion',`precio`='$precio',`cantidad`='$cantidad',`url_imagen`='$url_imagen' WHERE `idproducto`='$idproducto' ";
$query=mysqli_query($con,$editar);

if($query){
    echo "<script>
    location.href = '../?modulo=admin_productos';
    </script>"; 
} else{
    echo "<script> alert ('incorrecto'); </script>";
}

?>