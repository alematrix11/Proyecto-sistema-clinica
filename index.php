<?php 

    include_once 'conexion.php';


?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <!--ESTAS NO ENTIENDO QUE UTILIDAD TIENEN XD-->
    <meta name="description" content="Sistema de gestion para Clinica Domingo Guzman Silva, para facilitar la busquedad de profesionales de la salud, organizacion de administrativos de la clinica y atencion de los pacientes">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Alejandro Iorlano, Carlos Gonzalez, Esteban Cantale">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/index.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="css/estilos.css">

    <title>Clinica</title>

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
            <a href="index.html" class="brand-logo valign-wrapper"><img class="logo" src="img/logo.png"></a>
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


    <section class="blue">

    <br>

    <!--SECCION DE LAS TARGETAS DE ESPECIALIDADES 04/09/19-->
    <div class="container blue darken-1 z-depth-4">

        <h2>Nuestras Especialidades</h2>

        <div class="row ">
            <div class="col l4 m4 s4">
                 <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator responsive-img" src="img/img-profesionales/doctor.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Odontologia<i class="material-icons right">more_vert</i></span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div>
            <div class="col l4 m4 s4">
                 <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator responsive-img" src="img/img-profesionales/doctora.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Pediatria<i class="material-icons right">more_vert</i></span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div>
            <div class="col l4 m4 s4">
                 <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator responsive-img" src="img/img-profesionales/laboratory.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Analista<i class="material-icons right">more_vert</i></span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <!--SECCION DE LAS TARGETAS DE OTRAS ESPECIALIDADES 05/09/19-->
    <div class="container blue darken-1 z-depth-4">

        <h2>Otras Especialidades</h2>

        <div class="row">

            <div class="col l4 m4 s4">

                    <div class="contenedor-carta">
                        <div class="contenedor-especialidad">
                            <div class="lado adelante center-align">
                                <h3>Nombre de especialidad</h3>
                                <span>Descripcion</span>
                                <p>Mas informacion</p>
                            </div>
                            <div class="lado atras"></div>
                        </div>
                    </div>

            </div>

            <div class="col l4 m4 s4">

                    <div class="contenedor-carta">
                        <div class="contenedor-especialidad">
                            <div class="lado adelante center-align">
                                <h3>Nombre de especialidad</h3>
                                <span>Descripcion</span>
                                <p>Mas informacion</p>
                            </div>
                            <div class="lado atras"></div>
                        </div>
                    </div>

            </div>

            <div class="col l4 m4 s4">

                    <div class="contenedor-carta">
                        <div class="contenedor-especialidad">
                            <div class="lado adelante center-align">
                                <h3>Nombre de especialidad</h3>
                                <span>Descripcion</span>
                                <p>Mas informacion</p>
                            </div>
                            <div class="lado atras"></div>
                        </div>
                    </div>

            </div>

        </div>
        <br>
    </div>

    <br>

    </section>


    <!--SECCION DE PARALLAX 06/09/19-->
    <section class="parallax-container">
        <div class="parallax">
            <img src="img/img-parallax/estetoscopio.jpg">
        </div>
    </section>

    <!--SECCION DEL FORMULARIO 06/09/19-->
    <section class="blue">
      <div class="container blue darken-1 z-depth-4 registro">
        <br><br>
        <h2>Registro de usuarios</h2>
        <br><br>
        <br><br>
      </div>

    </section>

    <!--SECCION DE PARALLAX 06/09/19-->
    <section class="parallax-container">
        <div class="parallax">
            <img src="img/img-parallax/clinica.jpg">
        </div>
    </section>

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