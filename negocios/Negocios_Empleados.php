<?php

 
    $txtNombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
    $txtPaterno=(isset($_POST['paterno']))?$_POST['paterno']:"";
    $txtMaterno=(isset($_POST['materno']))?$_POST['materno']:"";
    $txtPassword=(isset($_POST['contra']))?$_POST['contra']:"";
    $txtCarnet=(isset($_POST['carnet']))?$_POST['carnet']:"";
    $txtFecha=(isset($_POST['fecha']))?$_POST['fecha']:"";
    $txtCargo=(isset($_POST['cargo']))?$_POST['cargo']:"";
    $txtTelefono=(isset($_POST['telefono']))?$_POST['telefono']:"";
    $txtCorreo=(isset($_POST['correo']))?$_POST['correo']:"";

    $txtId=(isset($_POST['id']))?$_POST['id']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    switch ($accion) {
        case 'btnGuardar':
            echo "".N_agg_empleados($txtNombre,$txtPaterno,$txtMaterno,$txtPassword,(int)$txtCarnet,$txtFecha,$txtCorreo,(int)$txtTelefono,$txtCargo);

            break;
        case 'btnEditar':
            if($txtPassword==''){
                echo "".N_up_empleados($txtNombre,$txtPaterno,$txtMaterno,(int)$txtCarnet,$txtFecha,$txtCorreo,(int)$txtTelefono,$txtCargo,(int)$txtId);
            }else{
                echo "".N_uppass_empleados($txtNombre,$txtPaterno,$txtMaterno,$txtPassword,(int)$txtCarnet,$txtFecha,$txtCorreo,(int)$txtTelefono,$txtCargo,(int)$txtId);
            }
            break;
        case "btnEliminar":
            echo "".N_delete_empleados((int)$txtId);
            break;
        case "desocupar":
            echo "".N_desocupar_empleados($txtId);
            break;
        case "ocupar":
            echo "".N_ocupar_empleados($txtId);
            break;
    }

    

    function N_mostrar_empleados(){
        include_once '../datos/Datos_Empleados.php';
        return D_mostrar_empleados();
    }


    function N_mostrar_empleados2(){
        include_once '../datos/Datos_Empleados.php';
        return D_mostrar_empleados2();
    }

    function N_mostrar_empleados3(){
        include_once '../datos/Datos_Empleados.php';
        return D_mostrar_empleados3();
    }

    function N_buscar_empleado($id){
        include_once '../datos/Datos_Empleados.php';
        return D_buscar_empleado($id);
    }

    function N_agg_empleados($nombre,$paterno,$materno,$pass,$carnet,$fecha,$correo,$telefono,$cargo){

        include_once '../datos/Datos_Empleados.php';
        return D_agg_empleados($nombre,$paterno,$materno,$cargo.$carnet,sha1($pass),$carnet,$fecha,$cargo,$correo,$telefono);
    }

    function N_up_empleados($nombre,$paterno,$materno,$carnet,$fecha,$correo,$telefono,$cargo,$id){

        include_once '../datos/Datos_Empleados.php';
        return D_up_empleados($nombre,$paterno,$materno,$cargo.$carnet,$carnet,$fecha,$cargo,$correo,$telefono,$id);
    }

    function N_uppass_empleados($nombre,$paterno,$materno,$pass,$carnet,$fecha,$correo,$telefono,$cargo,$id){

        include_once '../datos/Datos_Empleados.php';
        return D_uppass_empleados($nombre,$paterno,$materno,$cargo.$carnet,sha1($pass),$carnet,$fecha,$cargo,$correo,$telefono,$id);
    }

    function N_delete_empleados($id){

        include_once '../datos/Datos_Empleados.php';
        return D_delete_empleados($id);
    }

    function N_desocupar_empleados($id){

        include_once '../datos/Datos_Empleados.php';
        return D_desocupar_empleados($id);
    }

    function N_ocupar_empleados($id){

        include_once '../datos/Datos_Empleados.php';
        return D_ocupar_empleados($id);
    }
    
?>