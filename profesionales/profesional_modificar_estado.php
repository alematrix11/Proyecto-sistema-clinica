<?php
    
    //Se inicia la sesion
    session_start();

    //Se llama a la conexion
    include_once '../administrador/conexion-admin.php';
    
    //Se capturan con el metodo POST y se guardan en una variable todos los datos enviados desde el formulario que hay en el modal para editar datos de profesionales
    $id_modificar = $_POST['idP'];
    $nombre_modificar = $_POST['nombreP'];
    $estado_modificar = $_POST['estadoP'];
    
    var_dump($id_modificar);
    var_dump($nombre_modificar);
    var_dump($estado_modificar);

    
    $sentencia_actualizacion = 'UPDATE profesionales_estado SET estado = ? WHERE id = ?';
    $sentencia_actualizando = $conexion_bdd_admin->prepare($sentencia_actualizacion);
    $sentencia_actualizando -> execute(array($estado_modificar,$id_modificar));
    
    
    if($sentencia_actualizando){
        
        $sql_consulta_nombre = 'SELECT * FROM profesionales WHERE nombre_p = ?';
        $consulta_nombre = $conexion_bdd_admin -> prepare($sql_consulta_nombre);
        $consulta_nombre -> execute(array($nombre_modificar));
        $resultado_verificacion_nombre = $consulta_nombre->fetch();
        
        
        $nombre_editado = $resultado_verificacion_nombre['nombre_p'];
        
        $_SESSION['admin'] = $nombre_editado;
        
        header("location: profesional_modificado.php");
        
    }

?>