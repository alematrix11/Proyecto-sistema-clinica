<?php
    
    //Se inicia la sesion
    session_start();

    //Se llama a la conexion
    include_once '../administrador/conexion-admin.php';
    
    //Se capturan con el metodo POST y se guardan en una variable todos los datos enviados desde el formulario que hay en el modal para editar datos de profesionales
    $id_modificar = $_POST['idP'];
    $nombre_modificar = $_POST['nombreP'];
    $apellido_modificar = $_POST['apellidoP'];
    $especialidad_modificar = $_POST['especialidadP'];
    $dni_modificar = $_POST['DNIP'];
    $telefono_modificar = $_POST['telefonoP'];
    $email_modificar = $_POST['emailP'];
    $matricula_modificar = $_POST['matriculaP'];
    
    /*var_dump($id_modificar);
    var_dump($nombre_modificar);
    var_dump($apellido_modificar);
    var_dump($especialidad_modificar);
    var_dump($dni_modificar);
    var_dump($telefono_modificar);
    var_dump($email_modificar);
    var_dump($matricula_modificar);*/

    
    $sentencia_actualizacion = 'UPDATE profesionales SET nombre_p = ?, apellido_p = ?, especialidad_p = ?, dni_p = ?, telefono_p = ?, email_p = ?, matricula_p = ? WHERE id_profesional = ?';
    $sentencia_actualizando = $conexion_bdd_admin->prepare($sentencia_actualizacion);
    $sentencia_actualizando -> execute(array($nombre_modificar,$apellido_modificar,$especialidad_modificar,$dni_modificar,$telefono_modificar,$email_modificar,$matricula_modificar,$id_modificar));
    
    if($sentencia_actualizando){
        
        
        $sql_consulta_nombre = 'SELECT * FROM profesionales WHERE nombre_p = ?';
        $consulta_nombre = $conexion_bdd_admin -> prepare($sql_consulta_nombre);
        $consulta_nombre -> execute(array($nombre_modificar));
        $resultado_verificacion_nombre = $consulta_nombre->fetch();
        
        
        $nombre_editado = $resultado_verificacion_nombre['nombre_p'];
        
        $_SESSION['admin'] = $nombre_editado;
        
        header("location: profesional_modificado.php");
    
    }
    
    
    
    
    /*//Se establece una sentencia para igualar los datos capturados con los que tenemos en la base de datos
    $sentencia_actualizacion = $conexion_bdd -> prepare("UPDATE profesionales SET nombre_p = nombre_m, apellido_p = :apellido_m, especialidad_p = :especialidad_m, dni_p = :dni_m, telefono_p = :telefono_m, email_p = :email_m, matricula_p = :matricula_m WHERE id_profesional = :id_m;");
    
    var_dump ($sentencia_actualizacion);

    //Se usa el metodo bindParam para relacionar los nuevo datos para que luego se actualizen
    $sentencia_actualizacion->bindParam(':id_m', $id_modificar);
    $sentencia_actualizacion->bindParam(':nombre_m', $nombre_modificar); 
    $sentencia_actualizacion->bindParam(':apellido_m', $apellido_modificar); 
    $sentencia_actualizacion->bindParam(':especialidad_m', $especialidad_modificar); 
    $sentencia_actualizacion->bindParam(':dni_m', $especialidad_modificar); 
    $sentencia_actualizacion->bindParam(':telefono_m', $especialidad_modificar); 
    $sentencia_actualizacion->bindParam(':email_m', $email_modificar); 
    $sentencia_actualizacion->bindParam(':matricula_m', $matricula_modificar);

    if($sentencia_actualizacion->execute()){
        
        return header("location:profesional_actualizado.php");
    
    }
    
    else{
        
        return "error";
        
    }*/
    
    
    
    
    /*//Guardamos la conexion en una funcion
    $conexion_bdd_admin = conexion();
    
    //Capturamos el id con el metodo POST
    $id = $conexion_bdd_admin -> real_escape_string(htmlentities($_POST['id'])); 
    
    
    //Se establece una sentencia para selecionar todos los datos de los profesionales
    $sentencia_actualizacion = "SELECT 'id_profesional', 'nombre_p', 'apellido_p', 'especialidad_p', 'dni_p', telefono_p', 'email_p', matricula_p FROM profesionales WHERE id=?";
    $sentencia_actualizando = $conexion_bdd_admin -> prepare($sentencia_actualizacion);
    $sentencia_actualizando -> bind_param('i', $id);
    $sentencia_actualizando -> execute();
    
    $datos_actualizados = $sentencia_actualizando -> get_result() ->fetch_assoc();

    echo json_encode($datos_actualizados);*/
    
    
    //Guardamos en una variable el identificador del profesional que fue enviado por metodo GET
   /* $sentencia_actualizacion = consultarProfesional($_GET['id_profesional']);

    function consultarProfesional($numero_profesional){
        
        $sentencia_actualizacion_datos = "SELECT * FROM profesionales WHERE  id_profesional='".$numero_profesional."' ";
        $resultados_profesionales = $conexion_bdd_admin->query($seleccionar_profesionales);
        $filas_profesionales = $resultados_profesionales->fetch(PDO::FETCH_ASSOC);
        
        //Establecemos que retorne los datos que necesitamos modificar
                                                                
        return[
            $filas['id_profesional'],
            $filas['nombre_p'],
            $filas['apellido_p'],
            $filas['especialidad_p'],
            $filas['dni_p'],
            $filas['telefono_p'],
            $filas['email_p'],
            $filas['matricula_p'],
        ];
    }*/

?>
