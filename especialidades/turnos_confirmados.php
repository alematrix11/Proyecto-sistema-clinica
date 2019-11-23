<?php
    
    session_start();

    echo 'Se agrego el turno con exito';


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
            $mail->addAddress($_SESSION['turno_email'], 'Usuario');     // Se establece una sesion que pasara el email de usuario paciente
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