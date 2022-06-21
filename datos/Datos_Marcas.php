<?php
/*
    function D_mostrar_marcas(){

        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);
        $sql='SELECT * FROM marcas WHERE mar_status=1';
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->execute();
        $listaMarcas=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaMarcas;

    }

    function D_agg_marcas($marca){
        
        include_once 'conexion.php';
        $estado=1;
        try{
            $sql='INSERT INTO marcas(mar_descripcion,mar_status) VALUES(:Marca,:Estado)';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Marca',$marca);
            $sentencia->bindParam(':Estado',$estado);
    
            $sentencia->execute();
            return 'ok';
        }catch(Exception $e){
            return 'error al guardar en la base de datos';
        }
       

    }



    function D_delete_marcas($id){
        
        include_once 'conexion.php';
        $estado=0;

        try{
            $sql='UPDATE marcas SET mar_status=:Estado WHERE mar_id=:Id';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);
            $sentencia->bindParam(':Estado',$estado);
    
            $sentencia->execute();
            return 'ok';
        }catch(Exception $e){
            return 'error al eliminar de la base de datos';
        }
       

    }
*/
?>