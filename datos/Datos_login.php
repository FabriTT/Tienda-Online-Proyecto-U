<?php

    


    function D_val_login($nickname,$password){
        
        include_once 'conexion.php';

        

        $sql="CALL val_login(?,?)";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($nickname,$password));

        $resultado = $sentencia->fetchall();

        foreach($resultado as $dato){
           return $dato;
        }
        

    }


    function D_val_correo($correo){
        
        include_once 'conexion.php';

        $sql="CALL val_correo(?)";
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($correo));

        $resultado = $sentencia->fetchall();

        foreach($resultado as $dato){
           return $dato;
        }  

    }

    function D_newcontra_cli($contra,$id){
        
        include_once 'conexion.php';
        try{
            $sql="UPDATE clientes SET cli_password=:Contra WHERE cli_id=:Id";
            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Contra',$contra);
            $sentencia->bindParam(':Id',$id);
    
            $sentencia->execute();
            return 'okey';
    
        }catch(Exception $e){
            return 'Error al momento de guardar en la base de datos';
        }
        
    }

    function D_newcontra_emp($contra,$id){
        
        include_once 'conexion.php';
        try{
            $sql="UPDATE empleados SET emp_password=:Contra WHERE emp_id=:Id";
            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Contra',$contra);
            $sentencia->bindParam(':Id',$id);
    
            $sentencia->execute();
            return 'okey';
    
        }catch(Exception $e){
            return 'Error al momento de guardar en la base de datos';
        }
        
    }

    
    
?>
