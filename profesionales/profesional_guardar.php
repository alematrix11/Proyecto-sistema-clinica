<?php

    session_start();

    include_once '../conexion.php';

    $nombre_profe = $_POST['nombre_profesional'];
    $apellido_profe = $_POST['apellido_profesional'];
    $especialidad_profe = $_POST['especialidad_profesional'];
    $dni_profe = $_POST['dni_profesional'];
    $telefono_profe = $_POST['telefono_profesional'];
    $email_profe = $_POST['email_profesional'];
    $matricula_profe = $_POST['matricula_profesional'];

    //Realizamos una verificacion para que no se cargue un mismo profesional repetido, para eso usamos obtenemos el email del profesional de la base de datos
    //Esta verificacion se hace para evitar problema si continua ingresando mucho personal a trabajar a la clinica

    $verficacion_profesional = 'SELECT * FROM profesionales WHERE matricula_P = ?';
    $verificando_profesional = $conexion_bdd -> prepare ($verificacion_profesional);
    $verificando_profesional -> execute(array($matricula_profe));
    $resultado_verificacion_profesional = $verificando_profesional -> fetch();

    /*echo '<pre>';
    var_dump($resultado_verificacion_profesional['nombre_p']);
    echo '</pre>';*/


    //Se estable un condicional para crear mensajes si es verdadero o falso
    if($resultado_verificacion_profesional){

        echo 'El profesional ya se encuentra en el sistema, es posible que en el sistema ya se encuentro un profesional con ese numero de matricula';

        //Se finaliza el procedimiento
        die();

    }

        //Creamos una query para agregar los datos de cada profesional a la base de datos
        //A la consulta de se le pasan los nombres de las columnas de la base de datos

        $agregar_profesional = 'INSERT INTO profesionales (nombre_p, apellido_p, id_especialidad, dni_p, telefono_p, email_p, matricula_p) VALUES (?,?,?,?,?,?,?)';
        $agregando_profesional = $conexion_bdd -> prepare($agregar_profesional);
        if($agregando_profesional -> execute(array($nombre_profe, $apellido_profe, $especialidad_profe, $dni_profe, $telefono_profe, $email_profe, $matricula_profe)) ){

            //echo 'Se agrego el profesional con exito';

            $_SESSION['admin'] = $nombre_profe.' '.$apellido_profe;

            header("location: profesionales_validos.php");

        }
        else{

            $conexion_bdd = null;
            $agregar_profesional = null;

            header("location: profesionales_no_validos.php");

        }

        //Se vacia la variable que agrega profesionales y se vacia la conexion, para evitar problemas cuando se tiene que seguir agregando nuevos profesionales
        $conexion_bdd = null;
        $agregar_profesional = null;
