<?php

    session_start();

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <meta name="description" content="Sistema de gestion para Clinica Domingo Guzman Silva, para facilitar la busquedad de profesionales de la salud, organizacion de administrativos de la clinica y atencion de los pacientes">

    <meta name="keywords" content="HTML,CSS,XML,JavaScript">

    <meta name="author" content="Alejandro Iorlano, Carlos Gonzalez, Esteban Cantale">

    <!--File of JQuery 3.4.1-->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!--File of Google Fonts-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--File of Materialize-->
    <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <!--File of Materialize-->
    <script type="text/javascript" src="../js/inicializadores-para-materialize.js"></script>

    <!--File of Estilos CSS-->
    <link rel="stylesheet" href="../css/estilos.css">

    <!--File of SweetAlert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--File of FontAwesome-->
    <script src="https://kit.fontawesome.com/efb8f76515.js" crossorigin="anonymous"></script>

    <title>Eliminar profesional</title>

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
                    <span class="card-title">Dar de baja profesionales</span>

                    <p>Ingreso a la sesion donde podra dar de baja los profesionales</p>



                    <br>

                </div>
                <div class="card-action">
                    <a href="../administrador/administrador_valido.php">Regresar a administrar</a>
                </div>
            </div>
        </div>
    </div>


    <!--Se agrega tabla para los profesionales de la clinica 28/10/2019-->
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
              <div class="card">
                <div class="card-content white-text red darken-4">
                  <span class="card-title"><i class="far fa-list-alt"></i>&nbsp Listado de profesionales</span>

                    <p>En la siguiente tabla se puede eliminar los datos de todos los profesionales</p>

                </div>
                <div class="card-content white-text red darken-2">

                    <div class="tablaProfesionales">
                        <nav class="white">
                            <div class="container">
                                <div class="nav-wrapper">
                                        <a href="#" class="brand-logo black-text">Sistema de la clinica "Domingo Guzman Silva"</a>
                                </div>
                             </div>
                        </nav>
                                     <table id="datosProfesionales" class="responsive-table highlight">
                                        <thead>
                                          <tr>
                                              <th class="black-text">Numero</th>
                                              <th class="black-text">Nombre</th>
                                              <th class="black-text">Apellido</th>
                                              <th class="black-text">Especialidad</th>
                                              <th class="black-text">DNI</th>
                                              <th class="black-text">Telefono</th>
                                              <th class="black-text">Email</th>
                                              <th class="black-text">Matricula</th>
                                          </tr>
                                        </thead>

                                        <tbody>

                                            <?php

                                                //Incluimos para conexion a la base de datos
                                                include_once '../conexion.php';

                                                //Establecemos una sentencia para seleccionar la tabla de los profesionales
                                                $seleccionar_profesionales = "SELECT * FROM profesionales ORDER BY `id_profesional` ASC";
                                                $resultados_profesionales = $conexion_bdd->query($seleccionar_profesionales);

                                                //Recorremos todos los datos de la tabla con un while
                                                while($filas_profesionales = $resultados_profesionales->fetch(PDO::FETCH_ASSOC)){
                                                ?>

                                                <tr>
                                                    <td><?php echo $filas_profesionales['id_profesional'] ?></td>
                                                    <td><?php echo $filas_profesionales['nombre_p'] ?></td>
                                                    <td><?php echo $filas_profesionales['apellido_p'] ?></td>
                                                    <td><?php

                                                    switch ($filas_profesionales['id_especialidad']) {
                                                        case 1:
                                                            echo "Traumatologia";
                                                            break;
                                                        case 2:
                                                            echo "Cardiologia";
                                                            break;
                                                        case 3:
                                                            echo "Nutricion";
                                                            break;
                                                        case 4:
                                                            echo "Clinica Medica";
                                                            break;

                                                    }

                                                     ?></td>
                                                    <td><?php echo $filas_profesionales['dni_p'] ?></td>
                                                    <td><?php echo $filas_profesionales['telefono_p'] ?></td>
                                                    <td><?php echo $filas_profesionales['email_p'] ?></td>
                                                    <td><?php echo $filas_profesionales['matricula_p'] ?></td>
                                                    <td><?php echo '<a class="waves-effect waves-light btn btn-eliminar modal-trigger" href="#eliminar_profesionales">Eliminar</a>' ?></td>
                                                </tr>

                                                <?php } ?>

                                            <!--Sesion de formulario para eliminar datos-->
                                            <div id="eliminar_profesionales" class="modal">

                                                <div class="modal-content">

                                                    <div class="row">

                                                    <h4 class="black-text">Eliminar datos del profesional</h4>

                                                        <br><br>

                                                        <div class="center-align">
                                                            <span class="black-text">¿Esta seguro de eliminar los datos del profesional?</span>
                                                        </div>

                                                        <br><br><br><br>

                                                    <!--Formulario para eliminar datos de los profesionales-->
                                                    <form action="profesional_eliminar.php" id="" method="POST">

                                                        <input type="hidden" id="deleteId" name="idP">

                                                        <div class="input-field col l6 m6 s12">
                                                        <input type="text" id="nombreP" name="nombreP" class="validate" placeholder="" required>
                                                        <label for="nombreP">Nombre:</label>
                                                        </div>

                                                        <div class="center">
                                                        <button class="btn" type="submit">Eliminar profesional</button>
                                                        </div>

                                                    </form>

                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                                </div>

                                            </div>

                                        </tbody>

                                    </table>
                    </div>

                </div>
                <div class="card-action">
                    <a class="btn blue" href="../administrador/administrador_valido.php">Ir a actualizaciones de profesionales</a>
                    <span class="right">Sistema actualizado 2019</span>
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


    <!--File of de JS-->
    <script type="text/javascript" src="../js/app.js"></script>

    <!--File of de JS-->
    <!--<script type="text/javascript" src="../profesionales/js/funciones.js"></script>-->

    <!--File of JS Materialize (Se debe cargar ultimo para que se visualize correctamente el carrusel)-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>

    <!--Script de JavaScript para capturar con el boton editar los datos del registro 07/11/2019-->
    <script>

        //Se establece una funcion para cuando se hace click en un boton eliminar
        $('.btn-eliminar').on('click', function(){

            $tr=$(this).closest('tr');

            //Se declara la variable datos, donde se guarda la funcion map, que se encarga de reporrer todos los datos
            var datos = $tr.children("td").map(function(){
                //Con la funcion return obtenemos los textos de cada elemento
                return $(this).text();
            });

            $('#deleteId').val(datos['0']);
            $('#nombreP').val(datos['1']);

        });
    </script>

</body>

</html>
