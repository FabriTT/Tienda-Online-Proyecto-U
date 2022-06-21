<?php
   
    $txtNickname=(isset($_POST['usuario']))?$_POST['usuario']:"";
    $txtPassword=(isset($_POST['password']))?$_POST['password']:"";
    $accion=(isset($_POST['accion']))?$_POST['accion']:"";

    $txtCorreo=(isset($_POST['correo']))?$_POST['correo']:"";

    $txtContra=(isset($_POST['contra']))?$_POST['contra']:"";
    $txtId=(isset($_POST['id']))?$_POST['id']:"";
    $txtTabla=(isset($_POST['tabla']))?$_POST['tabla']:"";



    switch($accion){
        case 'btnAcceder':
            $resultado=N_val_Login($txtNickname,$txtPassword);
            echo json_encode($resultado);
        break;
        case 'btnVerificar':
            $resultado=N_val_correo($txtCorreo);
            echo json_encode($resultado);
        break;   
    }

    
    switch($txtTabla){
        case 'empleados':
            $resultado=N_newcontra_emp($txtContra,$txtId);
            echo $resultado;
        break;
        case 'clientes':
            $resultado=N_newcontra_cli($txtContra,$txtId);
            echo $resultado;
        break;   
    }


    function N_val_Login($nickname,$password){

        include_once '../datos/Datos_login.php';
        return D_val_login($nickname,sha1($password));
    }

    function N_val_correo($correo){

        include_once '../datos/Datos_login.php';
        return D_val_correo($correo);
    }

    function N_newcontra_emp($contra,$id){

        include_once '../datos/Datos_login.php';
        return D_newcontra_emp(sha1($contra),$id);
    }

    function N_newcontra_cli($contra,$id){

        include_once '../datos/Datos_login.php';
        return D_newcontra_cli(sha1($contra),$id);
    }






?>


