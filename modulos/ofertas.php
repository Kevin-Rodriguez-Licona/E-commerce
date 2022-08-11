<?php 
global $mysqli;
    $strsql = "SELECT `idoferta`, `nombre_oferta`, `descripcion`, `precio`, `url_imagen`, `fecha_creacion`, `precio_oferta` FROM `ofertas` WHERE idoferta >= 2";
    if ($stmt = $mysqli->prepare($strsql)) {
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($idoferta, $nombre_oferta, $descripcion, $precio, $url_imagen,$fecha_creacion,$precio_oferta);
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
                                    <h4><?php echo $nombre_oferta ?></h4>
                                    Descripcion del producto: <b><span><?php echo $descripcion?></span></b><br>
                                    <h5 style="color: red"><s>Precio: <b><?php echo "L.".number_format($precio, 2)?></b></s></h5>
                                    <h5>Precio Oferta: <b><?php echo "L.".number_format($precio_oferta, 2)?></b></h5>
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