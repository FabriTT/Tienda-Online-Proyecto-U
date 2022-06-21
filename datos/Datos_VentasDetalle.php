<?php
    function D_mostrar_VentasDetalle($id){
        include_once 'conexion.php';

        $sql='SELECT * FROM venta_detalle_pro WHERE ven_id=:Id AND vendet_status=1';
        $sentencia = $pdo->prepare($sql);

        $sentencia->bindParam(':Id',$id);

        $sentencia->execute();
        $listaVentasDet=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaVentasDet;
        //print_r($listaClientes);

    }



    function D_agg_VentasDetalle($venta,$producto,$cantidad){
        include_once 'conexion.php';

        try{
            $sql='CALL agregar_vendet(?,?,?)';
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($venta,$producto,$cantidad));
            
            return 'ok';
        }catch(Exception $e){
            return 'error'.$e;
        }
        
    }

    function D_eli_VentasDetalle($id){
        include_once 'conexion.php';

        try{
            $sql='CALL eliminar_vendet(?)';
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($id));
            
            return 'ok';
        }catch(Exception $e){
            return 'error'.$e;
        }
        
    }
?>