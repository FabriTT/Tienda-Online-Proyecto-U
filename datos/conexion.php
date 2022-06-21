<?php
    
    $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
    $usuario= 'root';
    $pass = '';
    

    try{

        $pdo = new PDO($link,$usuario,$pass);

        //echo "Conectado";

    }catch(PDOException $e){
        print "Conexion mala con la BD" . $e->getMessage() . "<br/>";
        die();
    }




?>