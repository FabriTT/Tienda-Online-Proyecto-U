<?php

    function D_mostrar_productos(){
        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);

        $sql='SELECT * FROM pro_especifico WHERE pro_status=1 ORDER BY 1';
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->execute();
        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaProductos;
        //print_r($listaClientes);

    }


    function D_mostrar_productos_stock(){
        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);

        $sql='SELECT * FROM pro_especifico WHERE pro_status=1 AND pro_stock>2 ORDER BY 1';
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->execute();
        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaProductos;
        //print_r($listaClientes);

    }


    function D_mostrar_producto_x_prov($proveedor){
        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);

        $sql='SELECT * FROM pro_especifico WHERE pro_status=1 and prov_id = :Proveedor';
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->bindParam(':Proveedor',$proveedor);
        $sentencia->execute();
        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaProductos;
        //print_r($listaClientes);

    }

    function D_mostrar_pro_auditoria(){
        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);

        $sql="SELECT * FROM pro_auditoria order by 1";
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->execute();
        $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaProductos;
        //print_r($listaClientes);

    }




    function D_mostrar_clasificaciones(){
        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);

        $sql='SELECT * FROM clasificaciones WHERE cla_status=1';
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->execute();
        $listaClasificaciones=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaClasificaciones;


    }




    function D_agg_productos($proveedor,$clasificacion,$descripcion,$stock,$precio_com,$precio_ven){
        
        include_once 'conexion.php';
        $estado=1;
        try{
            $sql='INSERT INTO productos(prov_id,cla_id,pro_descripcion,pro_stock,pro_precio_com,pro_precio_ven,pro_status) VALUES(:Clasificacion,:Proveedor,:Descripcion,:Stock,:PrecioCom,:PrecioVen,:Estado)';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Clasificacion',$clasificacion);
            $sentencia->bindParam(':PrecioCom',$precio_com);
            $sentencia->bindParam(':PrecioVen',$precio_ven);
            $sentencia->bindParam(':Descripcion',$descripcion);
            $sentencia->bindParam(':Stock',$stock);
            $sentencia->bindParam(':Proveedor',$proveedor);
            $sentencia->bindParam(':Estado',$estado);
    
            $sentencia->execute();
            return 'ok';
        }catch(Exception $e){
            return 'error al guardar en la base de datos'.$e;
        }
       

    }

    function D_up_productos($clasificacion,$proveedor,$descripcion,$stock,$precio_com,$precio_ven,$id){
        
        include_once 'conexion.php';

        try{
            $sql='UPDATE productos SET cla_id=:Clasificacion, prov_id=:Proveedor, pro_descripcion=:Descripcion , pro_stock=:Stock, pro_precio_com=:PrecioCom ,pro_precio_ven=:PrecioVen WHERE pro_id=:Id';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);
            $sentencia->bindParam(':Clasificacion',$clasificacion);
            $sentencia->bindParam(':Proveedor',$proveedor);
            $sentencia->bindParam(':Descripcion',$descripcion);
            $sentencia->bindParam(':Stock',$stock);
            $sentencia->bindParam(':PrecioCom',$precio_com);
            $sentencia->bindParam(':PrecioVen',$precio_ven);
    
    
            $sentencia->execute();

            return 'ok';
        }catch(Exception $e){
            return 'Error al editar en la base de datos'.$e;
        }

        

    }

    function D_delete_productos($id){
        
        include_once 'conexion.php';
        $estado=0;

        try{
            $sql='UPDATE productos SET pro_status=:Estado WHERE pro_id=:Id';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);
            $sentencia->bindParam(':Estado',$estado);
    
            $sentencia->execute();
            return 'ok';
        }catch(Exception $e){
            return 'error al eliminar de la base de datos';
        }
       

    }

?>