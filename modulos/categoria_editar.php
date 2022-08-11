<?php
global $mysqli;

global $mysqli;
$idcategoria = $_GET['idcategoria'];
    $strsql = "SELECT `idcategoria`, `nombre_categoria`, `descripcion`, `url_imagen` FROM `categorias` WHERE `idcategoria` =?";
    if ($stmt = $mysqli->prepare($strsql)) {
        $stmt->bind_param("i", $idcategoria);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion, $url_imagen);
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
            <form class="col s12 " method="POST" enctype="multipart/form-data" style="background-color: #392E5C" action="modulos/editarcategoria.php">
                <div class="row">

                <div class="input-field col s12">
                    <h5>ID de Categoria:</h5>
                    <input style="color: white"  value="<?php echo $idcategoria ?>" name="idcategoria" id="idcategoria" type="number" class="validate" readonly >
                    <label for="idproducto"></label>
                    </div>

                    <div class="input-field col s12">
                    <h5>Categoria:</h5>
                    <input  style="color: white" value="<?php echo $nombre_categoria ?>" name="nombre_categoria" id="nombre_categoria" type="text" class="validate">
                    <label for="nombre_producto"></label>
                    </div>
                
                    <div class="input-field col s12">
                    <h5>Descripcion:</h5>
                    <input style="color: white" value="<?php echo $descripcion ?>"  name="descripcion" id="descripcion" type="text" class="validate">
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
                        <input style="color: white" class="file-path validate" name="url_imagen" id="url_imagen" type="text" value="<?php echo $url_imagen ?>">
                    </div>
                </div>
                <br>
                <div class="center"> <button class="btn waves-effect waves-light center" type="submit" name="action">Guardar Categoria
                    <i class="material-icons right">send</i>
                </button></div>
                <h1> </h1>
            </form>
        </div>