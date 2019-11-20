<?php

session_start();

include_once '../../conexion.php';
    
    $id_profesional_turno = 2;
    $id_paciente_turno = $_POST['id-usuario'];
    $fecha_turno = $_POST['fecha-turno'];
    $hora_turno = $_POST['hora-turno'];
    
    var_dump($id_profesional_turno);
    var_dump($id_paciente_turno);
    var_dump($fecha_turno);
    var_dump($hora_turno);
    

    //Se realiza la verificacion que el paciente no saque un turno repetido en el mismo horario

    $verificacion_hora = 'SELECT * FROM cardiologia_turnos WHERE hora = ?';
    $verificando_hora = $conexion_bdd -> prepare ($verificacion_hora);
    $verificando_hora -> execute(array($hora_turno));
    $resultado_verificacion_hora = $verificando_hora -> fetch();

    $verificacion_fecha = 'SELECT * FROM cardiologia_turnos WHERE fecha = ?';
    $verificando_fecha = $conexion_bdd -> prepare ($verificacion_fecha);
    $verificando_fecha -> execute(array($fecha_turno));
    $resultado_verificacion_fecha = $verificando_fecha -> fetch();

        if(($resultado_verificacion_hora) && ($resultado_verificacion_fecha)){

        echo 'Ya existe un turno en el la fecha y hora agregada';
        
        //Se finaliza el procedimiento
        die();
        
    }

    
    //Se realiza la verificacion que el paciente no saque mas de un turno para el mismo profesional el mismo dia

    $verificacion_id = 'SELECT * FROM cardiologia_turnos WHERE id_paciente = ?';
    $verificando_id = $conexion_bdd -> prepare ($verificacion_id);
    $verificando_id -> execute(array($id_paciente_turno));
    $resultado_verificacion_id = $verificando_id -> fetch();

    $verificacion_fecha = 'SELECT * FROM cardiologia_turnos WHERE fecha = ?';
    $verificando_fecha = $conexion_bdd -> prepare ($verificacion_fecha);
    $verificando_fecha -> execute(array($fecha_turno));
    $resultado_verificacion_fecha = $verificando_fecha -> fetch();
    
    if(($resultado_verificacion_id) && ($resultado_verificacion_fecha)){

        echo 'Ya existe un turno para el paciente con el profesional de la especialidad de cardiologia y la fecha agregada';
        
        //Se finaliza el procedimiento
        die();

    }


        //Creamos una query para agregar los datos de cada profesional a la base de datos
        //A la consulta de se le pasan los nombres de las columnas de la base de datos

        $agregar_turno = 'INSERT INTO cardiologia_turnos (id_profesional, id_paciente, fecha, hora) VALUES (?,?,?,?)';
        $agregando_turno = $conexion_bdd -> prepare($agregar_turno);
        if($agregando_turno -> execute(array($id_profesional_turno, $id_paciente_turno, $fecha_turno, $hora_turno)) ){

            echo 'Se agrego el turno con exito';

            //header("location: turnos_confirmados.php");

        }
        else{
            
            $conexion_bdd = null;
            $agregar_turno = null;
            
            echo 'Error, no se logro agregar el turno con exito, es posible que el id agregado del usuario no se encuentre en el sistema';            

            //header("location: profesionales_no_validos.php");

        }

        $conexion_bdd = null;
        $agregar_turno = null;

?>