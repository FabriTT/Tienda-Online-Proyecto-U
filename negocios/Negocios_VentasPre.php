<?php 
    $txtCliente=(isset($_POST['cliente']))?$_POST['cliente']:"";
    $txtEmpleado=(isset($_POST['empleado']))?$_POST['empleado']:"";
    $txtDescripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";


    $txtId=(isset($_POST['id']))?$_POST['id']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";


    

    switch ($accion) {
        case 'btnGuardar':
            echo "".N_agg_venta($txtEmpleado,$txtCliente,$txtDescripcion);
        break;
        case "btnEliminar":
            echo "".N_delete_venta($txtId);
        break;
    }


    function N_mostrar_ventas(){
        include_once '../datos/Datos_VentasPre.php';
        return D_mostrar_ventas();
    }

    function N_agg_venta($empleado,$cliente,$descripcion){
        include_once '../datos/Datos_VentasPre.php';
        return D_agg_venta($empleado,$cliente,$descripcion);
    }

    function N_delete_venta($id){
        include_once '../datos/Datos_VentasPre.php';
        return D_delete_venta($id);
    }

?>