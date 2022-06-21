<?php

    $txtCategoria=(isset($_POST['categoria']))?$_POST['categoria']:"";

    $txtId=(isset($_POST['id']))?$_POST['id']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    switch ($accion) {
        case 'btnGuardarCat':
            echo "".N_agg_categoria($txtCategoria);
            
        break;
        case "btnEliminarCat":
            echo "".N_delete_categoria($txtId);
        break;
    }


    function N_mostrar_categorias(){
        include_once '../datos/Datos_Categorias.php';
        return D_mostrar_categorias();
    }

    function N_agg_categoria($categoria){

        include_once '../datos/Datos_Categorias.php';

        return D_agg_categorias($categoria);
    }


    function N_delete_categoria($id){

        include_once '../datos/Datos_Categorias.php';
        return D_delete_categorias($id);
    }

?>