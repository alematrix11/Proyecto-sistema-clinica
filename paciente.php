<?php 

    session_start();
    
    //10_ Si la sesion es valida, accede al contenido de los usuarios pacientes
    if(isset($_SESSION ['usuario'])){
        echo 'Bienvenido al sistema de turnos de la Clinica '.$_SESSION ['usuario'];
        echo '<br><br><a href="cerrar.php">Cerrar sesión</a>';
    }
    //11_ Si la sesion no es valida vuelve a la pagina principal
    else{
        
        //Se muestra una alerta con codigo js para mostrar un mensaje de aviso que no se inicio sesion
        echo "<script>
                alert('Debe iniciar sesion para poder acceder a solicitar un turno');
            </script>";
        
        header("location:index.php");
    }
    
?>