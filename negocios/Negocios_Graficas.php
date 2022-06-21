<?php

    $txtInicio=(isset($_POST['inicio']))?$_POST['inicio']:"";
    $txtFin=(isset($_POST['fin']))?$_POST['fin']:"";

    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    if($accion == 'venta'){
        echo json_encode(N_grafica_ventas($txtInicio,$txtFin));
    }

    if($accion == 'compra'){
        echo json_encode(N_grafica_compras($txtInicio,$txtFin));
    }
   


    function N_grafica_ventas($inicio,$fin){
        include_once '../datos/Datos_Graficas.php';
        return D_grafica_ventas($inicio,$fin);
    }

    function N_grafica_compras($inicio,$fin){
        include_once '../datos/Datos_Graficas.php';
        return D_grafica_compras($inicio,$fin);
    }


?>