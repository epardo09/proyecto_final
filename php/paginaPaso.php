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
                <li><a href=" ../index.html">Inicio</a></li>
                  <li> <a href="../propiedad.html">Propiedad</a></li>
                  <li><a href="../contacto.html">Contacto</a></li> 
                  <!--boton para volver ha su perfil-->
                  <li><a class="btn-menu" href="../login.html" >Login</a></li>
              </ul>
            </nav>
    </header>
    <main>
        
       <div class="cuadrado">
      
        <div class="cuadrado-login">
           
        <?php
        switch ($_GET['error']) {
            case 0:
                echo "Algun campo esta vacio o todos";?>
                <a href="../formulario.html">Volver al registro</a> <?php
                break;
            case 1:
                echo "El correo no es valido";
                ?>
                <a href="../formulario.html">Volver al registro</a> <?php
                break;
            case 2:
                echo "La contraseña no son iguales";
                ?>
                <a href="../formulario.html">Volver al registro</a> <?php
                break;
            case 3:
                echo "Este correo ya esta registrado";
                ?>
                <a href="../formulario.html">Volver al registro</a> <?php
                break;
            case 4:
                echo "Este usuario ya esta cogido";
                ?>
                <a href="../formulario.html">Volver al registro</a> <?php
                break;
            case 5:
                echo "Este usuario no esta registrado";
                ?>
                <a href="../login.html">Volver login</a> <?php
                break;
            case 6:
                echo "Solo puedes meter letras en nombre y apellidos";
                ?>
                <a href="../formulario.html">Volver al registro</a> <?php
                break;
            case 7:
                echo "Solo puedes meter letras en nombre y apellidos";
                ?>
                <a href="./modi.php">Volver a modificar el perfil</a> <?php
                break;
            
            case 10:
                echo "Todo el proceso ha ido correctamente";
                header("refresh:1;url=../login.html");
                break;
            case 11:
                echo "Se ha modificado todo correctamente";
                header("refresh:1;url=./perfil.php");
                break;
            case 12:
                echo "Te has logeado correctamente <br>";
                echo "Entrando";
                header("refresh:1;url=./perfil.php");
                break;
 
        }
        ?>
           
        </div>

       </div> 
      
    </main>
   
    <script src="./js/login.js"></script>
</body>
</html>