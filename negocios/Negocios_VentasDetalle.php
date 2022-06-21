<?php

    $txtVenta=(isset($_POST['venta']))?$_POST['venta']:"";

    $txtProducto=(isset($_POST['producto']))?$_POST['producto']:"";

    $txtCantidad=(isset($_POST['cantidad']))?$_POST['cantidad']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    $txtId=(isset($_POST['id']))?$_POST['id']:"";






    switch ($accion) {
        case 'btnGuardar':
            echo "".N_agg_VentasDetalle($txtVenta,$txtProducto,$txtCantidad);
            
        break;
        case 'btnEliminar':
            echo "".N_eli_VentasDetalle($txtId);
        break;
    }



    function N_mostrar_VentasDetalle($id){
        include_once '../datos/Datos_VentasDetalle.php';
        return D_mostrar_VentasDetalle($id);
    }

    function N_agg_VentasDetalle($venta,$producto,$cantidad){
        include_once '../datos/Datos_VentasDetalle.php';
        return D_agg_VentasDetalle($venta,$producto,$cantidad);
    }

    function N_eli_VentasDetalle($id){
        include_once '../datos/Datos_VentasDetalle.php';
        return D_eli_VentasDetalle($id);
    }


?>