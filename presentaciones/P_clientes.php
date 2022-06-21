<?php 
    include_once '../negocios/Negocios_Clientes.php';

    $datosClientes = N_mostrar_clientes();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tablas.css">
    <link rel="stylesheet" href="css/frm_empleados.css">

</head>

<body>
<br>

    <div class="row">
        <center><h2>TABLA DE CLIENTES</h2></center>
    </div>  
    <div class="row">
        <table class="tabla">
            <thead>
                <tr class="tr_x">
                    <th class="th_x">NOMBRE</th>
                    <th class="th_x">APELLIDO PATERNO</th>
                    <th class="th_x">APELLIDO MATERNO</th>
                    <th class="th_x">NICKNAME</th>
                    <th class="th_x">CARNET</th>
                    <th class="th_x">FECHA DE NACIMIENTO</th>
                    <th class="th_x">CORREO</th>
                    <th class="th_x">TELEFONO</th>
                    <th class="th_x">DIRECCION</th>
                </tr>
            </thead>
            <?php foreach ($datosClientes as $cliente ){?>
                <tr class="tr_x">
                    <td class="td_x"><?php echo $cliente['cli_nombre']; ?></td>
                    <td class="td_x"><?php echo $cliente['cli_paterno']; ?></td>
                    <td class="td_x"><?php echo $cliente['cli_materno']; ?></td>
                    <td class="td_x"><?php echo $cliente['cli_nickname']; ?></td>
                    <td class="td_x"><?php echo $cliente['cli_ci']; ?></td>
                    <td class="td_x"><?php echo $cliente['cli_fecha_n']; ?></td>
                    <td class="td_x"><?php echo $cliente['cli_correo']; ?></td>
                    <td class="td_x"><?php echo $cliente['cli_telefono']; ?></td>
                    <td class="td_x"><?php echo $cliente['cli_direccion']; ?></td>
                </tr>

            <?php } ?>
        </table>


    </div>
    <div class="row">
        <div class="col-md-4">
            <button type="button" class="btn btn-secondary btn_g"  id="btnRep" value="" onclick="ReporteCli()">REPORTE</button>
        </div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
    
    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aafb2c5e00.js" crossorigin="anonymous"></script>
    <script src="js/clientes.js"></script>
</body>

</html>