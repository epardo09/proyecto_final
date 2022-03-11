<?php 
  //para usar las funciones y las sesiones
    include "registro.php";
    include "sesiones.php"; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Pardo</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!--header-->
    <header>
        <!--logo-->
        <h2><a href="index.html">VillaPardo</a></h2>
        <label class="icono" for="click">
          <img src="./img/movil/icono.svg" alt="" width="60%">
          </label>
        <input type="checkbox" id="click">
            <!--nav-->
            <nav id="menu_interior">
              <ul>
              <li><a href="./index.php">Inicio</a></li>
                  <li> <a href="./propiedad.php">Propiedad</a></li>
                  <li><a href="./contacto.php">Contacto</a></li> 
                  <!--boton para volver ha su perfil-->
                  <li><a href="./perfil.php" > <?php sesion_usuario($_SESSION['usuario']);?> </a></li>
                  <!--boton para salir de la sesion-->
                   <li><a class="btn-menu" href="./salida_sesion.php" > Salida de sesion</a></li>
              </ul>
          </nav>
    </header>

    <!--main-->
    <main>
      
        <!--banner inicio-->
        
        <picture>
            <!-- smartphone -->
            <source
              srcset="
              ../img/movil/index.webp 1,
             ../img/movil/index@2x.webp 2x,
             ../img/movil/index@3x.webp 3x 
              "
              media="(min-width:300px) and (max-width:700px) and (orientation: portrait)"
            />
    
            <!-- ipad -->
            <source
              srcset="
              ../img/ipad/index.webp 1,
              ../img/ipad/index@2x.webp 2x
            
              "
              media="(min-width:768px) and (max-width:1024px) and (orientation: portrait)"
            />
    
            <!-- escritorio -->
            <source
              srcset="
              ../img/desktop/index.webp 1,
              ../img/desktop/index@2x.webp 2x
                
              "
              media="(min-width:1200px)"
            />
    
            <!-- Etiqueta img -->
            <img src="" alt="banner" width="100%"/>
          </picture> 
          <!--titulo inicio-->
        <h1>Inicio</h1> 
    </main>
</body>
</html>