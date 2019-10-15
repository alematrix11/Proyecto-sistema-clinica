<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <meta name="description" content="Sistema de gestion para Clinica Domingo Guzman Silva, para facilitar la busquedad de profesionales de la salud, organizacion de administrativos de la clinica y atencion de los pacientes">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Alejandro Iorlano, Carlos Gonzalez, Esteban Cantale">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/index.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="css/estilos.css">

    <title>Registro no valido</title>

</head>

<body>

    <!--SECCION DEL MENU, LOGO Y OPCIONES 03/09/19-->

    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="#!">Obras Sociales</a></li>
      <li><a href="#!">Especialistas</a></li>
    </ul>

    <!--Nav que contiene la opciones del menú-->
    <nav class="teal lighten-2" style="min-height: 150px">

    <div class="row">
        <div class="col l12 m12 s12">
            <div class="col l5 m5 s5">
            <a href="index.php" class="brand-logo valign-wrapper"><img class="logo" src="img/logo.png"></a>
            </div>


            <div class="col l7 m7 s7">
                <div class="nav-wrapper right">
                    <ul class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light blue darken-2 btn-large" href="#">Inicio</a></li>
                        <li><a class="waves-effect waves-light blue darken-2 btn-large" href="#">Solicitar turno</a></li>
                        <li><a href="#">Quienes Somos</a></li>
                        <li><a href="#">Especialidades</a></li>

                    <!-- Dropdown Trigger -->
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Más Información<i class="material-icons right">arrow_drop_down</i></a></li>
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
                    <span class="card-title">Usuario incorrecto</span>
                    <p>Usted ha ingresado una direccion de correo electronico que no se encuentra en el sistema.</p>
                    <p>Debe ingresar con su usuario y contraseña nuevamente</p>
                    
                    <br>
                    
                    <strong><a href="#">¿Usted todavia no se ha registrado en la clinica?</a></strong>
                    
                </div>
                <div class="card-action">
                    <a href="index.php">Regresar a la pagina principal</a>
                </div>
            </div>
        </div>
    </div>

    <!--SECCION DEL BANNER Y SUS IMAGENES 04/09/19-->
    <div class="full-silder">
        
        <div class="carousel carousel-slider" data-indicators="true">
    		<a href="#" class="carousel-item"><img class="responsive-img clinica-img1"></a>
    		<a href="#" class="carousel-item"><img class="responsive-img clinica-img2"></a>
    		<a href="#" class="carousel-item"><img class="responsive-img clinica-img3"></a>
    		<a href="#" class="carousel-item"><img class="responsive-img clinica-img4"></a>
    		<a href="#" class="carousel-item"><img class="responsive-img clinica-img5"></a>
    	</div>
        
        <div class="next"><i class="material-icons large">navigate_next</i></div>
     	<div class="prev"><i class="material-icons large">navigate_before</i></div>
        
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
                  <li><a class="grey-text text-lighten-3" href="#!">Inicio</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Turnos</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Especialidades</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Profesionales</a></li>
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


    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

</body>

</html>