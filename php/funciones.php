<?php
//para la conexion
include 'conexion.php';

//funcion de registro
function registro($usuario,$nombre,$apellidos,$correo,$contra,$contra2){
    //conexion
    $pdo = new Conexion();

    //validacion que no esten vacios los campos
    if (empty($usuario)|| empty($nombre) || empty($apellidos) || empty($correo) || empty($contra) || empty($contra2)) {//si estan vacias
        
        header("Location: ./paginaPaso.php?error=0");
        exit;

    }else{//si no esta vacion

        //hacemos la validacion del correo que este bien
        if (filter_var($correo, FILTER_VALIDATE_EMAIL) === false) {
            header("Location: ./paginaPaso.php?error=1");
           exit;

        }else{//si esta bien haremos el siguiente poso
           
            //validacion de la contraseña
            if (strcmp($contra, $contra2) !== 0) {//contraseña
                header("Location: ./paginaPaso.php?error=2");
                exit;
            }else{
               
            }
         
    }   

    //sentencia mysql select para el correo
    $sql =("SELECT * FROM usuarios WHERE Email=:correo");
    $stmt = $pdo -> prepare($sql);
    $stmt -> bindValue(':correo' ,$correo);

    //ejecutamos el codigo
    $stmt->execute();

    //lo guardamos aqui
    $row=$stmt->rowCount();
    
    if($row){//si el correo esta creado
     
        header("Location: ./paginaPaso.php?error=3");
        exit;
    }else{//si el no correo esta creado

        //setencia select para el usaurio
        $sql =("SELECT * FROM usuarios WHERE  Usuario=:usuario");
        $stmt = $pdo -> prepare($sql);
        $stmt -> bindValue(':usuario' ,$usuario);
         //ejecutamos el codigo
        $stmt->execute();

         //lo guardamos aqui
        $row=$stmt->rowCount();

        if($row){//si el usuario esta creado
            header("Location: ./paginaPaso.php?error=4");
     
        }else{//si no esta esta creado

                 //setencia insert para todos los campos
                $sql = "INSERT INTO usuarios (Usuario, Nombre, Apellidos, Email, Contra) VALUES (:usuario, :nombre, :apellidos, :correo, :contra)";
                $stmt = $pdo->prepare($sql);
                //pasamos valores
                $stmt->bindValue(':usuario' ,$usuario);
                $stmt->bindValue(':nombre' ,$nombre);
                $stmt->bindValue(':apellidos' ,$apellidos);
                $stmt->bindValue(':correo' ,$correo);
                $stmt->bindValue(':contra' ,$contra);
                //ejecutamos todo el codigo
                $stmt->execute();
        
        
                   
               
        }
     
    }
}
//y nos llevara directamente a login

header("Location: ./paginaPaso.php?error=10");
}

