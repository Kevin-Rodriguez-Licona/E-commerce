<?php 
global $mysqli;
$idproducto = $_GET['idmarca'];
    $strsql = "SELECT idproducto, nombre_producto, descripcion, precio, cantidad, url_imagen, idmarca FROM productos WHERE idmarca=?";
    if ($stmt = $mysqli->prepare($strsql)) {
        $stmt->bind_param("i", $idproducto);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($idproducto, $nombre_producto, $descripcion, $precio, $cantidad, $url_imagen,$idmarca);
            while ($stmt->fetch()){
                ?>
                <br>
                <div class="container_detalle">
                    <div class="row detalles">
                            <div>
                                
                                <div class= "col l12 m12 s12 seccion2p">
                                    <img src="<?php echo $url_imagen?>" alt="" >
                                </div>
                                <div class= "col l12 m12 s12">
                                    <h4><?php echo $nombre_producto ?></h4>
                                    Descripcion del producto: <b><span><?php echo $descripcion?></span></b><br>
                                    Cantidad en existencia: <b><span><?php echo $cantidad ?></span></b>
                                    <h5>Precio: <b><?php echo "L.".number_format($precio, 2)?></b></h5>
                                    <a  class="purple darken-2 btn"><i class="material-icons left">add_shopping_cart</i>Agregar al Carrito</a>
                                    <h1> </h1>
                                </div>
                            </div>
                            
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No hay datos para mostrar";
        }
    } else {
        echo "No se pudo preparar la consulta";
    }
?>
<br>
