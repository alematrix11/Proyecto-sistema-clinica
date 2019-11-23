
<?php 
    
    //Como estamos trabajando con sesiones, se usa la funcion de iniciar sesion
    session_start();

    include_once 'conexion-admin.php';

    //Se captura los datos del login del administrador
    $usuarioAdmin = $_POST['nombre_administrador'];
    $institucionAdmin = $_POST['institucion_administrador'];
    $contrasenaAdmin = $_POST['contrasena_administrador'];

    /*echo '<pre>';
        
        var_dump($usuarioAdmin);
        var_dump($institucionAdmin);
        var_dump($contrasenaAdmin);

    echo '</pre>';*/


    //Cuando el administrador inicia sesion se debe verificar que el usuario de administrador este registrado en la base de datos
    $sql_verificacion_admin = 'SELECT * FROM administrador WHERE nombre_admin = ?';
    $verificando_admin = $conexion_bdd_admin -> prepare($sql_verificacion_admin);
    $verificando_admin -> execute(array($usuarioAdmin));
    $resultado_verificacion_admin = $verificando_admin->fetch();

    /*echo '<pre>';
    
    var_dump($resultado_verificacion_admin);

    echo '</pre>';*/
    
    //Guadamos el nombre del administrador que inicio sesion en una variable
    $usuarioAdminNombre = $resultado_verificacion_admin['nombre_admin'];

    //Guadamos el id del administrador que inicio sesion en una variable
    $usuarioAdminId = $resultado_verificacion_admin['id'];

    //Si el resultado es distinto de verdadero, quiere decir que el usuario administrador no existe, y ejecuta el contenido del condicional para finalizar la operacion
    if(!$resultado_verificacion_admin){
        
        //echo 'Su usuario administrador es incorrecto';
        
        header("location:administrador_no_valido.php");
        
        die();
        
    }

    //Realizamos una verificacion para que la contraseña que se ingreso en el logueo del usuario administrador coincida con la del registro del usuario administrador
    if (password_verify($contrasenaAdmin, $resultado_verificacion_admin['contrasena_admin'])){
        
        //echo '<br>Su contraseña es correcta';
        
        //Cuando la verificacion de contraseña es correcta, se establece el nombre de usuario a la sesion
        $_SESSION['admin'] = $usuarioAdminNombre;
        
        $_SESSION['adminId'] = $usuarioAdminId;
        
        header("location:navegacion_admin.php");
        
    }
    else{
        
        //echo '<br>Su contraseña es incorrecta';
        
        header("location:contrasena_incorrecta_admin.php");
        
        die();
        
    }

    echo '<br>Usted ha iniciado sesion correctamente '.$usuarioAdmin;

?>