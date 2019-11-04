<?php
    

    //Se llama a la conexion
    include_once '../administrador/conexion-admin.php';
    
    //Guardamos la conexion en una funcion
    $conexion_bdd_admin = conexion();
    
    //Capturamos el id con el metodo POST
    $id = $conexion_bdd_admin -> real_escape_string(htmlentities($_POST['id'])); 
    
    
    //Se establece una sentencia para selecionar todos los datos de los profesionales
    $sentencia_actualizacion = "SELECT 'id_profesional', 'nombre_p', 'apellido_p', 'especialidad_p', 'dni_p', telefono_p', 'email_p', matricula_p FROM profesionales WHERE id=?";
    $sentencia_actualizando = $conexion_bdd_admin -> prepare($sentencia_actualizacion);
    $sentencia_actualizando -> bind_param('i', $id);
    $sentencia_actualizando -> execute();
    
    $datos_actualizados = $sentencia_actualizando -> get_result() ->fetch_assoc();

    echo json_encode($datos_actualizados);
    
    
    
    
    





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
