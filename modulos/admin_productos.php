<?php
global $mysqli;
global $urlweb;
?>
<div class="center">
    <h3 class="center">Administrador de Productos</h3>
    <a href="?modulo=datos_creacion"?  class="waves-effect waves-light btn modal-trigger"><i class="material-icons left ">add_circle_outline</i>Agregar Nuevo Porducto</a>
</div><br>
    
    <table style="color: black" class=" centered highlight white responsive-table">
        <thead>
            <tr>
                <th>ID Producto</th>
                <th>Producto</th>
                <th>Categoria</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $strsql = "SELECT productos.idproducto, productos.nombre_producto, categorias.nombre_categoria, productos.descripcion, productos.url_imagen, productos.precio, productos.cantidad FROM `productos` INNER JOIN categorias ON categorias.idcategoria=productos.idcategoria";
            if ($stmt = $mysqli->prepare($strsql)) {
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($idproducto, $nombre_producto, $categoria, $descripcion, $url_imagen, $precio, $cantidad);
                    while ($stmt->fetch()) {
                        ?>
                    <tr id="<?php echo $idproducto ?>">
                        <td><?php echo $idproducto ?></td>
                        <td><?php echo $nombre_producto ?></td>
                        <td><?php echo $categoria ?></td>
                        <td><?php echo $descripcion ?></td>
                        <td><img class="responsive-img z-depth-1" src="<?php echo $url_imagen ?>" alt="" width="100px" height="100px"></td>
                        <td><?php echo "L. ".number_format($precio, 2) ?></td>
                        <td><?php echo $cantidad ?></td>
                        <td><a href="?modulo=prueba&idproducto=<?php echo $idproducto ?>" class="btn green modal-trigger">Editar</a></td>
                        <td><a href="javascript:eliminar(<?php echo $idproducto ?>)" class="btn red">Eliminar</a></td>
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



    <script>
        function eliminar(idproducto)
        {
            var url = '<?php echo $urlweb ?>servicios/ws_admin_productos.php?accion=eliminar';

            fetch(url,
            {
                method: 'POST',
                body: JSON.stringify({
                    "idproducto":idproducto
                })
            })
            .then((response) => response.json())
            .then((data) => {
                M.toast({html: data.text})
                const row = document.getElementById(idproducto);
                row.remove();
            })
            .catch(console.error)
        }

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });

        $(document).ready(function() {
            $('input#input_text, textarea#textarea2').characterCounter();
        });
    </script>