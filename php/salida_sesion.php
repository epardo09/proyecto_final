<?php
//abrir sesion
session_start();
//destruir
session_destroy();
//volvemos al inicio
header("Location: ../index.html");
?>