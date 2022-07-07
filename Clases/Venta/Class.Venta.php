<?php
class Reserva
{

    function __construct()
    {
        require_once('../../Clases/Conexion/conexion.php');
        require_once('../../Vistas/sesion.php');
        $conexion = new ConexionMysql();
        $this->conectar = $conexion->conexion();
        return $this->conectar;
    }



    function historico(){
        $sql = "SELECT C.idcompra,P.Nombreproducto,P.Referencia,P.Precio,P.Peso,P.Categoria,P.Stock,C.cantidad,P.Fechacreacion from productos P inner join compra C on P.ID = C.idproducto;";
        if ($sentencia = $this->conectar->query($sql)) {
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Falló en la consulta historico";
            exit();
        }
    }

    function ValoresOption(){
        $sql = "SELECT Nombreproducto, ID from productos  ORDER BY ID ASC;";
        if ($sentencia = $this->conectar->query($sql)) {
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Falló en la consulta valores1";
            exit();
        }
    }

    function mayorstock(){
        $sql2 = "SELECT Nombreproducto, SUM(Stock) AS Stock FROM Productos GROUP BY Nombreproducto ORDER BY Stock DESC LIMIT 1;";
        $sentencia2 = $this->conectar->query($sql2);
        $sentencia3=$sentencia2->fetchAll(PDO::FETCH_OBJ);
        // $sentencia3[0]->Nombreproducto;
        return $sentencia3;
      
    }


    function masvendido(){
        $sql2 = "SELECT COUNT(C.cantidad) AS mayor, P.Nombreproducto FROM compra C INNER JOIN productos P WHERE C.idproducto=P.ID";
        $sentencia2 = $this->conectar->query($sql2);
        $sentencia3=$sentencia2->fetchAll(PDO::FETCH_OBJ);
        // $sentencia3[0]->Nombreproducto;
        return $sentencia3;
      
    }

    function Venta($idproducto, $cantidad){
        // utf8_encode(utf8_decode($pregunta));
        $Date = date("Y-m-d");
        $sql1 = "SELECT Stock from productos where ID=$idproducto";
        $sentencia = $this->conectar->query($sql1);
        $sentencia12 = $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        if($sentencia12[0]->Stock > 0 && $cantidad<=$sentencia12[0]->Stock){
            $query = $this->conectar->prepare('INSERT INTO compra (idproducto,cantidad,fechacompra) 
            VALUES(:idproducto,:cantidad,:fechacompra)');
            $query->execute([
            "idproducto" => $idproducto, "cantidad" => $cantidad, "fechacompra" => $Date
            ]);

            $sql = ("UPDATE productos SET stock = (select (stock - $cantidad) as Resta from productos) WHERE ID=$idproducto;");
            $query2 = $this->conectar->prepare($sql);
            $query2->execute();
            if ($query2) {
                return 1;
            } else {
                echo "Hubo problemas con la actualizacion";
            }
        }else {
            $sinstock='sinstock';
            echo $sinstock;
        }

            
            
            return $sentencia;
        // }

  
    }



    function callendar(){
        $sql = ("SELECT COUNT(*) as total,Fechacreacion FROM productos GROUP by Fechacreacion;");
        if ($sentencia = $this->conectar->query($sql)) {
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Falló en la consulta Calendar";
            exit();
        }
    }
}