<?php
global $mysqli;
global $urlweb;
global $dato;
?>
<?php
    $strsql = "select MAX(idcategoria)+1 FROM categorias";
    if ($stmt = $mysqli->prepare($strsql)) {
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($idcategoria);
            $stmt->fetch();
        } else {
            echo "No hay datos para mostrar";
        }
    } else {
        echo "No se pudo preparar la consulta";
    }
?>
<div class="row">
    <br>
            <form class="col s12 " method="POST" enctype="multipart/form-data" style="background-color: #392E5C" action="modulos/guardarcategoria.php">
                <div class="row">

                <div class="input-field col s12">
                    <h5>ID de Categoria:</h5>
                    <input style="color: white"  value="<?php echo $idcategoria ?>" name="idcategoria" id="idcategoria" type="number" class="validate" readonly >
                    <label for="idproducto"></label>
                    </div>

                    <div class="input-field col s12">
                    <h5>Categoria:</h5>
                    <input placeholder="Ingrese la Categoria" name="nombre_categoria" id="nombre_categoria" type="text" class="validate">
                    <label for="nombre_producto"></label>
                    </div>
                
                    <div class="input-field col s12">
                    <h5>Descripcion:</h5>
                    <input placeholder="Ingrese el descripcion"  name="descripcion" id="descripcion" type="text" class="validate">
                    <label for="descripcion"></label>
                    </div>
                    <div class="input-field col s12">
                    <h5>Fecha:</h5>
                    <input placeholder="Ingrese el descripcion"  name="fecha_creacion" id="fecha_creacion" type="date" class="validate">
                    <label for="descripcion"></label>
                    </div>
                    
                </div>

                <br>
                <div class="file-field input-field">
                <h5>Imagen:</h5>
                    <div class="btn">
                        <span>Imagen</span>
                        <input type="file" multiple>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" name="url_imagen" id="url_imagen" type="text" placeholder="Upload one or more files">
                    </div>
                </div>
                <br>
                <div class="center"> <button class="btn waves-effect waves-light center" type="submit" name="action">Guardar Categoria
                    <i class="material-icons right">send</i>
                </button></div>
                <h1> </h1>
            </form>
        </div>