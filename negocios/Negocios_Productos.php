<?php


    $txtClasificacion=(isset($_POST['clasificacion']))?$_POST['clasificacion']:"";
    $txtProveedor=(isset($_POST['proveedor']))?$_POST['proveedor']:"";

    $txtDescripcion=(isset($_POST['producto']))?$_POST['producto']:"";
    $txtStock=(isset($_POST['stock']))?$_POST['stock']:"";

    $txtPrecioCom=(isset($_POST['precio_com']))?$_POST['precio_com']:"";
    $txtPrecioVen=(isset($_POST['precio_ven']))?$_POST['precio_ven']:"";


    $txtId=(isset($_POST['id']))?$_POST['id']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";


    

    switch ($accion) {
        case 'btnGuardarPro':
            echo "".N_agg_productos($txtClasificacion,$txtProveedor,$txtDescripcion,$txtStock,$txtPrecioCom,$txtPrecioVen);
            
        break;
        case 'btnEditarPro':
            echo "".N_up_productos($txtClasificacion,$txtProveedor,$txtDescripcion,$txtStock,$txtPrecioCom,$txtPrecioVen,$txtId);
        break;
        case "btnEliminarPro":
            echo "".N_delete_productos($txtId);
        break;
    }

    

    function N_mostrar_productos(){
        include_once '../datos/Datos_Productos.php';
        return D_mostrar_productos();
    }

    function N_mostrar_productos_stock(){
        include_once '../datos/Datos_Productos.php';
        return D_mostrar_productos_stock();
    }

    function N_mostrar_producto_x_prov($id){
        include_once '../datos/Datos_Productos.php';
        return D_mostrar_producto_x_prov($id);
    }

    function N_mostrar_pro_auditoria(){
        include_once '../datos/Datos_Productos.php';
        return D_mostrar_pro_auditoria();
    }

    function N_mostrar_clasificaciones(){
        include_once '../datos/Datos_Productos.php';
        return D_mostrar_clasificaciones();
    }

    function N_agg_productos($clasificacion,$proveedor,$descripcion,$stock,$precio_com,$precio_ven){

        include_once '../datos/Datos_Productos.php';

        return D_agg_productos($clasificacion,$proveedor,$descripcion,$stock,$precio_com,$precio_ven);
    }

    function N_up_productos($clasificacion,$proveedor,$descripcion,$stock,$precio_com,$precio_ven,$id){

        include_once '../datos/Datos_Productos.php';
        return D_up_productos($clasificacion,$proveedor,$descripcion,$stock,$precio_com,$precio_ven,$id);
    }

    function N_delete_productos($id){

        include_once '../datos/Datos_Productos.php';
        return D_delete_productos($id);
    }
?>