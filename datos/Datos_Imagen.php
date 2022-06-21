
<?php

    
    $txtImagen=addslashes(file_get_contents($_FILES['txtImagen']['tmp_name']));
   
    
    $txtNombre=(isset($_POST['txtDescripcionImg']))?$_POST['txtDescripcionImg']:"";

    
    D_agg_img($txtImagen,$txtNombre);
    



    function D_agg_img($imagen,$nombre){
            
        $link='mysql:host=localhost;dbname=db_tienda_foxcoon';
        $usuario= 'root';
        $pass = '';
        $pdoImg = new PDO($link,$usuario,$pass);
            try{
                $sql="UPDATE productos SET pro_imagen='".$imagen."' WHERE pro_descripcion ='".$nombre."'";

                $sentencia = $pdoImg->prepare($sql);
        
                $sentencia->execute();
                echo 'ok';

            }catch(Exception $e){
                echo 'error'.$e;
            }finally{
                header("Location: ../presentaciones/P_productos.php");
            }
        

    }
?>