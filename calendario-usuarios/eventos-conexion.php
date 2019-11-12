<?php 

    //Se establece el formato JSON
    header('Content-Type: application/json');
    
    $conexion_eventos = new PDO("mysql:dbname=clinica_dgs; host=localhost","root","");
    
    //Se establece una sentencia o query para seleccionar los eventos del calendario
    $sentencia_eventos = $conexion_eventos->prepare("SELECT * FROM eventos_turnos");
    $sentencia_eventos->execute();

    $resultado_eventos = $sentencia_eventos->fetchAll(PDO::FETCH_ASSOC);
    
    //Se convierten los resultados a formato JSON
    echo json_encode($resultado_eventos);

?>