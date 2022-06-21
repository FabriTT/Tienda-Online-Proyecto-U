<?php
    


    $Nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
    $Paterno=(isset($_POST['paterno']))?$_POST['paterno']:"";
    $Materno=(isset($_POST['materno']))?$_POST['materno']:"";
    $Contra=(isset($_POST['contra']))?$_POST['contra']:"";
    $Carnet=(isset($_POST['carnet']))?$_POST['carnet']:"";
    $Fecha=(isset($_POST['fecha']))?$_POST['fecha']:"";
    $Correo=(isset($_POST['correo']))?$_POST['correo']:"";
    $Telefono=(isset($_POST['telefono']))?$_POST['telefono']:"";
    $Direccion=(isset($_POST['direccion']))?$_POST['direccion']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    $txtUsuario=(isset($_POST['usuario']))?$_POST['usuario']:"";


    switch ($accion) {
        case 'btnGuardar':
            $resultado = N_clientes($Nombre,$Paterno,$Materno,$Contra,$Carnet,$Fecha,$Correo,$Telefono,$Direccion);
            echo $resultado;
        
            break;
        case 'btnEditar':
            if($Contra==''){
                echo "".N_up_clientes($Nombre,$Paterno,$Materno,$Carnet,$Fecha,$Correo,$Telefono,$Direccion,$txtId);
            }else{
                echo "".N_uppass_clientes($Nombre,$Paterno,$Materno,$Contra,$Carnet,$Fecha,$Correo,$Telefono,$Direccion,$txtId);
            }
            break;
        case "btnEliminar":
            echo "".N_delete_clientes($txtUsuario,$Contra);
            break;
    }


    function N_clientes($nombre,$paterno,$materno,$pass,$carnet,$fecha,$correo,$telefono,$direccion){

        include_once '../datos/Datos_Clientes.php';
        return D_clientes($nombre,$paterno,$materno,"CLI".$carnet,sha1($pass),$carnet,$fecha,$correo,$telefono,$direccion);
    }

    function N_mostrar_clientes(){
        include_once '../datos/Datos_Clientes.php';
        return D_mostrar_clientes();
    }

    function N_buscar_cliente($id){
        include_once '../datos/Datos_Clientes.php';
        return D_buscar_cliente($id);
    }

    function N_up_clientes($nombre,$paterno,$materno,$carnet,$fecha,$correo,$telefono,$direccion,$id){

        include_once '../datos/Datos_Clientes.php';
        return D_up_clientes($nombre,$paterno,$materno,'CLI'.$carnet,$carnet,$fecha,$correo,$telefono,$direccion,$id);
    }

    function N_uppass_clientes($nombre,$paterno,$materno,$pass,$carnet,$fecha,$correo,$telefono,$direccion,$id){

        include_once '../datos/Datos_Clientes.php';
        return D_uppass_clientes($nombre,$paterno,$materno,'CLI'.$carnet,sha1($pass),$carnet,$fecha,$correo,$telefono,$direccion,$id);
    }

    function N_delete_clientes($usuario,$pass){

        include_once '../datos/Datos_Clientes.php';
        return D_delete_clientes($usuario,sha1($pass));
    }

?>