<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo $urlweb?>app/css/estilo.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper" style="background-color:#181B2C">
        <a href="http://localhost/E-commerce/" class="brand-logo">KEVLEX</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a class=" modal-trigger" href="#modal1">Bienvenido</a></li>
            <li><a href="">Acerca de</a></li>
            <li><a href="">Categoria</a></li>
            <li><a href="?modulo=carrito"><i class="material-icons right">shopping_cart</i>Carrito</a></li>
        </ul>
        </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
  <li><a class="waves-effect waves-light btn modal-trigger" href="#modal1">Bienvenido</a></li>
    <li><a href="">Acerca de</a></li>
    <li><a href="">Categoria</a></li>
    <li><a href=""><i class="material-icons right">shopping_cart</i>Carrito</a></li>
  </ul>    


   <!-- Modal Structure -->
 <div id="modal1" class="modal">
   <div class="modal-content center"  style="color: black">
     <h4>!Bienvenido</h4>
     <p>A continuacion encontrara los modulos disponibles para este sitio wed</p>

        <ul class="collapsible">
    <li>
        <div class="collapsible-header">
        <i class="material-icons">store</i>Administracion de productos
        </div>
        <div class="collapsible-body">
        <a href="?modulo=admin_productos" class="waves-effect waves-light btn"><i class="material-icons left">add_circle</i>Administrar productos</a>
        </div>
    </li>
    <li>
        <div class="collapsible-header">
        <i class="material-icons">dehaze</i>Administracion de Categorias
        </div>
        <div class="collapsible-body">
        <a href="?modulo=admin_categorias" class="waves-effect waves-light btn"><i class="material-icons left">add_circle</i>Administrar categoria</a>
        </div>
    </li>
    
    </ul>

   </div>
   
   

 </div>

    <div id="topbar2">   
        <?php $funciones->modulo($modulo); ?>

        <div class="piepagina">
            <div class="pie"> 
                <div>
                    <p>@ 2022 Desarrollo de Aplicaciones en internet</p>
                </div>
                <div>
                    <p>usap.edu</p>
                </div>
            </div>
        </div>
        

        

    </div>
    <script type="text/javascript" src="app/js/materialize.min.js"></script>
    <script src="app/js/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.slider');
            var instances = M.Slider.init(elems);
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
            var elems = document.querySelectorAll('.collapsible');
            var instances = M.Collapsible.init(elems);
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });
       
    </script>
</body>
</html>