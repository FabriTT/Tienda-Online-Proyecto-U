<?php 
    include_once '../negocios/Negocios_Clientes.php';

    $id=(isset($_GET['id']))?$_GET['id']:"";

    $datoCliente=N_buscar_cliente($id);

    foreach($datoCliente as $cliente){
        $nombre=$cliente['cli_nombre'];
        $paterno=$cliente['cli_paterno'];
        $materno=$cliente['cli_materno'];
        $carnet=$cliente['cli_ci'];
        $fecha=$cliente['cli_fecha_n'];
        $telfono=$cliente['cli_telefono'];
        $direccion=$cliente['cli_direccion'];
        $correo=$cliente['cli_correo'];
    }


    
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
    <script src="js/cliente_edit.js"></script>


</head>

<body class="bodyframe">
    
<br>
<br>
<center>
    <form action="" method="post">
        <div class="frm">
            <div class="row">
                <center><h2>EDICION DE DATOS</h2></center>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control txt" placeholder="NOMBRE" id="txtNombre"  value="<?php echo $nombre?>" maxlength="100">    
                </div>
                    <div class="col-md-4">
                <input type="text" class="form-control txt" placeholder="PATERNO" id="txtPaterno" value="<?php echo $paterno?>" maxlength="50">    
                </div>     
                <div class="col-md-4">
                    <input type="text" class="form-control txt" placeholder="MATERNO" id="txtMaterno" value="<?php echo $materno?>"  maxlength="50">    
                </div> 
            </div>

            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control txt2" placeholder="CONTRASEÑA" id="txtPassword" maxlength="50">    
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control txt2" placeholder="CARNET" id="txtCarnet" value="<?php echo $carnet?>" maxlength="8">    
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <center><label class="label lbl">FECHA DE NACIMIENTO</label></center> 
                </div>
                <div class="col-md-6">
                <input type="date" class="dt" id="txtFecha" value="<?php echo $fecha?>" maxlength="150">
                </div>
            </div>
            


            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control txt3" placeholder="TELEFONO" id="txtTelefono" value="<?php echo $telfono?>" maxlength="8">    
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control txt3" placeholder="DIRECCION" id="txtDireccion" value="<?php echo $direccion?>" maxlength="100">    
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control txt4" placeholder="CORREO" id="txtCorreo" value="<?php echo $correo?>" maxlength="50">    
                </div>
            </div>


            <div class="row">
                <center>
                <button type="button" class="btn btn-primary btn_g" id="btnEdit" value="btnEditar" onclick="editar_cliente(<?php echo $id?>)">EDITAR</button>
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
    
</body>

</html>