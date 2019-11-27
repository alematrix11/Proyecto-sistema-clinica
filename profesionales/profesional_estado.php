<?php

    include_once 'mostrar_listado.php';

    //Se llama a la conexion a la base de datos
    $object = new Connection();
    $connection = $object ->Connect();

    //Se realiza una consultando selecionando los datos de la tabla de los profesionales
    /*$consulta_profesionales = "SELECT id_profesional, nombre_p, apellido_p, id_especialidad, dni_p, telefono_p, email_p, matricula_p FROM profesionales ORDER BY `id_profesional` ASC";
    $consultando_profesionales = $connection-> prepare($consulta_profesionales);
    $consultando_profesionales -> execute();
    $datos_profesionales = $consultando_profesionales -> fetchALL(PDO::FETCH_ASSOC);*/

    
    $consulta_profesionales = "SELECT id_profesional, nombre_p, apellido_p, id_especialidad, estado FROM profesionales INNER JOIN profesionales_estado ON profesionales.id_profesional = profesionales_estado.id ORDER BY `id_profesional` ASC";
    $consultando_profesionales = $connection-> prepare($consulta_profesionales);
    $consultando_profesionales -> execute();
    $datos_profesionales = $consultando_profesionales -> fetchALL(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>

    <meta name="description" content="Sistema de gestion para Clinica Domingo Guzman Silva, para facilitar la busquedad de profesionales de la salud, organizacion de administrativos de la clinica y atencion de los pacientes">

    <meta name="keywords" content="HTML,CSS,XML,JavaScript">

    <meta name="author" content="Alejandro Iorlano, Carlos Gonzalez, Esteban Cantale">

    <!--File of Google Fonts-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--File of Materialize-->
    <link href="../css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>

    <!--File of Materialize-->
    <script type="text/javascript" src="../js/inicializadores-para-materialize.js"></script>

    <!--File of Estilos CSS-->
    <link rel="stylesheet" href="../css/estilos.css">

    <!--File of JQuery-->
    <script src="js/jquery-3.4.1.min.js"></script>

    <!--File of Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.css">

    <!--File of DataTables CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <title>Cambiar estado profesional</title>

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

                            echo "Actualizaciones de estados del personal de la clinica con el usuario ".$_SESSION['admin'];

                            //Tambien agregamos la opcion para que el admin pueda cerrar sesion

                            //echo '<br><br><a href="cerrar_admin.php">Cerrar sesión</a>';-->

                        ?>
                    </span>

                    <p>Usted ha ingresado a la sesion donde puede cambiar los estados de los profesionales de la clinica</p>

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
                <div class="card-content white-text orange darken-4">
                  <span class="card-title"><i class="far fa-list-alt"></i>&nbsp Listado de profesionales</span>
                  <p>En la siguiente tabla se encuentran los datos de todos los profesionales</p>
                </div>
                <div class="card-content white-text orange darken-2">

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
                                              <th class="black-text">Estado</th>
                                              <th class="black-text"></th>
                                          </tr>
                                        </thead>

                                        <tbody>

                                            <?php

                                                //Incluimos para conexion a la base de datos
                                                include_once '../conexion.php';

                                                //Establecemos una sentencia para seleccionar la tabla de los profesionales
                                                $seleccionar_profesionales = "SELECT * FROM profesionales INNER JOIN profesionales_estado ON profesionales.id_profesional = profesionales_estado.id ORDER BY `id_profesional` ASC";
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
                                                    <td><?php echo $filas_profesionales['estado'] ?></td>
                                                    <td><?php echo '<a class="waves-effect waves-light btn btn-editar modal-trigger" href="#actualizar_profesionales">Editar</a>' ?></td>
                                                </tr>

                                                <?php } ?>

                                            <!--Sesion de formulario para actualizar datos-->
                                            <div id="actualizar_profesionales" class="modal">

                                                <div class="modal-content">

                                                    <div class="row">

                                                    <h4 class="black-text">Actualizar datos del profesional</h4>


                                                    <!--Formulario para editar datos de los profesionales-->
                                                    <form action="profesional_modificar_estado.php" id="frmAgregarDatosu" method="POST">


                                                        <input type="hidden" id="actualizarId" name="idP">

                                                        <div class="input-field col l6 m6 s12">
                                                        <input type="text" id="nombreP" name="nombreP" class="validate" placeholder="" readonly>
                                                        <label for="nombreP">Nombre:</label>
                                                        </div>

                                                        <div class="input-field col l6 m6 s12">
                                                        <input type="text" id="apellidoP" name="apellidoP" class="validate" placeholder="" readonly>
                                                        <label for="apellidoP">Apellido:</label>
                                                        </div>

                                                        <div class="input-field col l6 m6 s12">
                                                        <input type="text" id="especialidadP" name="especialidadP" class="validate" placeholder="" readonly>
                                                        <label for="especialidadP">Especialidad:</label>
                                                        </div>

                                                        <div class="input-field col l6 m6 s12">
                                                        <input type="text" id="estadoP" name="estadoP" class="validate" placeholder="" required>
                                                        <label for="especialidadP">Estado:</label>
                                                        </div>

                                                        <div class="center">
                                                        <button class="btn" type="submit">Actualizar profesional</button>
                                                        </div>

                                                    </form>

                                                    </div>

                                                </div>

                                                <div class="modal-footer">
                                                  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                                </div>

                                            </div>

                                        </tbody>

                                    </table>
                        
                    </div>

                </div>
                <div class="card-action">
                    <a class="btn blue darken-4" href="#">Actualizar estado</a>
                    <a class="btn blue darken-4" href="reportes-profesionales/reportes_profesionales.php">Descargar listado</a>
                    <a class="btn blue darken-4" href="../administrador/administrador_valido.php">Ir a actualizaciones de profesionales</a>
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

    <!--File of JS Materialize (Se debe cargar ultimo para que se visualize correctamente el carrusel)-->
    <script type="text/javascript" src="../js/materialize.min.js"></script>

    <!--<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>-->

    <!--File of DataTables JS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    
    <!--Script de JavaScript para capturar con el boton editar los datos del registro 04/11/2019-->
    <script>

        //Se establece una funcion para cuando se hace click en un boton editar
        $('.btn-editar').on('click', function(){

            $tr=$(this).closest('tr');

            //Se declara la variable datos, donde se guarda la funcion map, que se encarga de reporrer todos los datos
            var datos = $tr.children("td").map(function(){
                //Con la funcion return obtenemos los textos de cada elemento
                return $(this).text();
            });

            $('#actualizarId').val(datos['0']);
            $('#nombreP').val(datos['1']);
            $('#apellidoP').val(datos['2']);
            $('#especialidadP').val(datos['3']);
            $('#estadoP').val(datos['4']);

        });
    </script>


</body>

</html>
