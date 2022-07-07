<?php
class Productos
{

    function __construct()
    {
        require_once('../../Clases/Conexion/conexion.php');
        require_once('../../Vistas/sesion.php');
        $conexion = new ConexionMysql();
        $this->conectar = $conexion->conexion();
        return $this->conectar;
    }

    function productos(){
        $sql = "SELECT * FROM productos";
        if ($sentencia = $this->conectar->query($sql)) {
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Falló en la consulta";
            exit();
        }
        
        

    }

    function Insertar($Nombre,$Referencia,$Precio,$Peso,$Categoria,$Stock){
        // utf8_encode(utf8_decode($pregunta));
        $Date = date("Y-m-d");
        $query = $this->conectar->prepare('INSERT INTO productos (Nombreproducto,Referencia,Precio,Peso,Categoria,Stock,Fechacreacion) 
        VALUES(:Nombreproducto,:Referencia,:Precio,:Peso,:Categoria,:Stock,:Fechacreacion)');
        $query->execute([
        "Nombreproducto" => $Nombre, "Referencia" => $Referencia, "Precio" => $Precio, "Peso" => $Peso, "Categoria" => $Categoria,
        "Stock" => $Stock,"Fechacreacion"=>$Date
        ]);
        if ($query) {
        return 1;
        } else {
        return 0;
        }
        

    }

    function Individual($ID)
    {
        $sql = "SELECT * FROM productos where ID = $ID";
        if ($sentencia = $this->conectar->query($sql)) {
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Falló en la consulta";
            exit();
        }
    }

    function EditarInformacion($Enombre, $EReferencia, $EPrecio, $EPeso,$ECategoria, $EStock,$EID)
    {

        $sql = ("UPDATE productos SET Nombreproducto='$Enombre',Referencia='$EReferencia',Precio=$EPrecio,Peso=$EPeso,Categoria='$ECategoria',Stock=$EStock WHERE ID=$EID");
        $query = $this->conectar->prepare($sql);
        $query->execute();
        if ($query) {
            return 1;
        } else {
            echo "Hubo problemas con la actualizacion";
        }
    }


    function Eliminar($id)
    {

        $sql = ("DELETE FROM  productos WHERE ID=$id");
        $query = $this->conectar->prepare($sql);
        $query->execute();
        if ($query) {
            return 1;
        } else {
            echo "Hubo problemas con la actualizacion";
        }
    }

}
?>