<?php
global $mysqli;
global $urlweb;
?>
<div class="center">
    <h3 class="center">Carrito de Compras</h3>
</div><br>
    
    <table style="color: black" class=" centered highlight white responsive-table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Imagen</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $strsql = "SELECT `idproductocar`, `nombre_prductocar`, `cantidadcar`, `preciocar`, `Total`,`url_imagen` FROM `carritos`";
            if ($stmt = $mysqli->prepare($strsql)) {
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($idproductocar, $nombre_productocar, $cantidadcar, $preciocar,$Total,$url_imagen);
                    while ($stmt->fetch()) {
                        ?>
                    <tr id="<?php echo $idproductocar ?>">
                        <td><?php echo $nombre_productocar ?></td>
                        <td><img class="responsive-img z-depth-1" src="<?php echo $url_imagen ?>" alt="" width="100px" height="100px"></td>
                        <td><?php echo $cantidadcar ?></td>
                        <td><?php echo "L. ".number_format($preciocar, 2) ?></td>
                        <td><?php echo $Total ?></td>
                        <td><a href="javascript:eliminar(<?php echo $idproductocar ?>)" class="btn red">Eliminar</a></td>
                    </tr>
                    <?php
                    }
                } else {
                    echo "No hay registros";
                }
            } else {
                echo "No se pudo preparar la consuta";
            }
            ?>
        </tbody>
    </table>