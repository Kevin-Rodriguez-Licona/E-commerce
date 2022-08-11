<?php
global $mysqli;
global $urlweb;
global $dato;
?>
<?php
    $strsql = "select MAX(idproducto)+1 FROM productos";
    if ($stmt = $mysqli->prepare($strsql)) {
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($idproducto);
            $stmt->fetch();
        } else {
            echo "No hay datos para mostrar";
        }
    } else {
        echo "No se pudo preparar la consulta";
    }
?>
<div class="row">
            <form class="col s12 " method="POST" enctype="multipart/form-data" style="background-color: #392E5C" action="modulos/guardar.php">
                <div class="row">
                <div class="input-field col s12">
                    <h5>ID de Producto:</h5>
                    <input style="color: white"  value="<?php echo $idproducto ?>" name="idproducto" id="idproducto" type="number" class="validate" readonly >
                    <label for="idproducto"></label>
                    </div>
                    <div class="input-field col s12">
                    <h5>Producto:</h5>
                    <input placeholder="Ingrese el Producto" name="nombre_producto" id="nombre_producto" type="text" class="validate">
                    <label for="nombre_producto"></label>
                    </div>
                    <div class="input-field col s12">
                    <h5>Categoria:</h5>
                    <select class="browser-default" name="idcategoria" id="idcategoria">
                    <option value="0">Selecione una Categoria</option>
                    <?php
                    $strsql = "SELECT idcategoria, nombre_categoria FROM categorias";
                    if ($stmt = $mysqli->prepare($strsql)) {
                        $stmt->execute();
                        $stmt->store_result();
                        if ($stmt->num_rows > 0) {
                            $stmt->bind_result($idcategoria, $nombre_categoria);
                            while ($stmt->fetch()) {
                                ?>
                                
                                <option value="<?php echo $idcategoria?>"><?php echo $nombre_categoria?></option>
                            <?php
                            }
                        } else {
                            echo "No hay registros";
                        }
                    } else {
                        echo "No se pudo preparar la consuta";
                    }
                    ?>
                        
                    </select>
                    </div>
                    <div class="input-field col s12">
                    <h5>Descripcion:</h5>
                    <input placeholder="Ingrese el descripcion"  name="descripcion" id="descripcion" type="text" class="validate">
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
                <div class="row">
                    <div class="input-field col s12">
                    <h5>Precio:</h5>
                    <input placeholder="Ingrese el Precio" name="precio" id="precio" type="text" class="validate" step="any">
                    <label for="precio"></label>
                    </div>
                    <div class="input-field col s12">
                    <h5>Cantidad:</h5>
                    <input placeholder="Ingrese cantidad" name="cantidad" id="cantidad" type="number" class="validate">
                    <label for="cantidad"></label>
                    </div>
                    <div class="input-field col s12">
                    <h5>Fecha Creacion:</h5>
                    <input placeholder="Ingrese fecha creacion" name="fecha_creacion" id="fecha_creacion" type="date" class="validate">
                    <label for="fecha_creacion"></label>
                    </div>
                    <div class="input-field col s12">
                    <h5>Marca:</h5>
                    <select class="browser-default" name="idmarca" id="idmarca">
                    <option value="0">Selecione una Categoria</option>
                    <?php
                    $strsql = "SELECT idmarca, nombre_marca FROM marcas";
                    if ($stmt = $mysqli->prepare($strsql)) {
                        $stmt->execute();
                        $stmt->store_result();
                        if ($stmt->num_rows > 0) {
                            $stmt->bind_result($idmarca, $nombre_marca);
                            while ($stmt->fetch()) {
                                ?>
                                
                                <option value="<?php echo $idmarca?>"><?php echo $nombre_marca?></option>
                            <?php
                            }
                        } else {
                            echo "No hay registros";
                        }
                    } else {
                        echo "No se pudo preparar la consuta";
                    }
                    ?>
                        
                    </select>
                    </div>
                </div>
                <button class="btn waves-effect waves-light center" type="submit" name="action">Guardar Producto
                    <i class="material-icons right">send</i>
                </button>
                <h1> </h1>
            </form>
        </div>

 <script language="javascript" src="js/jquery-3.6.0.min.js"> 
 document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

</script>