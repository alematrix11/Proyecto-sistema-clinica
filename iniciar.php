<?php
    
    //7_ Se inicia la sesion, lo cual se debe realizar en los archivos php
    session_start();

    //8_ Se crea una variable para los nombres de los usuarios registrados en la base de datos
    $usuario_paciente = 'paciente_registrado'; 
    
    //9_ Se crea la sesion que sera para los pacientes
    $_SESSION ['usuario'] = $usuario_paciente;
    
    //Se comprueba que sea verdadera la sesion
    if (isset($_SESSION ['usuario'])){
        //echo 'La sesion del paciente ha sido iniciada';
        header("location:index.php");
    }
    
    var_dump($_SESSION ['usuario']);
    
?>