<?php
    function D_grafica_ventas($inicio,$fin){
        include_once 'conexion.php';

        try{
            $sql='CALL total_x_fecha (?,?)';
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($inicio,$fin));
    
            $listaFechas=$sentencia->fetchAll(PDO::FETCH_ASSOC); 
    
            return $listaFechas;
        }catch(Exception $e){
            return 'error en la base de datos';
        }
       
        //print_r($listaClientes);
    }

    function D_grafica_compras($inicio,$fin){
        include_once 'conexion.php';

        try{
            $sql='CALL total_x_fecha2 (?,?)';
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($inicio,$fin));
    
            $listaFechas2=$sentencia->fetchAll(PDO::FETCH_ASSOC); 
    
            return $listaFechas2;
        }catch(Exception $e){
            return 'error en la base de datos';
        }
       
        //print_r($listaClientes);
    }

?>