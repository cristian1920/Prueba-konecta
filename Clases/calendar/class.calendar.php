<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=pruebaphp;host=localhost","root","");

$query=$pdo->prepare("SELECT COUNT(*) as total,Fechacreacion FROM productos GROUP by Fechacreacion;");
$query->execute();
$resultado=$query->fetchAll(PDO::FETCH_ASSOC);
$eventos = array();    

foreach($resultado as $resultado){
    $title = $resultado['total'];
    $start = $resultado['Fechacreacion'];
    $end = $resultado['Fechacreacion'];
    $clase = "reserva-realizadas";
    
    $eventos[] = array('title' => $title.' Ventas', 'start' => $start, 'end' => $end, 'className' => $clase);
}
    
$arrayJson = json_encode($eventos, JSON_UNESCAPED_UNICODE);
print_r($arrayJson);

?>


  