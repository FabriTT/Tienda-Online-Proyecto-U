<?php
    function D_mostrar_ventas(){
        include_once 'conexion.php';

        $sql="SELECT * from venta_cli_emp WHERE ven_status=1 AND car_id='REP' OR car_id is null ORDER BY 1";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute();
        $listaVentas=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaVentas;
        //print_r($listaClientes);


    }

    function D_mostrar_ventas_x_cliente($id){
        include_once 'conexion.php';

        $sql='SELECT * from venta_cli_emp WHERE cli_id=? AND ven_status=1';
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($id));
        $listaVentas=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaVentas;
        //print_r($listaClientes);


    }

    function D_mostrar_total($id){

        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);

        $sql='SELECT ven_total FROM ventas WHERE ven_id=?';
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->execute(array($id));
        $Datos=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        foreach($Datos as $total){
            return $total['ven_total'];
        }
        
        //print_r($listaClientes);
    }

    function D_obtener_cliente($id){

        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);

        $sql='SELECT cli_id FROM venta_cli_emp WHERE ven_id=?';
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->execute(array($id));
        $Datos=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        foreach($Datos as $total){
            return $total['cli_id'];
        }
        
        //print_r($listaClientes);
    }

    

    function D_editar_ventas($empleado,$descripcion,$id){
        include_once 'conexion.php';

        try{
            $sql='CALL edit_venta(?,?,?)';
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($empleado,$descripcion,$id));
            
            return 'ok';
        }catch(Exception $e){
            return 'error en la base de datos al editar la venta'.$e;
        }
        

    }


    function D_agg_ventas($cliente){
        include_once 'conexion.php';

        try{
            $sql='CALL insertar_venta(?)';
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($cliente));
            $Venta=$sentencia->fetchAll(PDO::FETCH_ASSOC); 
            
            foreach($Venta as $dato){
                return $dato['ven_id'];
            }
        }catch(Exception $e){
            return 'error en la base de datos al editar la venta'.$e;
        }
    }


    function D_eli_ventas($venta,$total){
        include_once 'conexion.php';

        try{
            $sql='CALL eliminar_venta(?,?)';
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($venta,$total));
            $Venta=$sentencia->fetchAll(PDO::FETCH_ASSOC); 
            
            return 'ok';
        }catch(Exception $e){
            return 'error en la base de datos al editar la venta'.$e;
        }
    }


    function D_verificar_ventas($id){
        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);


        try{
            $sql='SELECT * FROM ventas_detalle WHERE ven_id = '.$id.' and vendet_status= 1';

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

    function D_venta_confirmar($id){
        include_once 'conexion.php';

        try{
            $sql="UPDATE ventas SET ven_confirmacion='OK' WHERE ven_id=?";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($id));
            $Venta=$sentencia->fetchAll(PDO::FETCH_ASSOC); 
            
            return 'ok';
        }catch(Exception $e){
            return 'error en la base de datos al editar la venta'.$e;
        }
    }

    function D_venta_reclamar($id){
        include_once 'conexion.php';

        try{
            $sql="UPDATE ventas SET ven_confirmacion='RECLAMO' WHERE ven_id=?";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($id));
            $Venta=$sentencia->fetchAll(PDO::FETCH_ASSOC); 
            
            return 'ok';
        }catch(Exception $e){
            return 'error en la base de datos al editar la venta'.$e;
        }
    }


?>