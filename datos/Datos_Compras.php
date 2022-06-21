<?php
    function D_mostrar_compras(){
        include_once 'conexion.php';

        $sql='SELECT * FROM compra_prov WHERE com_status=1';
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute();
        $listaCompras=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaCompras;
        //print_r($listaClientes);
    }


    function D_agg_compras($IdProveedor,$descripcion,$fecha){
        
        include_once 'conexion.php';
        $total = 0;
        $estado = 1;

        try{
            $sql='INSERT INTO compras (prov_id,com_descripcion,com_fecha,com_total,com_status) VALUES (:IdProveedor,:Descripcion, :Fecha, :Total,:Estado)';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':IdProveedor',$IdProveedor);
            $sentencia->bindParam(':Descripcion',$descripcion);
            $sentencia->bindParam(':Fecha',$fecha);
            $sentencia->bindParam(':Total',$total);
            $sentencia->bindParam(':Estado',$estado);
    
            $sentencia->execute();
            return 'ok';

        }catch(Exception $e){
            return 'error al guardar en la base de datos';
        }


    }

    function D_up_compras($IdProveedor,$descripcion,$fecha,$id){
        
        include_once 'conexion.php';
        $total = 0;

        try{
            $sql='UPDATE compras SET prov_id=:IdProveedor,com_descripcion=:Descripcion , com_fecha=:Fecha WHERE com_id=:Id';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);
            $sentencia->bindParam(':IdProveedor',$IdProveedor);
            $sentencia->bindParam(':Descripcion',$descripcion);
            $sentencia->bindParam(':Fecha',$fecha);
    
    
            $sentencia->execute();
            return 'ok';
        }catch(Exeption $e){
            return 'error al editar e la base de datos';
        }



    }

    function D_delete_compras($id){
        
        include_once 'conexion.php';
        $estado = 0;

        try{
            $sql='UPDATE compras SET com_status=:Estado WHERE com_id=:Id';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);
            $sentencia->bindParam(':Estado',$estado);

    
            $sentencia->execute();
            return 'ok';

        }catch(Exception $e){
            return 'error al eliminar en la base de datos';
        }
        

    }


    function D_verificar_compras($id){
        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);


        try{
            $sql='SELECT * FROM compras_detalle WHERE com_id = '.$id.' and comdet_status= 1';

            $sentencia = $pdoAux->query($sql);

            $x=$sentencia->rowCount();
            if($x>0){
                return 'mal'; 
            }else{
                return 'ok';
                
            }
            

        }catch(Exception $e){
            return 'error al verificar la filas en la base de datos'.$e;
        }
    }

?>