<?php

    $txtIdCompra=(isset($_POST['compra']))?$_POST['compra']:"";
    $txtCantidad=(isset($_POST['cantidad']))?$_POST['cantidad']:"";
    $txtIdProducto=(isset($_POST['producto']))?$_POST['producto']:"";


    $txtId=(isset($_POST['id']))?$_POST['id']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    
    switch ($accion) {
        case 'btnGuardar':
            echo N_guardar_ComprasDetalle($txtIdCompra,$txtIdProducto,$txtCantidad);
            break;


        case "btnEliminar":
            echo N_eliminar_ComprasDetalle($txtId);
            break;
    }

    function N_mostrar_ComprasDetalle($id){
        include_once '../datos/Datos_ComprasDetalle.php';
        return D_mostrar_ComprasDetalle($id);
    }


    function N_guardar_ComprasDetalle($compra,$producto,$cantidad){
        include_once '../datos/Datos_ComprasDetalle.php';
        return D_guardar_ComprasDetalle($compra,$producto,$cantidad);
    }

    function N_eliminar_ComprasDetalle($id){
        include_once '../datos/Datos_ComprasDetalle.php';
        return D_eliminar_ComprasDetalle($id);
    }


?>