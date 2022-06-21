<?php
    function D_mostrar_ventas(){
        include_once 'conexion.php';

        $sql="SELECT * from venta_cli_emp WHERE ven_status=1 and car_id != 'REP' ORDER BY 1";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute();
        $listaVentas=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaVentas;
        //print_r($listaClientes);


    }

    function D_agg_venta($empleado,$cliente,$descripcion){
        include_once 'conexion.php';

        try{
            $sql='CALL insertar_venta2(?,?,?)';
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($empleado,$cliente,$descripcion));
            
            return 'ok';
        }catch(Exception $e){
            return 'error en la base de datos al guardar la venta'.$e;
        }


    }

    function D_delete_venta($id){
        include_once 'conexion.php';

        try{
            $sql='UPDATE ventas SET ven_status=0 WHERE ven_id=?';
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($id));
            
            return 'ok';
        }catch(Exception $e){
            return 'error en la base de datos al eliminar la venta'.$e;
        }


    }
?>