//funcion de modificacion
function modificacion($nombre,$apellidos,$contra,$sesion){

    //la conexion
    $pdo = new Conexion();

    if (empty($nombre)) {//si estan vacias nombre

        if (empty($apellidos)) {//si estan vacias apellidos

            if (empty($contra)) {//si estan vaciasla contraseña

            }else{//si no esta vacia el contraseña

                //setencia update para la contraseña
                $sql = "UPDATE usuarios SET Contra=:contra WHERE Usuario=:sesion";
                $stmt = $pdo->prepare($sql);
             
                $stmt->bindValue(':sesion' ,$sesion);
                $stmt->bindValue(':contra' ,$contra);
                //ejecutamos 
                $stmt->execute();
                
                header("Location: ./paginaPaso.php?error=11");
            }
        }else{//si no esta vacia apellidos

                //setencia para apellidos
                $sql = "UPDATE usuarios SET Apellidos=:apellidos WHERE Usuario=:sesion ";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':sesion' ,$sesion);
                $stmt->bindValue(':apellidos' ,$apellidos);

                //ejecutamos codigo
                $stmt->execute();
                header("Location: ./paginaPaso.php?error=11");

            if (empty($contra)) {//si estan vacias contraseña

            }else{//si no esta vacia contraseña

                //update para contraseña
                $sql = "UPDATE usuarios SET Contra=:contra WHERE Usuario=:sesion";
                $stmt = $pdo->prepare($sql);
             
                $stmt->bindValue(':sesion' ,$sesion);
                $stmt->bindValue(':contra' ,$contra);

                //ejecutamos
                $stmt->execute();
                header("Location: ./paginaPaso.php?error=11");
            }
        }      
       
    }else{//si no esta vacio

        //update para nombre
        $sql = "UPDATE usuarios SET Nombre=:nombre WHERE Usuario=:sesion ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':sesion' ,$sesion);
        $stmt->bindValue(':nombre' ,$nombre);

        //ejecutamos codigo
        $stmt->execute();
        echo "<br>Se ha modficado tu nombre";
        if (empty($apellidos)) {//si estan vacias apellidos
            if (empty($contra)) {//si estan vacias contraseña

            }else{//si contraseña no esta vacia

                //update para contraseña
                $sql = "UPDATE usuarios SET Contra=:contra WHERE Usuario=:sesion";
                $stmt = $pdo->prepare($sql);
             
                $stmt->bindValue(':sesion' ,$sesion);
                $stmt->bindValue(':contra' ,$contra);

                //ejecutamos codigo
                $stmt->execute();
                echo "<br> Se ha modificado tu contraseña";
            }
        }else{//si no esta vacia apellidos

            //update apellidos
            $sql = "UPDATE usuarios SET Apellidos=:apellidos WHERE Usuario=:sesion ";
            $stmt = $pdo->prepare($sql);
                 $stmt->bindValue(':sesion' ,$sesion);
            $stmt->bindValue(':apellidos' ,$apellidos);

            //ejecutamos codigo
            $stmt->execute();
            echo "<br> Se ha modficado tu apellido";
            
            if (empty($contra)) {//si estan vacias

        }else{//si no esta vacia contraseña

            //update contra
            $sql = "UPDATE usuarios SET Contra=:contra WHERE Usuario=:sesion";
            $stmt = $pdo->prepare($sql);
         
            $stmt->bindValue(':sesion' ,$sesion);
            $stmt->bindValue(':contra' ,$contra);

            //ejecutamos codigo
            $stmt->execute();
            echo "<br> Se ha modificado tu contraseña";
            
        }

        }
     
    }
    //nos llevara directamente a perfil
    header("Location: ./paginaPaso.php?error=11");
}



    
   
//funcion login
function login($usuario,$contra){

    //conexion
    $pdo = new Conexion();
    //select para el login
    $sql =("SELECT * FROM usuarios WHERE Usuario=:usuario AND Contra=:contra");
        $stmt = $pdo -> prepare($sql);
        //datos
        $stmt -> bindValue(':usuario' ,$usuario);
        $stmt -> bindValue(':contra' ,$contra);

        //executar el codigo
        $stmt->execute();

 
        //para ver lo que hay dentro
       $row=$stmt->rowCount();
    
        if($row){//si esta registrado

            //abrimos sesion
            session_start();
            $_SESSION['usuario']= $usuario;
            
            //lo llevamos al perfil que es la sona vip
            header("Location: ./paginaPaso.php?error=12");

        }else{//si no esta registrado el usuario

            header("Location: ./paginaPaso.php?error=5");
           
        }

}
//funcion mostar
function mostrar($usuario){

     //conexion
    $pdo = new Conexion();
    
    //setencia sql ver la tabla premios
    $sql =("SELECT * FROM usuarios where Usuario=:usuario");
    
    $stmt = $pdo -> prepare($sql);
    $stmt -> bindValue(':usuario' ,$usuario);

    //ejecutamos
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Mostramos resultados directamente

    $resultado = $stmt->fetchAll();
   
    //todos los datos que se ha guardado en la bd
    foreach ($resultado as $row) {

        echo " <br><b>". " Nombre de usuario: ". $row["Usuario"]."<br>" . "Nombre: " . $row["Nombre"] .  "<br> "."Apellidos: " . $row["Apellidos"]."<br> "."Correo: ".$row["Email"]."<br> "."Contraseña: ".$row["Contra"]."</b><br>";
     
    } 
 
}

//funcion sesion usario
function sesion_usuario($usuario){

    //conexion
    $pdo = new Conexion();

    //select 
    $sql =("SELECT * FROM usuarios where Usuario=:usuario");
    
    $stmt = $pdo -> prepare($sql);
    $stmt -> bindValue(':usuario' ,$usuario);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    // Mostramos resultados directamente

    $resultado = $stmt->fetchAll();
    
    //para el boton de perfil pondra nuestro usuario
    foreach ($resultado as $row) {

        echo  $row["Usuario"];
       
    } 
    
}


?>
