
<?php

    
$txtImagen=addslashes(file_get_contents($_FILES['txtImagen']['tmp_name']));


$txtVenta=(isset($_POST['txtIdVenta']))?$_POST['txtIdVenta']:"";

$txtCli=(isset($_POST['txtIdCliente']))?$_POST['txtIdCliente']:"";


D_agg_img($txtImagen,$txtVenta,$txtCli);




function D_agg_img($imagen,$id,$cliente){
        
    $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
    $usuario= 'root';
    $pass = '';
    $pdoImg = new PDO($link,$usuario,$pass);
        try{
            $sql="UPDATE ventas SET ven_comprobante='".$imagen."' WHERE ven_id ='".$id."'";

            $sentencia = $pdoImg->prepare($sql);
    
            $sentencia->execute();
            echo 'ok';

        }catch(Exception $e){
            echo 'error'.$e;
        }finally{
            header("Location: ../presentaciones/P_cliente_compra.php?id=".$cliente);
        }
    

}
?>