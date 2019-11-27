<?php
    
    session_start();

    //echo 'Se agrego el turno con exito';


        //PHPMailer
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        
        require '../PHPMailer/Registro/Exception.php';
        require '../PHPMailer/Registro/PHPMailer.php';
        require '../PHPMailer/Registro/SMTP.php';
        
        // Instalacion de PHPMailer
        $mail = new PHPMailer(true);

        try {
            //Configuraciones del server
            $mail->SMTPDebug = 0;                                       // Se desactiva dejando en 0
            $mail->isSMTP();                                            // Protocolo que se usa para enviar
            $mail->Host       = 'smtp.gmail.com';                       // Server de servicio de correo
            
            $mail->SMTPAuth   = true;                                   // Habilitar identificacion SMTP
            $mail->Username   = 'somosclinicadgs@gmail.com';            // SMTP nombre de usuario
            $mail->Password   = 'dgs4deenero';                          // SMTP contraseña
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Destinatarios
            $mail->setFrom('somosclinicadgs@gmail.com', 'Clinica');     // Direccion que envia
            $mail->addAddress($_SESSION['turno_email'], 'Turno Clinica');     // Se establece una sesion que pasara el email de usuario paciente
            /*$mail->addAddress('ellen@example.com');                   // Name is optional
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');*/

            //Archivos adjuntos 
            //$mail->addAttachment('/var/tmp/file.tar.gz');             // Opcion para enviar archivos
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');        // Opcion para enviar imagenes
            
            //Contenido
            $mail->isHTML(true);                                    // Permite que en el correo se acepte HTML
            $mail->Subject = 'Notificacion de solicitud de turno';
            
            //Estructura con HTML para enviar mail
            $mail->Body    = '
            
            <h1>Su turno fue solicitado correctamente</h1>
            
            <h2>Su usuario ha solicitado un turno, el mismo sera el dia </b>'.$_SESSION['turno_registrado'].'</h2>
            
            <p>*Le recomendamos que en el caso de no poder asistir, cancele el turno por llamado telefonico</P>
            
            ';
            
            $mail->send();
            echo "<script> alert('Su turno se confirmo para el dia y la fecha de manera correcta'); </script>";
        } catch (Exception $e) {
            echo "No se logro enviar el mensaje. Mailer Error: {$mail->ErrorInfo}";
        }

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <meta name="description" content="Sistema de gestion para Clinica Domingo Guzman Silva, para facilitar la busquedad de profesionales de la salud, organizacion de administrativos de la clinica y atencion de los pacientes">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Alejandro Iorlano, Carlos Gonzalez, Esteban Cantale">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="../css/estilos.css">
    
    <!--File of Materialize-->
    <script type="text/javascript" src="js/inicializadores-para-materialize.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.tooltipped');
            var instances = M.Tooltip.init(elems, {
                margin: 480,
                position: 'top'
            });
          });
        
        var toastHTML = '<span>Puede llamar a nuestra clinica: 0342 457-2912</span><button class="btn-flat toast-action blue">Undo</button>';
        M.toast({
            html: toastHTML, 
            classes: 'blue'});
    </script>
    
    <title>Turno confirmado</title>

</head>

<body>

    <!--SECCION DEL MENU, LOGO Y OPCIONES 03/09/19-->

    <!--Nav que contiene la opciones del menú-->
    <nav class="teal lighten-2" style="min-height: 150px">

    <div class="row">
        <div class="col l12 m12 s12">
            <div class="col l5 m5 s5">
            <a href="index.php" class="brand-logo valign-wrapper"><img class="logo" src="../img/logo.png"></a>
            </div>


            <div class="col l7 m7 s7">
                <div class="nav-wrapper right">
                    <ul class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light blue darken-2 btn-large" href="index.php">Inicio</a></li>

                            <!-- Solicitar turno - Iniciar sesion 14/10/2019 -->
                            <div id="solicitar_turno" class="modal">
                                <div class="modal-content">
                                    <h4 class="black-text center">Debes iniciar sesion para poder solicitar turnos</h4>
                                    <p class="black-text">Para iniciar sesion debes ingresar con tu usuario y contraseña</p>

                                    <!--------------------------------------->
                                    <!--------------------------------------->
                                    <!--Formulario de login de los paciente-->
                                    <!--------------------------------------->
                                    <!--------------------------------------->

                                    <form action="loguear-paciente.php" method="POST">

                                        <input id="loginEmail" type="email" name="usuario_paciente" placeholder="Ingrese su email">
                                        <label for="loginEmail"></label>

                                        <input id="loginContrasena" type="password" name="contrasena_paciente" placeholder="Ingrese su contraseña">
                                        <label for="loginContrasena"></label>

                                        <button class="btn" type="submit">Iniciar sesion</button>
                                        
                                    </form>

                                    <!---------------------------------------------------->
                                    <!---------------------------------------------------->
                                    <!--Finaliza el formulario de login de los pacientes-->
                                    <!---------------------------------------------------->
                                    <!---------------------------------------------------->

                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                </div>
                            </div>
                        <li><a href="../pro.php">Profesionales</a></li>
                        <li><a href="../especialidades.php">Especialidades</a></li>
                        <li><a class="waves-effect waves-light blue darken-2 btn-large" href="../cerrar.php">Cerrar sesión</a></li>
                    
                    </ul>

                </div>
            </div>

        </div>
    </div>

    </nav>
    
    <br>
    
    <div class="row">
        <div class="col s12 m12">
            <div class="card blue-grey darken-1 z-depth-4">
                <div class="card-content white-text">
                    
                    <div class="row">
                    
                    <div class="input-field col l4 s12">
                    
                    <h2 class="card-title">Se agrego el turno con exito!</h2>
                    <p>Gracias por solicitar el turno, se le enviara una notificacion del mismo por correo</p>
                    <br><br>
                    <img src="../img/iconos/completed-task.png">
                        
                    
                        
                    </div>
                    
                    <div class="col l8 s12 right-align">
                    <a href="#solicitar_turno" class="modal-trigger"><img src="../img/iconos/refresh.png" width="184"></a>
                    <br>
                    <a onclick="M.toast({html: 'Puede llamar a nuestra clinica: 0342 457-2912', classes: 'green accent-4', displayLength: 8000})" class="btn right">Consultas telefonicas</a>
                    
                    </div>
                        
                    </div>
                    
                    <br><br><br><br><br><br><br><br><br><br>
                        
                <div class="card-action">
                    <a href="index.php">Regresar a la pagina principal</a>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    
    <!--SECCION DEL FOOTER 06/09/19-->
    <footer class="page-footer teal lighten-2">
        <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Información</h5>
                <p class="grey-text text-lighten-4 valign-wrapper"><i class="material-icons">access_time</i>&nbsp Atencion al publico de lunes a sabados</p>
                <p class="grey-text text-lighten-4 valign-wrapper"><i class="material-icons">location_on</i>&nbsp Provincia de Santa Fe, ciudad de Santa Fe</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Opciones</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="../index.php">Inicio</a></li>
                  <li><a class="grey-text text-lighten-3" href="../usuarios_validos.php">Turnos</a></li>
                  <li><a class="grey-text text-lighten-3" href="../especialidades.php">Especialidades</a></li>
                  <li><a class="grey-text text-lighten-3" href="../pro.php">Profesionales</a></li>
                </ul>
              </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
            © 2019 Copyright - Todos los derechos reservados a clinica "Domingo Guzman Silva"
            <a class="grey-text text-lighten-4 right" href="#!">Mas informacion</a>
            </div>
        </div>
    </footer>


    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>

</body>

</html>