<?php
session_start();
if($_SESSION['idusuario']){
    $idUsuarios=$_SESSION['idusuario'];
    $NombreUsuario = $_SESSION['nombre'];
    $Usuario = $_SESSION['usuario'];
}else {
    header("location: ../../Vistas/Login/cerrar.php");
}
