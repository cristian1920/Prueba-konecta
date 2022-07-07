<?php

include("../../Clases/Productos/Class.Productos.php");

foreach ($_POST as $clave => $valor) {
    $$clave = addslashes(trim($valor));
}

$config = new Productos();
$productos = $config->productos();


if (!isset($task)) {
    $task = "";
} else {
    $task = $task;
}
switch ($task) {

    case 'registrar':      
        try{
            $Respuesta = $config->Insertar($Nombre,$Referencia,$Precio,$Peso,$Categoria,$Stock);
            // header("location: ../../Vistas/BancoPreguntas/Preguntas.php");
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
        break;

    
    case 'ConsultaIndividual':
        // echo $idRegistro;
        $Respuesta = $config->Individual($ID);
        if ($Respuesta > 0) {
            echo json_encode($Respuesta);
        } else {
            echo "No se encontro registros";
        }
        break;
        
    case 'EditarInformacion':
        $Respuesta = $config->EditarInformacion($Enombre, $EReferencia, $EPrecio, $EPeso,$ECategoria, $EStock,$EID);
        if ($Respuesta > 0) {
            echo json_encode($Respuesta);
        } else {
            echo "No se encontro registros";
        }
        break;
    case 'Eliminar':
        $Respuesta = $config->Eliminar($id);
        if ($Respuesta > 0) {
            echo json_encode($Respuesta);
        } else {
            echo "No se encontro registros";
        }
        break;
   
   
    }


