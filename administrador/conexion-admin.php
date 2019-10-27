
<?php

    //1_ Se crea una variable que tendra los datos de la conexion del administrador
    $datos_conexion = 'mysql:host=localhost;dbname=clinica_dgs';

    //2_ Se crea una variable para el usuario y la contraseña del administrador
    $usuario = 'root';
    $contrasena = '';
    
    //Tambien podemos tener la tabla de administrador en una variable
    $tabla_administrador = "administrador";

    //3_ Se usan los metodos de PDO try y catch, los cuales cumplen la funcion de se ser condicionales, para la conexion correcta, y la conexion con errores 
    
    try{

    //4_ Creamos la conexion a la base de datos utilizando PDO
    //5_ Se establece una verificacion de datos del servidor y del usuario para realizar conexion
    $conexion_bdd_admin = new PDO ($datos_conexion, $usuario, $contrasena);
        
        //Se muestra una alerta con codigo js para mostrar un mensaje de conexion correcta con la base de datos
        /*echo "<script>
                alert('La conexion a la base de datos de la clinica con el administrador, se realizo con exito');
            </script>";*/
        
    }
    catch (PDOExeption $e){
        print "¡Error!: " . $e->getMessage() . "<br>";
        die();
    }

?>