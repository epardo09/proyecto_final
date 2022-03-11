<?php
    //para usar las funciones   
    include 'funciones.php';

    //coger todos los datos por post
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //asignar los valores por una variable
        $usuario=$_POST['usuario'];
        $contra=$_POST['password'];

        //funcion
        login($usuario,$contra);
    }
?>