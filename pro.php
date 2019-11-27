<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
  <!--ESTAS NO ENTIENDO QUE UTILIDAD TIENEN XD-->
  <meta name="description" content="Sistema de gestion para Clinica Domingo Guzman Silva, para facilitar la busquedad de profesionales de la salud, organizacion de administrativos de la clinica y atencion de los pacientes">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="Alejandro Iorlano, Carlos Gonzalez, Esteban Cantale">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="css/index.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/pro.css">
  <title>Clinica - Staff Profesional</title>
</head>

<body id="subir">
  <!--SECCION DEL MENU, LOGO Y OPCIONES 03/09/19-->
  <!--Nav que contiene la opciones del menú-->
  <nav class="teal lighten-2" style="min-height: 100px">
    <div class="row">
      <div class="col l12 m12 s12">
        <div class="logo">
          <a href="index.php"><img src="img/logo.png"></a>
        </div>
        <div class="item_menu">
          <div class="caja_menu">
            <ul class="menu">
              <li><a class="waves-effect waves-light blue darken-2 btn-large" href="index.php" data-scroll>Inicio</a></li>
              <li><a class="waves-effect waves-light blue darken-2 btn-large" href="nosotros.php" data-scroll>Quienes Somos</a></li>
              <li><a class="waves-effect waves-light blue darken-2 btn-large" href="especialidades.php" data-scroll>Especialidades</a></li>
              <li><a class="waves-effect waves-light blue darken-2 btn-large" href="pro.php" data-scroll>Profesionales</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="cabezera">
    <img src="img/img-pro/isologo.png" alt="">
    <h1>Staff Profesional - Clinica Domingo Guzman Silva</h1>
  </div>

  <div class="section">

    <div class="img-pro">
      <img src="img/img-pro/pro1.png" alt="odontologia">
      <p>Odontologia<br>Galassi, Marcos<br>Mat. N° 15687</p>
    </div>

    <div class="img-pro">
      <img src="img/img-pro/pro2.png" alt="pediatria">
      <p>Pediatria<br>Garcia Duran, Luisina<br>Mat. N° 23568</p>
    </div>

    <div class="img-pro">
      <img src="img/img-pro/pro3.png" alt="laboratorio">
      <p>Laboratorio<br>Antivero, Evangelina<br>Mat. N° 19874</p>
    </div>

  </div>

  <div class="section">

    <div class="img-pro">
      <img src="img/img-pro/pro4.png" alt="diagnostico">
      <p>Diagnostico<br>Antonione, Bruno<br>Mat. N° 25647</p>
    </div>

    <div class="img-pro">
      <img src="img/img-pro/pro5.png" alt="cardiologia">
      <p>Ginecologia<br>Azum, Martín Camilo<br>Mat. N° 13297</p>
     </div>

    <div class="img-pro">
      <img src="img/img-pro/pro6.png" alt="radiologia">
      <p>Radiologia<br>Biga, Constanza<br>Mat. N° 24235</p>
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

        <div class="col l3 s12">
          <h5 class="white-text">Opciones</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Turnos</a></li>
            <li><a class="grey-text text-lighten-3" href="especialidades.php">Especialidades</a></li>
            <li><a class="grey-text text-lighten-3" href="pro.php">Profesionales</a></li>
          </ul>
        </div>

        <div class="col l3 s12">
          <h5 class="white-text">Sistema</h5>
          <ul>
            <li><a class="grey-text text-lighten-3 modal-trigger" href="#loginAdministrador">Administracion</a></li>

            <!-- Se agrega el login de administrador 20/10/19 -->
            <div id="loginAdministrador" class="modal">
              <div class="modal-content">

                <h3 class="black-text center-align">Ingrese los datos de administrador</h3>

                <br><br>

                <form action="administrador/loguear-admin.php" method="POST">

                  <div class="input-field col l12 s12">
                    <input type="text" id="adminNombre" name="nombre_administrador" placeholder="Usuario de administrador">
                    <label for="adminNombre">Administrador</label>
                  </div>

                  <div class="input-field col l12 s12">
                    <input type="text" id="adminInstitucion" name="institucion_administrador" placeholder="Institucion de administrador">
                    <label for="adminInstitucion">Institucion</label>
                  </div>

                  <div class="input-field col l12 s12">
                    <input type="password" id="adminContrasena" name="contrasena_administrador" placeholder="Contraseña de administrador">
                    <label for="adminContrasena">Contraseña</label>
                  </div>

                  <div class="center-align">

                    <button class="btn blue waves-effect waves-light" type="submit">Ingresar</button>

                  </div>

                </form>

              </div>

              <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
              </div>

            </div>


            <li><a class="grey-text text-lighten-3" href="#!">Desarrolladores</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Tecnologias</a></li>
          </ul>
        </div>
        <div class="subir"><a class="waves-effect waves-light blue darken-2 btn-large" href="#subir">Subir</a></div>
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
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--File of JS (Se debe cargar ultimo para que se visualize correctamente el carrusel)-->
  <script type="text/javascript" src="js/app.js"></script>

</body>

</html>