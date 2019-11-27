<?php
    
    //Se inicia la sesion
    session_start();

    //Se llama a la conexion
    include_once '../../administrador/conexion-admin.php';

    //Se captura el registro que se va a eliminar
    $id_eliminar = $_POST['id_turno'];
    $fecha_eliminada = $_POST['fecha_turno'];
    $hora_eliminada = $_POST['hora_turno'];

    //Establecemos una consulta para eliminar los datos del profesional
    $sentencia_eliminar = 'DELETE FROM clinica_medica_turnos WHERE id_turno= :id;';
    $sentencia_eliminando = $conexion_bdd_admin -> prepare($sentencia_eliminar);
    $sentencia_eliminando -> bindParam(':id', $id_eliminar);
    
    if($sentencia_eliminando -> execute()){
        
        echo "Se ha cancelado el turno correctamente <br>".$fecha_eliminada."<br>".$hora_eliminada;
        
        $_SESSION['turno_cancelado'] = $fecha_eliminada." ".$hora_eliminada;
            
        return header ("Location: turnos_cancelados.php");
    
    }
    else{
        return "Error";
    }

?>