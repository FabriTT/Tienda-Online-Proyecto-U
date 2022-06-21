
<?php

    
$txtImagen=addslashes(file_get_contents($_FILES['txtImagen']['tmp_name']));


$txtCompra=(isset($_POST['txtIdCompraImg']))?$_POST['txtIdCompraImg']:"";




D_agg_img($txtImagen,$txtCompra);




function D_agg_img($imagen,$id){
        
    $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
    $usuario= 'root';
    $pass = '';
    $pdoImg = new PDO($link,$usuario,$pass);
        try{
            $sql="UPDATE compras SET com_comprobante='".$imagen."' WHERE com_id ='".$id."'";

            $sentencia = $pdoImg->prepare($sql);
    
            $sentencia->execute();
            echo 'ok';

        }catch(Exception $e){
            echo 'error'.$e;
        }finally{
            header("Location: ../presentaciones/P_compras.php");
        }
    

}
?>