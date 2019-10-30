<?php

//Se crea una clase para crear la conexion a la base de datos
class Connection{
    
    //Se estable que sera publica y estatica la funcion para realizar la conexion
    public static function Connect(){
        
        //Se define el nombre del servidor
        define ('server', 'localhost');
        
        //Se define el nombre de la base de datos
        define ('db_name', 'clinica_dgs');
        
        //Se define el nombre de usuario del servidor
        define ('user', 'root');
        
        //Se define el nombre de usuario del servidor
        define ('password', '');
        
        //Se establece el comando MYSQL_ATTR_INIT_COMMAND
        //Comando a ejecutar cuando se conecta al servidor MySQL. Al reconectar se volverá a ejecutar automáticamente.
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        
        try{
            
            $connection = new PDO("mysql:host=".server."; dbname=".db_name, user, password, $options);
            
            return $connection;
        
        }
        catch(Exception $e){
            
            die("Connection Error ". $e->getMessage());
            
        }
        
    }
    
}
    
?>