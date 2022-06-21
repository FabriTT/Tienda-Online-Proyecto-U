<?php
    $txtMarca=(isset($_POST['marca']))?$_POST['marca']:"";

    $txtId=(isset($_POST['id']))?$_POST['id']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    switch ($accion) {
        case 'btnGuardarMar':
            echo "".N_agg_marca($txtMarca);
            
        break;
        case "btnEliminarMar":
            echo "".N_delete_marca($txtId);
        break;
    }


    function N_mostrar_marcas(){
        include_once '../datos/Datos_Marcas.php';
        return D_mostrar_marcas();
    }

    function N_agg_marca($marca){

        include_once '../datos/Datos_Marcas.php';

        return D_agg_marcas($marca);
    }


    function N_delete_marca($id){

        include_once '../datos/Datos_Marcas.php';
        return D_delete_marcas($id);
    }

?>