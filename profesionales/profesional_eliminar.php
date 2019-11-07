<?php
    
    //Se inicia la sesion
    session_start();

    //Se llama a la conexion
    include_once '../administrador/conexion-admin.php';

    //Se captura el registro que se va a eliminar
    $id_eliminar = $_POST['idP'];
    $nombre_eliminar = $_POST['nombreP'];

    //Establecemos una consulta para eliminar los datos del profesional
    $sentencia_eliminar = 'DELETE FROM profesionales WHERE id_profesional= :id;';
    $sentencia_eliminando = $conexion_bdd_admin -> prepare($sentencia_eliminar);
    $sentencia_eliminando -> bindParam(':id', $id_eliminar);
    
    if($sentencia_eliminando -> execute()){
        
        $nombre_eliminado = $nombre_eliminar;
        
        $_SESSION['admin'] = $nombre_eliminado;
        
        return header ("Location: profesional_eliminado.php");
    
    }
    else{
        return "Error";
    }

?>