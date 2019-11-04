<?php

    //1_ Se crea una variable que tendra los datos de la conexion
    $datos_conexion = 'mysql:host=localhost;dbname=clinica_dgs';

    //2_ Se crea una variable para el usuario y la contraseña
    $usuario = 'root';
    $contrasena = '';
    
    //Tambien podemos tener la tabla de registro en una variable
    $tabla_registro = "registro_pacientes";

    //3_ Se usan los metodos de PDO try y catch, los cuales cumplen la funcion de se ser condicionales, para la conexion correcta, y la conexion con errores 
    
    try{

    //4_ Creamos la conexion a la base de datos utilizando PDO
    //5_ Se establece una verificacion de datos del servidor y del usuario para realizar conexion
    $conexion_bdd = new PDO ($datos_conexion, $usuario, $contrasena);
        
        //Se muestra una alerta con codigo js para mostrar un mensaje de conexion correcta con la base de datos
        /*echo "<script>
                alert('La conexion a la base de datos de la clinica se realizo exitosamente');
            </script>";*/
        
        //echo 'La conexion a la base de datos de la clinica se realizo exitosamente';
        
    }
    catch (PDOExeption $e){
        print "¡Error!: " . $e->getMessage() . "<br>";
        die();
    }
