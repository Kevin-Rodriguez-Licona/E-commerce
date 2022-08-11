<?php
global $mysqli;
?>
<div class="slider">
        <ul class="slides">
          <li>
            <img src="app/img/slide4.jpg"> <!-- random image -->
            
          </li>
          <li>
            <img src="https://m.media-amazon.com/images/G/01/sm/CallOfDutyS03/2022/Drop15/CoD_VAN_Warzone_US_PrimeGaming_S4KeyArt_2880x1567_v03._CB1198675309_.jpg"> <!-- random image -->
            
          </li>
          <li>
            <img src="app/img/slide1.jpg"> <!-- random image -->
            
          </li>
          <li>
            <img src="app/img/slide2.jpg"> <!-- random image -->
          </li>
        </ul>
    </div>
    <br><br><br>
<div class="Para_ti">
        
        <div>
            <div class="texto">
                <h1 style="font-size: 25px;">Tecnologia para ti</h1>
            </div>
            <div>
                <div class="row">
                    <?php
                    $strsql="SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `cantidad`, `url_imagen`, `fecha_creacion` FROM `productos` LIMIT 4";
                    if ($stmt = $mysqli -> prepare($strsql)) {
                        $stmt->execute();
                        $stmt->store_result();
                        if ($stmt ->num_rows > 0){
                            $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $cantidad, $url_imagen, $fecha_creacion);
                            while ($stmt->fetch()){
                                ?>
                                <a href="?modulo=producto_detalle&idproducto=<?php echo $idproducto ?>">
                                    <div class="col s12 m3">
                                        <div>
                                        <img src="<?php echo $url_imagen ?>" alt="" >
                                        </div>
                                        <div>
                                        <p><?php echo $nombre_producto?>
                                        </p>
                                        </div>
                                        <div>
                                        <p><?php echo "L.".number_format($precio, 2)?>
                                        </p>
                                        </div>
                                        
                                        
                                    </div>
                                </a>
                                <?php
                            }
                        } else {
                            echo "No hay datos para mostrar";
                        }
                    } else {
                        echo "Error al preparar la consulta";
                    }
                    ?>
                    

                </div>
            </div>


    <div class="Para_ti " style="margin-top: 10px;">
        <div>
            
            <div class="row">
                <div class="col s12 texto">
                    
                    <h1 style="font-size: 25px;">Las mejores marcas</h1>
                </div>
                <?php
                        $strsql="SELECT `idmarca`, `nombre_marca`, `url_imagen` FROM `marcas` LIMIT 2";
                        if ($stmt = $mysqli -> prepare($strsql)) {
                            $stmt->execute();
                            $stmt->store_result();
                            if ($stmt ->num_rows > 0){
                                $stmt->bind_result($idmarca, $nombre_marca, $url_imagen);
                                while ($stmt->fetch()){
                                    ?>
                                    <a href="?modulo=marcas&idmarca=<?php echo $idmarca ?>">
                                    <div class="col s12 m6 seccion2">
                                    <div>
                                        <img src="<?php echo $url_imagen ?>" alt="">
                                        </div>
                                        <div>
                                        <p><?php echo $nombre_marca?>
                                        </p>
                                        </div>
                                        
                                    </div>
                                    </a>
                                    <?php
                                }
                            } else {
                                echo "No hay datos para mostrar";
                            }
                        } else {
                            echo "Error al preparar la consulta";
                        }
                        ?>
                        
            </div>
            <div class="row">
                <div class="col s12">
                    <h1 style="font-size: 25px;"> Ofertas especiales</h1>
                </div>
                <?php
                        $strsql="SELECT `idoferta`, `nombre_oferta`, `descripcion`, `precio`, `url_imagen`, `fecha_creacion` FROM `ofertas` WHERE `idoferta` = 1 ";
                        if ($stmt = $mysqli -> prepare($strsql)) {
                            $stmt->execute();
                            $stmt->store_result();
                            if ($stmt ->num_rows > 0){
                                $stmt->bind_result($idoferta, $nombre_oferta, $descripcion, $precio, $url_imagen, $fecha_creacion);
                                while ($stmt->fetch()){
                                    ?>
                                    <a href="?modulo=ofertas&idoferta=<?php echo $idoferta ?>">
                                        <div class="col s12 seccion3">
                                          <div>
                                                <img src="<?php echo $url_imagen ?>" alt="">
                                                </div>
                                                <div>
                                                <p><?php echo $nombre_oferta?>
                                                </p>
                                                </div>
                                                <div>
                                                <p><?php echo "L.".number_format($precio, 2)?>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                }
                            } else {
                                echo "No hay datos para mostrar";
                            }
                        } else {
                            echo "Error al preparar la consulta";
                        }
                        ?>
                
            </div>
            <div class="row">
                <div class="col s12 ">
                    <h1 style="font-size: 25px;"> Compra por Categoria</h1>
                </div>
                <?php
                        $strsql="SELECT `idcategoria`, `nombre_categoria`, `descripcion`, `fecha_creacion`, `url_imagen` FROM `categorias` LIMIT 4";
                        if ($stmt = $mysqli -> prepare($strsql)) {
                            $stmt->execute();
                            $stmt->store_result();
                            if ($stmt ->num_rows > 0){
                                $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion, $fecha_creacion, $url_imagen);
                                while ($stmt->fetch()){
                                    ?>
                                    <a href="?modulo=Categoria&idcategoria=<?php echo $idcategoria ?>">
                                        <div class="col s12 m3">
                                        <div>
                                            <img src="<?php echo $url_imagen ?>" alt="">
                                            </div>
                                            <div>
                                            <p><?php echo $nombre_categoria?>
                                            </p>
                                            </div>
                                        </div>
                                    </a>
                                    <?php
                                }
                            } else {
                                echo "No hay datos para mostrar";
                            }
                        } else {
                            echo "Error al preparar la consulta";
                        }
                        ?>
            </div>
            
        </div>

    </div>