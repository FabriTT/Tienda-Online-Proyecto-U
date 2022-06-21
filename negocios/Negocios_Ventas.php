<?php


    $txtIdVenta=(isset($_POST['id']))?$_POST['id']:"";
    $txtDescripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $txtEmpleado=(isset($_POST['empleado']))?$_POST['empleado']:"";


    $txtCliente=(isset($_POST['cliente']))?$_POST['cliente']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    $txtventa=(isset($_POST['venta']))?$_POST['venta']:"";
    $txttotal=(isset($_POST['total']))?$_POST['total']:"";

    switch ($accion) {
        case 'btnEditar':
            echo "".N_editar_ventas($txtEmpleado,$txtDescripcion,$txtIdVenta);
            break;
        case 'btnComprar':
            echo "".N_agg_ventas($txtCliente);
            break;
        case 'btnSalir':
            echo "".N_eli_ventas($txtventa,$txttotal);
            break;
        case 'btnAnular':
            $auxiliar=N_verificar_ventas($txtIdVenta);
            if($auxiliar=='ok'){
                echo N_eli_ventas($txtIdVenta,0);
            }else{
                echo "Debe elimnar los detalles de la venta primero";
            }
            break;
        case 'confirmar':
            echo "".N_venta_confirmar($txtventa);
            break;
        case 'reclamar':
            echo "".N_venta_reclamar($txtventa);
            break;
        
    }


    function N_mostrar_ventas(){
        include_once '../datos/Datos_Ventas.php';
        return D_mostrar_ventas();
    }

    function N_mostrar_ventas_x_cliente($id){
        include_once '../datos/Datos_Ventas.php';
        return D_mostrar_ventas_x_cliente($id);
    }


    function N_editar_ventas($empleado,$descripcion,$id){
        include_once '../datos/Datos_Ventas.php';
        return D_editar_ventas($empleado,$descripcion,$id);
    }

    function N_agg_ventas($cliente){
        include_once '../datos/Datos_Ventas.php';
        return D_agg_ventas($cliente);
    }

    function N_mostrar_total($id){
        include_once '../datos/Datos_Ventas.php';
        return D_mostrar_total($id);
    }

    function N_obtener_cliente($id){
        include_once '../datos/Datos_Ventas.php';
        return D_obtener_cliente($id);
    }

    function N_eli_ventas($venta,$total){
        include_once '../datos/Datos_Ventas.php';
        return D_eli_ventas($venta,$total);
    }

    function N_verificar_ventas($id){
        include_once '../datos/Datos_Ventas.php';
        return D_verificar_ventas($id);
    }

    function N_venta_confirmar($id){
        include_once '../datos/Datos_Ventas.php';
        return D_venta_confirmar($id);
    }

    function N_venta_reclamar($id){
        include_once '../datos/Datos_Ventas.php';
        return D_venta_reclamar($id);
    }
    

?>