<?php 
    include_once '../negocios/Negocios_Ventas.php';

    $datosVentas = N_mostrar_ventas();

    include_once '../negocios/Negocios_Empleados.php';

    $datosEmpleados = N_mostrar_empleadoS2();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tablas.css">
    <link rel="stylesheet" href="css/frm_compras.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    

</head>

<body>

<br>
    <center>
        <form action="" method="post">
            <div class="frm">
                <div class="row">
                    <center><h2>REGISTRO DE VENTAS</h2></center>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <label class="lbl" id="lblCliente" value=""></label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control txt" placeholder="DESCRIPCION" id="txtDescripcion" value=""  maxlength="150">    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <center><label class="label lbl">REPARTIDOR</label></center> 
                    </div>
                    <div class="col-md-8">
                        <select class="lista" id="txtIdEmpleado">
                            <option selected disabled ></option>
                            <?php foreach ($datosEmpleados as $empleado ){?>
                            <option class="opc" value="<?php echo $empleado['emp_id']; ?>" ><?php echo $empleado['emp_nombre']." ".$empleado['emp_paterno']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>



                <div class="row">
                     <center> 

                         <button type="button" class="btn btn-primary btn_g" id="btnEdit" value="btnEditar" onclick="editar_venta()">EDITAR</button>
                         <button type="button" class="btn btn-secondary btn_g"  id="btnRep" value="" onclick="ReporteVen()">REPORTE</button>
                    </center>
                </div>

                <input type="hidden" class="form-control txt3"  id="txtIdVenta" value="" >
            </div>
        </form>
    </center>




<br>
    <div class="row">
        <center><h2>TABLA DE LAS VENTAS</h2></center>
    </div>  
    <div class="row">
        <table class="tabla">
            <thead>
                <tr class="tr_x">
                    <th class="th_x">CLIENTE</th>
                    <th class="th_x">REPARTIDOR</th>
                    <th class="th_x">DESCRIPCION</th>
                    <th class="th_x">FECHA DE LA VENTA</th>
                    <th class="th_x">TOTAL</th>
                    <th class="th_x">COMPROBANTE</th>
                    <th class="th_x">ESTADO</th>
                    <th class="th_x" colspan="2">ACCIONES</th>
                    <th class="th_x" colspan="3">NOTIFICACIONES</th>
                </tr>
            </thead>
            <?php foreach ($datosVentas as $venta ){
                $dataVenta=$venta['ven_id']."||".$venta['ven_descripcion']."||".$venta['cli_correo']."||".$venta['emp_nombre']."||".$venta['emp_paterno']."||".$venta['cli_nombre']."||".$venta['cli_paterno']."||".$venta['ven_fecha']."||".$venta['emp_id']?>
                <tr class="tr_x">
                    <td class="td_x"><?php echo $venta['cli_nombre']." ".$venta['cli_paterno']; ?></td>
                    <td class="td_x"><?php echo $venta['emp_nombre']." ".$venta['emp_paterno']; ?></td>
                    <td class="td_x"><?php echo $venta['ven_descripcion']; ?></td>
                    <td class="td_x"><?php echo $venta['ven_fecha']; ?></td>
                    <td class="td_x"><?php echo $venta['ven_total']; ?></td>
                    <td class="td_x"><img src="data:image/jpg;base64,<?php echo base64_encode($venta['ven_comprobante'])?>" width="100px"/></td>
                    <td class="td_x"><?php echo $venta['ven_confirmacion']; ?></td>
                    <td class="td_btn"> 
                        <button type="button" class="btn btn-success" onclick="abrir_venta()">VER DETALLE</button> 
                    </td>
                    <td class="td_btn">
                        <button type="button" class="btn btn-secondary" onclick="sel_venta('<?php echo $dataVenta?>')">SELECCIONAR</button> 
                    </td>
                    <td class="td_btn">
                        <button type="button" class="btn btn-primary" onclick="confirmar('<?php echo $dataVenta?>')">CONFIRMAR</button> 
                    </td>
                    <td class="td_btn">
                        <button type="button" class="btn btn-danger" id="btnA" value="btnAnular" onclick="anular('<?php echo $dataVenta?>')">ANULAR</button> 
                    </td>
                    <td class="td_btn">
                        <button type="button" class="btn btn-warning" onclick="advertencia('<?php echo $dataVenta?>')">ADVERTENCIA</button> 
                    </td>
                </tr>

            <?php } ?>
        </table>


    </div>


    
    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aafb2c5e00.js" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/ventas.js"></script>
</body>

</html>