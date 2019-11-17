<?php 
    
    //28_ Como estamos trabajando con sesiones, se usa la funcion de iniciar sesion
    session_start();

    include_once 'conexion.php';

    //24_ Se captura los datos del usuario del login
    $usuarioLogin = $_POST['usuario_paciente'];
    $contrasenaLogin = $_POST['contrasena_paciente'];

    /*echo '<pre>';
        
        var_dump($usuarioLogin);
        var_dump($contrasenaLogin);

    echo '</pre>';*/


    //25_ Cuando el usuario inicia sesion se debe verificar que el usuario este registrado en la base de datos
    $sql_verificacion = 'SELECT * FROM registro_pacientes WHERE email = ?';
    $verificando = $conexion_bdd -> prepare($sql_verificacion);
    $verificando -> execute(array($usuarioLogin));
    $resultado_verificacion = $verificando->fetch();

    /*echo '<pre>';
    
    var_dump($resultado_verificacion['nombre']);

    echo '</pre>';*/
    
    //Guadamos el nombre del usuario que inicio sesion en una variable
    $usuarioNombre = $resultado_verificacion['nombre'];
    $usuarioId = $resultado_verificacion['id'];

    //26_ Si el resultado es distinto de verdadero, quiere decir que el usuario no existe, y ejecuta el contenido del condicional para finalizar la operacion
    if(!$resultado_verificacion){
        
        header("location:usuarios_no_validos.php");
        
        die();
        
    }

    //27_ Realizamos una verificacion para que la contraseña que se ingreso en el logueo coincida con la del registro del usuario
    if (password_verify($contrasenaLogin, $resultado_verificacion['contrasena'])){
       //echo '<br>Su contraseña es correcta';
        
        //29_ Cuando la verificacion de contraseña es correcta, se establece el nombre de usuario a la sesion
        $_SESSION['usuario'] = $usuarioNombre;
        $_SESSION['usuarioId'] = $usuarioId;
        
        header("location:navegacion_usuario.php");
        
    }
    else{
        
        header("location:contrasena_incorrecta.php");
        
        die();
        
    }
    
    echo '<br>Usted ha iniciado sesion correctamente';

?>