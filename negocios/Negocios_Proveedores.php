<?php

    
    $txtCompania=(isset($_POST['compania']))?$_POST['compania']:"";
    $txtDescripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $txtDireccion=(isset($_POST['direccion']))?$_POST['direccion']:"";
    $txtTelefono=(isset($_POST['telefono']))?$_POST['telefono']:"";

    $txtId=(isset($_POST['id']))?$_POST['id']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    switch ($accion) {
        case 'btnGuardar':
            echo "".N_agg_proveedores($txtCompania,$txtDescripcion,$txtDireccion,(int)$txtTelefono);
            break;
        case 'btnEditar':
            echo "".N_up_proveedores($txtCompania,$txtDescripcion,$txtDireccion,$txtTelefono,$txtId);

            break;
        case "btnEliminar":
            echo "".N_delete_proveedores((int)$txtId);

            break;
    }







    function N_mostrar_proveedores(){
        include_once '../datos/Datos_Proveedores.php';
        return D_mostrar_proveedores();
    }

    function N_agg_proveedores($compania,$descripcion,$direccion,$telefono){

        include_once '../datos/Datos_Proveedores.php';
        return D_agg_proveedores($compania,$descripcion,$direccion,$telefono);
    }

    function N_up_proveedores($compania,$descripcion,$direccion,$telefono,$id){

        include_once '../datos/Datos_Proveedores.php';
        return D_up_proveedores($compania,$descripcion,$direccion,$telefono,$id);
    }

    function N_delete_proveedores($id){

        include_once '../datos/Datos_Proveedores.php';
        return D_delete_proveedores($id);
    }
?>