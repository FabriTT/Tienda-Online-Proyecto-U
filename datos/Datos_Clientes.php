<?php



    function D_clientes($nombre,$paterno,$materno,$nick,$contra,$carnet,$fecha,$correo,$telefono,$direccion){
        
        include_once 'conexion.php';
        $estado = 1;

        try{
            $sql='INSERT INTO clientes (cli_nombre,cli_paterno,cli_materno,cli_nickname,cli_password,cli_ci,cli_fecha_n,cli_correo,cli_telefono,cli_direccion,cli_status) VALUES (:Nombre,:ApellidoP,:ApellidoM,:Nick,:Contra,:Carnet,:Fecha,:Correo,:Telefono,:Direccion,:Estado) ';
            $sentencia = $pdo->prepare($sql);
            $sentencia->bindParam(':Nombre',$nombre);
            $sentencia->bindParam(':ApellidoP',$paterno);
            $sentencia->bindParam(':ApellidoM',$materno);
            $sentencia->bindParam(':Nick',$nick);
            $sentencia->bindParam(':Contra',$contra);
            $sentencia->bindParam(':Carnet',$carnet);
            $sentencia->bindParam(':Fecha',$fecha);
            $sentencia->bindParam(':Correo',$correo);
            $sentencia->bindParam(':Telefono',$telefono);
            $sentencia->bindParam(':Direccion',$direccion);
            $sentencia->bindParam(':Estado',$estado);
            $sentencia->execute();

            return 'ok';
        }catch(Exception $e){
            return 'Error al momento de guardar en la base de datos';
        }
        

    }

    function D_mostrar_clientes(){
        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoAux = new PDO($link,$usuario,$pass);

        $sql='SELECT * FROM clientes';
        $sentencia = $pdoAux->prepare($sql);
        $sentencia->execute();
        $listaClientes=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaClientes;
        //print_r($listaClientes);


    }

    function D_buscar_cliente($id){
        include_once 'conexion.php';

        $sql='SELECT * FROM clientes WHERE cli_id = ?';
        $sentencia = $pdo->prepare($sql);
        $sentencia->execute(array($id));
        $listaClientes=$sentencia->fetchAll(PDO::FETCH_ASSOC); 

        return $listaClientes;
        //print_r($listaClientes);
    }




    function D_up_clientes($nombre,$paterno,$materno,$nick,$carnet,$fecha,$correo,$telefono,$direccion,$id){
        
        include_once 'conexion.php';

        try {
            $sql='UPDATE clientes SET cli_nombre=:Nombre ,cli_paterno=:ApellidoP,cli_materno=:ApellidoM,cli_nickname=:Nick,cli_ci=:Carnet,cli_fecha_n=:Fecha,cli_telefono=:Telefono,cli_correo=:Correo,cli_direccion=:Direccion WHERE cli_id=:Id';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);
            $sentencia->bindParam(':Nombre',$nombre);
            $sentencia->bindParam(':ApellidoP',$paterno);
            $sentencia->bindParam(':ApellidoM',$materno);
            $sentencia->bindParam(':Nick',$nick);
            $sentencia->bindParam(':Carnet',$carnet);
            $sentencia->bindParam(':Fecha',$fecha);
            $sentencia->bindParam(':Correo',$correo);
            $sentencia->bindParam(':Telefono',$telefono);
            $sentencia->bindParam(':Direccion',$direccion);
    
            $sentencia->execute();
            return 'ok';
            
        } catch (Exception $e) {
            return 'Error al editar en la base de datos'.$e;
        }

       

    }


    function D_uppass_clientes($nombre,$paterno,$materno,$nick,$contra,$carnet,$fecha,$correo,$telefono,$direccion,$id){
        
        include_once 'conexion.php';

        try {
            $sql='UPDATE clientes SET cli_nombre=:Nombre ,cli_paterno=:ApellidoP,cli_materno=:ApellidoM,cli_nickname=:Nick,cli_password=:Contra,cli_ci=:Carnet,cli_fecha_n=:Fecha,cli_telefono=:Telefono,cli_correo=:Correo,cli_direccion=:Direccion WHERE cli_id=:Id';

            $sentencia = $pdo->prepare($sql);
    
            $sentencia->bindParam(':Id',$id);
            $sentencia->bindParam(':Nombre',$nombre);
            $sentencia->bindParam(':ApellidoP',$paterno);
            $sentencia->bindParam(':ApellidoM',$materno);
            $sentencia->bindParam(':Nick',$nick);
            $sentencia->bindParam(':Contra',$contra);
            $sentencia->bindParam(':Carnet',$carnet);
            $sentencia->bindParam(':Fecha',$fecha);
            $sentencia->bindParam(':Correo',$correo);
            $sentencia->bindParam(':Telefono',$telefono);
            $sentencia->bindParam(':Direccion',$direccion);
    
            $sentencia->execute();
            return 'ok';
            
        } catch (Exception $e) {
            return 'Error al editar con contraseña en la base de datos';
        }

       

    }


    function D_delete_clientes($nickname,$password){
        
        include_once 'conexion.php';

        
        try{
            $sql="CALL eliminar_cli(?,?)";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($nickname,$password));

            $resultado = $sentencia->fetchall();

            foreach($resultado as $respuesta){
                return $respuesta[0];
            }
            
        }catch(Exception $e){
            return "Error al realizar el proceso de eliminacion";
        }
        
 

    }
    
    

    
?>