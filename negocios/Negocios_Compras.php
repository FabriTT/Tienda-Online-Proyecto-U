<?php

    $txtIdProveedor=(isset($_POST['compania']))?$_POST['compania']:"";
    $txtDescripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $txtFecha=(isset($_POST['fecha']))?$_POST['fecha']:"";


    $txtId=(isset($_POST['id']))?$_POST['id']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    
    switch ($accion) {
        case 'btnGuardar':
            echo N_agg_compras((int)$txtIdProveedor,$txtDescripcion,$txtFecha);
            break;

        case 'btnEditar':
            echo N_up_compras((int)$txtIdProveedor,$txtDescripcion,$txtFecha,(int)$txtId);
            break;

        case "btnEliminar":
            $x = N_verificar_compras((int)$txtId);
            if($x=='ok'){
                echo N_delete_compras($txtId);
            }else{
                echo 'Primero debe eliminar los detalles de la compra';
            }
            break;
    }



    function N_mostrar_compras(){
        include_once '../datos/Datos_Compras.php';
        return D_mostrar_compras();
    }

    function N_agg_compras($IdProveedor,$txtDescripcion,$fecha){

        include_once '../datos/Datos_Compras.php';
        return D_agg_compras($IdProveedor,$txtDescripcion,$fecha);
    }

    function N_up_compras($IdProveedor,$txtDescripcion,$fecha,$id){

        include_once '../datos/Datos_Compras.php';
        return D_up_compras($IdProveedor,$txtDescripcion,$fecha,$id);
    }

    function N_delete_compras($id){

        include_once '../datos/Datos_Compras.php';
        return D_delete_compras($id);
    }

    function N_verificar_compras($id){

        include_once '../datos/Datos_Compras.php';
        return D_verificar_compras($id);
    }

?>