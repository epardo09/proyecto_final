<?php
//abrir sesion
session_start();
//comprovamos si esta abierta o no
if (empty($_SESSION["usuario"])) {
 
    header("Location: ../../index.html");
    exit();
}
?>