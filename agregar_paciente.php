<?php
    
    //20_ Se llama a la conexion en el principio del codigo para verificar a los usuarios registrados en la base de datos y evitar que se dupliquen cuando se creen usuarios
    include_once 'conexion.php';

    //14_ Se crea una variable para identificar el nombre del usuario que viene del formulario
    $nombre_nuevo = $_POST['nombre_paciente'];
    $apellido_nuevo = $_POST['apellido_paciente'];
    $contrasena_nueva = $_POST['nueva_contrasena'];
    $contrasena2_nueva = $_POST['confirmacion_contrasena'];
    $email_nuevo = $_POST['email_paciente'];
    $dni_nuevo = $_POST['dni_paciente'];
    $telefono = $_POST['telefono_paciente'];
    $obra_social_nueva = $_POST['obra_social_paciente'];
    
    //21_ Realizamos la verificacion de usuarios duplicados, recorriendo los mail de la base de datos
    $sql_verificacion = 'SELECT * FROM registro_pacientes WHERE email = ?';
    $verificando = $conexion_bdd -> prepare($sql_verificacion);
    $verificando -> execute(array($email_nuevo));
    $resultado_verificacion = $verificando->fetch();
    
    //22_ Establecemos un codicional para los resultado de la Query, si el resultado es verdadero, no permitira el registro, si es falso continuara el registro
    if($resultado_verificacion){
        
        //23_ Cuando el usuario ingresa un mail que ya fue registrado, se redireciona a una pagina con un mensaje
        header("location: usuarios_duplicados.php");
        
        //echo 'Su direccion de correo electronico ya exite en el sistema, ingrese una direccion de correo electronico diferente'; 
        die();
        
    }
        
    //15_ Para darle seguridad a los datos se realiza un hash de la contraseña
    $contrasena_nueva = password_hash($contrasena_nueva, PASSWORD_DEFAULT);

    /*echo '<pre>';

    var_dump($nombre_nuevo);
    var_dump($apellido_nuevo);
    var_dump($contrasena_nueva);
    var_dump($contrasena2_nueva);
    var_dump($email_nuevo);
    var_dump($dni_nuevo);
    var_dump($telefono);
    var_dump($obra_social_nueva);

    echo '<pre>';*/
    
    //16_ Se realiza una verficicacion de las contraseñas que ingreso el usuario, se verifica que sean iguales
    if (password_verify($contrasena2_nueva, $contrasena_nueva)){
        echo '¡La contraseña es válida!';
        
        //17_ Si la verificacion de contraseñas es correcta, se procede a llamar a la conexion para empezar a guardar los usuarios de los pacientes en la base de datos
        //include_once 'conexion.php';
        
        
        //18_ Se comienza a agregar los datos del registro a la base de datos, usando la query de MySQL
        $sql_agregar_usuarios = 'INSERT INTO registro_pacientes(nombre, apellido, contrasena, email, dni, telefono, obra_social) VALUES (?,?,?,?,?,?,?)';
        $agregando_usuarios = $conexion_bdd -> prepare($sql_agregar_usuarios);
        if( $agregando_usuarios -> execute(array($nombre_nuevo, $apellido_nuevo, $contrasena_nueva, $email_nuevo, $dni_nuevo, $telefono, $obra_social_nueva)) ){
            echo 'Se agrego un nuevo usuario<br>';
        }else{
            echo 'No se agrego correctamente<br>';
        }
        
        //19_ Para seguridad de la navegacion del sitio web se debe cerrar la sentencia y la conexion con la base de datos
        $sql_agregar_usuarios = null;
        $conexion_bdd = null;
        
        
        
    }else {
        echo 'La contraseña no es válida.';
    }
