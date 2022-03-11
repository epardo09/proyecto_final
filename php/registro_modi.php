<?php
//para usar las funciones y las sesiones
include 'funciones.php';
include "sesiones.php"; 

    //coger valores por el metodo post
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //los valores
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];

        $contra=$_POST['password'];

        //la funcion de modificar
        modificacion($nombre,$apellidos,$contra,$_SESSION['usuario']);
    }
?>