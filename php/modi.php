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
<body class="imagen_fondo">
    
    <!--header-->
    <header>
        <!--logo-->
        <h1><a href="index.html">VillaPardo</a></h1>
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
 <main>
        
       <div class="cuadrado">
      
        <div class="cuadrado-login"> 
            <h2>Antiguos datos:</h2>
            <?php mostrar($_SESSION['usuario']);?>

            <h2>Modificacion de los datos:</h2>
            <form action="./registro_modi.php" method="POST" class="formulario" id="formulario">
              
    
                <!-- Grupo: Nombre -->
                <div class="formulario__grupo" id="grupo__nombre">
                    <label for="nombre" class="formulario__label">Nombre: </label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="nombre" id="nombre" >
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Solo los letras</p>
                </div>
    
                 <!-- Grupo: apellidos -->
                 <div class="formulario__grupo" id="grupo__apellidos">
                    <label for="apellidos" class="formulario__label">Apellidos;</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="apellidos" id="apellidos">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Solo los letras.</p>
                </div>
                
            
                <!-- Grupo: Contraseña -->
                <div class="formulario__grupo" id="grupo__password">
                    <label for="password" class="formulario__label">Contraseña;</label>
                    <div class="formulario__grupo-input">
                        <input type="password" class="formulario__input" name="password" id="password">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
                </div>
    
                <div class="formulario__mensaje" id="formulario__mensaje">
                    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                </div>
    
                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <button type="submit" class="btn-login">Actualizar</button>
                    <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
                </div>
            </form>
         
        </div>  

       </div>
      
    </main>
    <script src="../js/modi.js"></script>
</body>
</html>
