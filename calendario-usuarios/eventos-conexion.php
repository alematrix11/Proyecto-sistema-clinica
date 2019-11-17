<?php 

    //Se establece el formato JSON
    header('Content-Type: application/json');
    
    $conexion_eventos = new PDO("mysql:dbname=clinica_dgs; host=localhost","root","");
    
    //Se establece la sentencia de agregar los eventos a la base de datos 
    
    //Se captura con el metodo GET la accion que solicita el usuario, si no envia ninguna accion es porque solo quiere leer la informacion del evento
    $accion_usuario = (isset($_GET['accion'])) ? $_GET['accion'] : 'leer'; 
    


    //Se establece un switch que comprueba la acciones enviadas por los usuarios
    switch($accion_usuario){
          
        //Instrucción para agregar evento a la base de datos
        case 'agregar': 
            
            //echo "Se agrega un nuevo turno";
            
            //Se establece una sentencia o query para agregar los eventos del calendario
            $sentencia_agregar_eventos = $conexion_eventos -> prepare("INSERT INTO eventos_turnos (title, descripcion, color, textColor, start, end) VALUES (:title, :descripcion, :color, :textColor, :start, :end)");
            
            //$sentencia_agregando_eventos = $conexion_eventos -> prepare($sentencia_agregar_eventos);
            $sentencia_resultados_eventos = $sentencia_agregar_eventos -> execute(array(
                
                //Los datos tienen que ser iguales a los de el NuevoEvento que se declaro en JavaScript
                "title" => $_POST['title'],
                "descripcion" => $_POST['descripcion'],
                "color" => $_POST['color'],
                "textColor" => $_POST['textColor'],
                "start" => $_POST['start'],
                "end" => $_POST['end']    
            ));
            
            //Se pasa la sentencia con los resultados del evento a JSON
            echo json_encode($sentencia_resultados_eventos);
        break;
            
        case 'editar': 
            echo "Se edita un turno";
        break;
        
        case 'borrar':      
            /*$obteniendoId = false;
            if(isset($_POST['id'])){
                $sentencia_eliminar_eventos = $conexion_eventos -> prepare("DELETE FROM eventos WHERE id= id:")
                $sentencia_eliminando_eventos -> $sentencia_eliminar_eventos->execute(array("id" => $_POST['id']));
            }
            echo json_encode($sentencia_eliminando_eventos);*/
        break;
        
        
        //Instrucción por defecto para leer evento de la base de datos    
        default:
            //Se establece una sentencia o query para seleccionar los eventos del calendario
            $sentencia_eventos = $conexion_eventos->prepare("SELECT * FROM eventos_turnos");
            $sentencia_eventos->execute();
            $resultado_eventos = $sentencia_eventos->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($resultado_eventos);
            //Se convierten los resultados a formato JSON
            echo json_encode($resultado_eventos);
        break;
            
    }

?>