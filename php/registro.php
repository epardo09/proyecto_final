<?php
//para usar funciones 
include 'funciones.php';

//los cogemos todo por el memtodo post
if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //todos los valores del campo
        $usuario=$_POST['usuario'];
        $nombre=$_POST['nombre'];
        $apellidos=$_POST['apellidos'];
        $correo=$_POST['correo'];
        $contra=$_POST['password'];
        $contra2=$_POST['password2'];

        //la funcion de registar
        registro($usuario,$nombre,$apellidos,$correo,$contra,$contra2);
    }
?>