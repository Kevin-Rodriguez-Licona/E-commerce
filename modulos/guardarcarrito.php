<?php
require("conexion.php");

$idproductocar=$_POST['idproductocar'];
$nombre_productocar=$_POST['nombre_productocar'];
$preciocar=$_POST['preciocar'];
$cantidadcar=$_POST['cantidadcar'];
$Totalcar=$_POST['Total'];
$url_imagen=$_POST['url_imagen'];

$insertar="INSERT INTO `carritos`(`idproductocar`, `nombre_prductocar`, `cantidadcar`, `preciocar`, `Total`,`url_imagen`) VALUES ('$idproductocar','$nombre_productocar','$preciocar','$cantidadcar','$Totalcar','$url_imagen')";
$query=mysqli_query($con,$insertar);

if($query){
    echo "<script> alert('correcto');
    </script>"; 
} else{
    echo "<script> alert ('incorrecto'); </script>";
}

?>