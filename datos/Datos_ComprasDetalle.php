<?php
    function D_mostrar_ComprasDetalle($id){
        include_once 'conexion.php';

        $sql='SELECT * FROM compra_detalle_pro WHERE com_id=:Id AND comdet_status=1';
        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':Id',$id);

        $sentencia->execute();
        $listaComprasDet=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaComprasDet;
        //print_r($listaClientes);

    }



    function D_guardar_ComprasDetalle($compra,$producto,$cantidad){
        include_once 'conexion.php';

        try{

            $sql='CALL agregar_comdet(:Compra,:Producto,:Cantidad)';
            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Compra',$compra);
            $sentencia->bindParam(':Producto',$producto);
            $sentencia->bindParam(':Cantidad',$cantidad);
    
            $sentencia->execute();
            return 'ok';
        }catch(Exception $e){
            return 'error al momento de guardar en la base de datos';
        }

    }



    function D_eliminar_ComprasDetalle($id){
        include_once 'conexion.php';

        try{

            $sql='CALL eliminar_comdet(:Id)';
            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);

    
            $sentencia->execute();
            return 'ok';
        }catch(Exception $e){
            return 'error al momento de eliminar en la base de datos';
        }

    }
?>