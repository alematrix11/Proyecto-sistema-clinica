<?php

  include_once '../conexion.php';

  //Se realiza una consulta selecionando los datos de la tabla de las obras sociales

  $consulta_especialidad = "SELECT id, nombre FROM especialidades ORDER BY `id` ASC";
  $consultando_especialidades = $conexion_bdd-> prepare($consulta_especialidad);
  $consultando_especialidades -> execute();
  $datos_especialidades = $consultando_especialidades -> fetchALL(PDO::FETCH_ASSOC);

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
    <link href="../css/index.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="../css/estilos.css">

    <!--File of Materialize-->
    <script type="text/javascript" src="../js/inicializadores-para-materialize.js"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('select');
          var instances = M.FormSelect.init(elems);
        });

    </script>

    <title>Agregar nuevo profesional</title>

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

                    <!-- Dropdown Trigger -->
                    <li><a class="waves-effect waves-light blue darken-2 btn-large" href="../administrador/cerrar_admin.php">Cerrar sesión</a></li>
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
                    <span class="card-title">
                        <?php

                            //Continuamos con la sesion del administrado y mostramos un mensaje con el nombre del usuario admin

                            session_start();

                            echo "Actualizaciones del personal de la clinica con el usuario ".$_SESSION['admin'];

                            //Tambien agregamos la opcion para que el admin pueda cerrar sesion

                            //echo '<br><br><a href="cerrar_admin.php">Cerrar sesión</a>';-->

                        ?>
                    </span>
                    <p>Usted ha ingresado a la sesion donde se agregan nuevos profesionales</p>

                    <br>

                </div>
                <div class="card-action">
                    <a href="../administrador/administrador_valido.php">Regresar a administrar</a>
                </div>
            </div>
        </div>
    </div>

    <!--Se agrega sesion del formulario para agregar profesionales de la clinica 26/10/2019-->
    <div class="row">
        <div class="col s12 m12">
            <div class="card blue-grey darken-1 z-depth-4">
                <div class="card-content blue darken-4">
                    <form action="profesional_guardar.php" method="POST">

                        <div class="row">

                            <div class="input-field col s4">
                              <input id="first_name" type="text" class="white-text validate" name="nombre_profesional" placeholder="Ingrese el nombre" required>
                              <label for="first_name">Nombre:</label>
                            </div>

                            <div class="input-field col s4">
                              <input id="first_name" type="text" class="white-text validate" name="apellido_profesional" placeholder="Ingrese el apellido" required>
                              <label for="first_name">Apellido:</label>
                            </div>
                            <div class="input-field col s4">
                                <!--<input id="especialidad" type="text" class="validate" name="especialidad_profesional" placeholder="Ingrese la especialidad aquí" required>-->
                                <select class=" validate" name="especialidad_profesional">
                                  <?php foreach ($datos_especialidades as $nombre_especialidad){ ?>
                                    <option value="<?php echo $nombre_especialidad ["id"] ?>">
                                      <?php
                                        echo $nombre_especialidad ["nombre"];
                                     ?>
                                   </option>
                                  <?php
                                    }
                                  ?>
                                </select>
                                <label for="especialidad">Especialidad:</label>
                            </div>

                        </div>

                        <div class="row">

                            <div class="input-field col s6">
                                <input id="dni" type="number" class="white-text validate" name="dni_profesional" placeholder="Ingrese el numero de DNI aquí" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                <label for="dni">DNI:</label>
                            </div>

                            <div class="input-field col s1">
                              <input class="white-text" type="tel" disabled value="+54" id="disabled">
                              <label for="telefono" class="white-text">Telefono</label>
                            </div>

                            <div class="input-field col s5">
                                <input id="telefono" type="number" class="white-text validate" name="telefono_profesional" placeholder="Ingrese telefono aquí" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>
                        </div>



                        <div class="row">
                            <div class="input-field col s6">
                                <input id="email" type="email" class="white-text validate" name="email_profesional" placeholder="Ingrese el email del profesional" required>
                                <label for="email">Email:</label>
                            </div>

                            <div class="input-field col s6">
                                <input id="matricula" type="number" class="white-text validate" name="matricula_profesional" placeholder="Ingrese numero de matricula aquí" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                                <label for="matricula">Matricula</label>
                            </div>

                        </div>



                        <div class="row center">
                            <button class="btn waves-effect waves-light" type="submit" name="registrar">Agregar nuevo<i class="material-icons right">send</i></button>
                        </div>

                    </form>
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

    <!--Files of JQuery-->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="../js/app.js"></script>
    <!--File of JS (Se debe cargar ultimo para que se visualize correctamente el carrusel)-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>

</body>

</html>

<?php

    include_once '../conexion.php';

?>
