<?php 
    include_once '../negocios/Negocios_Clientes.php';

    $id=(isset($_GET['id']))?$_GET['id']:"";



    
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tablas.css">
    <link rel="stylesheet" href="css/interaccion.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body class="bodyframe">
    
<br>
<br>
<center>
    <form action="" method="post">
        <div class="frm">
            <div class="row">
                <center><h2>ELIMINAR CUENTA</h2></center>
            </div>
            

            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control txt4" placeholder="USUARIO" id="txtUsuario" value="" maxlength="12">    
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <input type="password" class="form-control txt4" placeholder="CONTRASEÑA" id="txtPassword" value="" maxlength="50">    
                </div>
            </div>

            

            <div class="row">
                <center>
                <button type="button" class="btn btn-danger btn_g" id="btnEli" value="btnEliminar" onclick="eliminar_cliente(<?php echo $id?>)">ELIMINAR CUENTA</button>
                <center>
            </div>
        </div>
    </form>
</center>



    
    
    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aafb2c5e00.js" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/cliente_delete.js"></script>
</body>

</html>