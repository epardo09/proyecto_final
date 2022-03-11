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
        <picture>
            <!-- smartphone -->
            <source
              srcset="
             ../img/movil/contacto.webp 1,
             ../img/movil/contacto@2x.webp 2x,
             ../img/movil/contacto@3x.webp 3x 
              "
              media="(min-width:300px) and (max-width:450px) and (orientation: portrait)"
            />
    
            <!-- ipad -->
            <source
              srcset="
              ../img/ipad/contacto.webp 1,
              ../img/ipad/contacto@2x.webp 2x
            
              "
              media="(min-width:768px) and (max-width:1024px) and (orientation: portrait)"
            />
    
            <!-- escritorio -->
            <source
              srcset="
              ../img/desktop/contacto.webp 1,
              ../img/desktop/contacto@2x.webp 2x
                
              "
              media="(min-width:1200px)"
            />
    
    
            <!-- Etiqueta img -->
            <img src="" alt="banner" width="100%"/>
          </picture> 
          <!--titulo inicio-->
        <h1>Contacto</h1> 
    </main>
   

   
</body>
</html>