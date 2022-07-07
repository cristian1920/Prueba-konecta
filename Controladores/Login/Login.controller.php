<?php

require_once('../../Clases/Login/Class.login.php');

foreach ($_POST as $clave => $valor) {
    $$clave = addslashes(trim($valor));
}

$config = new Login();

switch ($task) {

    case 'Ingresar':

        $Respuesta = $config->Ingresar($usuario, $contrasena);

        break;
}

// $usuario = $_POST['usuario'];
// $contrasena = $_POST['contrasena'];

// echo $usuario;
// echo "<br>";
// echo $contrasena;
