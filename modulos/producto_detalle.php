<?php
global $mysqli;
$idproducto = $_GET['idproducto'];
    $strsql = "SELECT idproducto, nombre_producto, descripcion, precio, cantidad, url_imagen FROM productos WHERE idproducto=?";
    if ($stmt = $mysqli->prepare($strsql)) {
        $stmt->bind_param("i", $idproducto);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($idproducto, $nombre_producto, $descripcion, $precio, $cantidad, $url_imagen);
            $stmt->fetch();
        } else {
            echo "No hay datos para mostrar";
        }
    } else {
        echo "No se pudo preparar la consulta";
    }
?>

<?php
    $strsql = "select MAX(idproductocar)+1 FROM carritos";
    if ($stmt = $mysqli->prepare($strsql)) {
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($idproductocar);
            $stmt->fetch();
        } else {
            echo "No hay datos para mostrar";
        }
    } else {
        echo "No se pudo preparar la consulta";
    }
?>
<br>
<div class="container_detalle">
    <form method="POST" enctype="multipart/form-data"  action="modulos/guardarcarrito.php">
    <div class="row detalles">
            <div>
            <input  value="<?php echo $idproductocar ?>" name="idproductocar" id="idproductocar" type="hidden"  >
            <input  value="<?php echo $nombre_producto ?>" name="nombre_productocar" id="nombre_productocar" type="hidden"  >
            <input  value="1" name="cantidadcar" id="cantidadcar" type="hidden"  >
            <input  value="<?php echo $precio ?>" name="preciocar" id="preciocar" type="hidden"  >
            <input  value="<?php echo $precio ?>" name="Total" id="Total" type="hidden"  >
            <input  value="<?php echo $url_imagen ?>" name="url_imagen" id="url_imagen" type="hidden"  >
                <div class= "col l12 m12 s12 seccion2p">
                    <img src="<?php echo $url_imagen?>" alt="" >
                </div>
                <div class= "col l12 m12 s12">
                    <h4><?php echo $nombre_producto ?></h4>
                    Descripcion del producto: <b><span><?php echo $descripcion?></span></b><br>
                    Cantidad en existencia: <b><span><?php echo $cantidad ?></span></b>
                    <h5>Precio: <b><?php echo "L.".number_format($precio, 2)?></b></h5>
                    <button class="purple darken-2  btn waves-effect waves-light center" type="submit" name="action">Agregar al carrito
                    <i class=" material-icons right">add_shopping_cart</i>
                    </button>
                    <h1> </h1>
                </div>
            </div>
            
    </div>
    </form>    

    
      
    </div>
  </div>
</div>
    
