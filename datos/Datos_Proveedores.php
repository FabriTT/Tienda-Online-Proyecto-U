<?php
    function D_mostrar_proveedores(){
        
        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);
        $sql='SELECT * FROM proveedores WHERE prov_status=1';
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->execute();
        $listaProveedores=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaProveedores;
        //print_r($listaClientes);


    }

    function D_agg_proveedores($compania,$descripcion,$direccion,$telefono){
        
        include_once 'conexion.php';
        $estado=1;

        try {
            $sql='INSERT INTO proveedores (prov_compania,prov_descripcion,prov_direccion,prov_telefono,prov_status) VALUES (:Compania, :Descripcion, :Direccion, :Telefono,:Estado)';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Compania',$compania);
            $sentencia->bindParam(':Descripcion',$descripcion);
            $sentencia->bindParam(':Direccion',$direccion);
            $sentencia->bindParam(':Telefono',$telefono);
            $sentencia->bindParam(':Estado',$estado);
    
            $sentencia->execute();
            return 'ok';
        } catch (Exception $e) {
            return 'error al guardar en la base de datos';
        }
       

    }

    function D_up_proveedores($compania,$descripcion,$direccion,$telefono,$id){
        
        include_once 'conexion.php';
        try {
            
            $sql='UPDATE proveedores SET prov_compania=:Compania , prov_descripcion=:Descripcion, prov_direccion=:Direccion, prov_telefono=:Telefono WHERE prov_id=:Id';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);
            $sentencia->bindParam(':Compania',$compania);
            $sentencia->bindParam(':Descripcion',$descripcion);
            $sentencia->bindParam(':Direccion',$direccion);
            $sentencia->bindParam(':Telefono',$telefono);
    
    
            $sentencia->execute();
            return 'ok';
        } catch (Exception $e) {
            return 'errror al editar en la base de datos';
        }



    }

    function D_delete_proveedores($id){
        
        include_once 'conexion.php';
        $estado=0;
        try {
            $sql='UPDATE proveedores SET prov_status=:Estado WHERE prov_id=:Id';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);
            $sentencia->bindParam(':Estado',$estado);

            $sentencia->execute();
            return 'ok';
        } catch (Exception $e) {
            return 'error al eliminar en la base de datos';
        }

       

    }

?>