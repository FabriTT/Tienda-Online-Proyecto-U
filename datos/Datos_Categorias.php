<?php
/*
    function D_mostrar_categorias(){

        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);
        $sql='SELECT * FROM categorias WHERE cat_status=1';
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->execute();
        $listaCategorias=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaCategorias;

    }


    function D_agg_categorias($categoria){
        
        include_once 'conexion.php';
        $estado=1;
        try{
            $sql='INSERT INTO categorias(cat_descripcion,cat_status) VALUES(:Categoria,:Estado)';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Categoria',$categoria);
            $sentencia->bindParam(':Estado',$estado);
    
            $sentencia->execute();
            return 'ok';
        }catch(Exception $e){
            return 'error al guardar en la base de datos';
        }
       

    }



    function D_delete_categorias($id){
        
        include_once 'conexion.php';
        $estado=0;

        try{
            $sql='UPDATE categorias SET cat_status=:Estado WHERE cat_id=:Id';

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