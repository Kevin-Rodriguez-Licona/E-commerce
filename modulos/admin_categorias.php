<?php
global $mysqli;
global $urlweb;
?>
    <div class="center">
    <h3 class="center">Administrador de Productos</h3>
    <a href="?modulo=categoria_creacion"?  class="waves-effect waves-light btn modal-trigger"><i class="material-icons left ">add_circle_outline</i>Agregar Nuevo Porducto</a>
    </div>
    <br>
    <table style="color: black" class=" centered highlight white responsive-table">
        <thead>
            <tr >
                <th>Categoria</th>
                <th>Descripcion</th>
                <th>Imagen</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $strsql = "SELECT `idcategoria`, `nombre_categoria`, `descripcion`, `fecha_creacion`, `url_imagen` FROM `categorias`";
            if ($stmt = $mysqli->prepare($strsql)) {
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion, $fecha_creacion, $url_imagen);
                    while ($stmt->fetch()) {
                        ?>
                    <tr id="<?php echo $idcategoria ?>">
                        <td><?php echo $nombre_categoria ?></td>
                        <td><?php echo $descripcion ?></td>
                        <td><img class="responsive-img z-depth-1" src="<?php echo $url_imagen ?>" alt="" width="100px" height="100px"></td>
                        <td><a href="?modulo=categoria_editar&idcategoria=<?php echo $idcategoria ?>" class="btn green">Editar</a></td>
                        <td><a href="javascript:eliminar(<?php echo $idcategoria ?>)" class="btn red">Eliminar</a></td>
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
        function eliminar(idcategoria)
        {
            var url = '<?php echo $urlweb ?>servicios/ws_admin_categorias.php?accion=eliminar';

            fetch(url,
            {
                method: 'POST',
                body: JSON.stringify({
                    "idcategoria":idcategoria
                })
            })
            .then((response) => response.json())
            .then((data) => {
                M.toast({html: data.text})
                const row = document.getElementById(idcategoria);
                row.remove();
            })
            .catch(console.error)
        }
    </script>
    