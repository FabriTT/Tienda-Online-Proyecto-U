<?php
    function D_mostrar_empleados(){
        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);

        $sql='SELECT * FROM empleado_car WHERE emp_status=1';
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->execute();
        $listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaEmpleados;
        //print_r($listaClientes);
    }



    function D_mostrar_empleados2(){
        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);

        $sql="SELECT * FROM empleado_car WHERE emp_status=1 and car_id='REP' and emp_atareado='LIBRE'";
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->execute();
        $listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaEmpleados;
        //print_r($listaClientes);
    }


    function D_mostrar_empleados3(){
        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);

        $sql="SELECT * FROM empleado_car WHERE emp_status=1 and car_id ='ECV' or car_id='SUDO'";
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->execute();
        $listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaEmpleados;
        //print_r($listaClientes);
    }





    function D_buscar_empleado($id){
        include_once 'conexion.php';

        $sql='SELECT * FROM empleado_car WHERE emp_id = ?';
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($id));
        $listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaEmpleados;
        //print_r($listaClientes);
    }


    
    function D_agg_empleados($nombre,$paterno,$materno,$nick,$contra,$carnet,$fecha,$cargo,$correo,$telefono){
        
        include_once 'conexion.php';
        $estado=1;
        try {
            $sql='INSERT INTO empleados (car_id,emp_nombre,emp_paterno,emp_materno,emp_nickname,emp_password,emp_ci,emp_fecha_n,emp_correo,emp_telefono,emp_status) VALUES (:Cargo, :Nombre, :ApellidoP, :ApellidoM, :Nick, :Contra, :Carnet, :Fecha, :Correo, :Telefono ,:Estado)';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Cargo',$cargo);
            $sentencia->bindParam(':Nombre',$nombre);
            $sentencia->bindParam(':ApellidoP',$paterno);
            $sentencia->bindParam(':ApellidoM',$materno);
            $sentencia->bindParam(':Nick',$nick);
            $sentencia->bindParam(':Contra',$contra);
            $sentencia->bindParam(':Carnet',$carnet);
            $sentencia->bindParam(':Fecha',$fecha);
            $sentencia->bindParam(':Correo',$correo);
            $sentencia->bindParam(':Telefono',$telefono);
            $sentencia->bindParam(':Estado',$estado);
    
            $sentencia->execute();
            return 'ok';
            
        } catch (Exception $e) {
            return 'error al guardar en la base de datos';
        }
       

    }

    function D_up_empleados($nombre,$paterno,$materno,$nick,$carnet,$fecha,$cargo,$correo,$telefono,$id){
        
        include_once 'conexion.php';

        try {
            $sql='UPDATE empleados SET emp_nombre=:Nombre ,emp_paterno=:ApellidoP,emp_materno=:ApellidoM,emp_nickname=:Nick,emp_ci=:Carnet,emp_fecha_n=:Fecha,car_id=:Cargo,emp_telefono=:Telefono,emp_correo=:Correo WHERE emp_id=:Id';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);
            $sentencia->bindParam(':Cargo',$cargo);
            $sentencia->bindParam(':Nombre',$nombre);
            $sentencia->bindParam(':ApellidoP',$paterno);
            $sentencia->bindParam(':ApellidoM',$materno);
            $sentencia->bindParam(':Nick',$nick);
            $sentencia->bindParam(':Carnet',$carnet);
            $sentencia->bindParam(':Fecha',$fecha);
            $sentencia->bindParam(':Correo',$correo);
            $sentencia->bindParam(':Telefono',$telefono);
    
            $sentencia->execute();
            return 'ok';
            
        } catch (Exception $e) {
            return 'Error al editar en la base de datos'.$e;
        }

       

    }


    function D_uppass_empleados($nombre,$paterno,$materno,$nick,$contra,$carnet,$fecha,$cargo,$correo,$telefono,$id){
        
        include_once 'conexion.php';

        try {
            $sql='UPDATE empleados SET emp_nombre=:Nombre ,emp_paterno=:ApellidoP,emp_materno=:ApellidoM,emp_nickname=:Nick,emp_password=:Contra,emp_ci=:Carnet,emp_fecha_n=:Fecha,car_id=:Cargo,emp_telefono=:Telefono,emp_correo=:Correo WHERE emp_id=:Id';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);
            $sentencia->bindParam(':Cargo',$cargo);
            $sentencia->bindParam(':Nombre',$nombre);
            $sentencia->bindParam(':ApellidoP',$paterno);
            $sentencia->bindParam(':ApellidoM',$materno);
            $sentencia->bindParam(':Nick',$nick);
            $sentencia->bindParam(':Contra',$contra);
            $sentencia->bindParam(':Carnet',$carnet);
            $sentencia->bindParam(':Fecha',$fecha);
            $sentencia->bindParam(':Correo',$correo);
            $sentencia->bindParam(':Telefono',$telefono);
    
            $sentencia->execute();
            return 'ok';
            
        } catch (Exception $e) {
            return 'Error al editar con contraseña en la base de datos';
        }

       

    }

    function D_delete_empleados($id){
        
        include_once 'conexion.php';
        $estado=0;

        try {
            $sql='UPDATE empleados SET emp_status=:Estado WHERE emp_id=:Id';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);
            $sentencia->bindParam(':Estado',$estado);
    
            $sentencia->execute();
            return 'ok';
            
        } catch (Exception $e) {
            return 'error al eliminar en la base de datos';
        }


    }
    
    
    function D_desocupar_empleados($id){
        include_once 'conexion.php';

        try {
            $sql="UPDATE empleados SET emp_atareado='LIBRE' WHERE emp_id=:Id";

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);

    
            $sentencia->execute();
            return 'ok';
            
        } catch (Exception $e) {
            return 'error al eliminar en la base de datos';
        }

    }

    function D_ocupar_empleados($id){
        include_once 'conexion.php';

        try {
            $sql="UPDATE empleados SET emp_atareado='OCUPADO' WHERE emp_id=:Id";

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);

    
            $sentencia->execute();
            return 'ok';
            
        } catch (Exception $e) {
            return 'error al eliminar en la base de datos';
        }

    }

?>