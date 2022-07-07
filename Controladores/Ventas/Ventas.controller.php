<?php

include("../../Clases/Venta/Class.Venta.php");

foreach ($_POST as $clave => $valor) {
    $$clave = addslashes(trim($valor));
}

$config = new Reserva();
$historico = $config->historico();
$mayorstock=$config->mayorstock();
$masvendido=$config->masvendido();

if (!isset($task)) {
    $task = "";
} else {
    $task = $task;
}
switch ($task) {

    case 'ventas':      
        try{
            $Respuesta = $config->Venta($idproducto, $cantidad);
            // header("location: ../../Vistas/BancoPreguntas/Preguntas.php");
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
        break;
    }