<?php 
    include_once '../negocios/Negocios_Compras.php';
    $datosCompras = N_mostrar_compras();

    include_once '../negocios/Negocios_Proveedores.php';
    $datosProveedores = N_mostrar_proveedores();


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
                    <center><h2>REGISTRO DE COMPRAS</h2></center>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="txt" placeholder="DESCRIPCION" id="txtDescripcion" value="" maxlength="150">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <center><label class="label lbl">PROVEEDOR</label></center> 
                    </div>
                    <div class="col-md-8">
                        <select class="lista" id="txtIdProveedor">
                            <option selected disabled ></option>
                            <?php foreach ($datosProveedores as $proveedor ){?>
                            <option class="opc" value="<?php echo $proveedor['prov_id']; ?>" ><?php echo $proveedor['prov_compania']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <input type="date" class="dt" id="txtFecha" value="" >
                    </div>
                </div>
                   

                <div class="row">
                    <center>
                        <button type="button" class="btn btn-success btn_g" id="btnGua" value="btnGuardar" onclick="guardar_com()">GUARDAR</button>
                        <button type="button" class="btn btn-primary btn_g" id="btnEdit" value="btnEditar" onclick="editar_com()">EDITAR</button>
                        <button type="button" class="btn btn-danger btn_g"  id="btnEli" value="btnEliminar" onclick="eliminar_com()">ELIMINAR</button>
                        <button type="button" class="btn btn-secondary btn_g"  id="btnRep" value="btnReporte" onclick="ReporteCom()">REPORTE</button>
                    </center>
                </div>

                <input type="hidden" class="form-control txt3"  id="txtIdCompra" value="" >


            </div>
        </form>
    </center>

    <br>

    <center>
    <form action="../datos/Datos_Comprobante_compra.php" method="POST" enctype="multipart/form-data">
            <div class="frm">
                <div class="row">
                    <center><h2>INSERTAR COMPROBANTE</h2></center>
                </div>

                <div class="row">
                    

                    <div class="col-md-3">
                        <center><label class="label lbl">IMAGEN</label></center> 
                    </div>
                    <div class="col-md-9">
                        <input type="file" class="form-control txtImg" placeholder="IMAGEN" id="txtImagen" name="txtImagen" value="" style="margin-right: 10px" required="">    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control txt" placeholder="NOMBRE" id="txtCompraImg" name="txtCompraImg" required="" maxlength="100">    
                    </div>
                </div>
     
                
                
                <div class="row">
                    <center>
                        <button  type="submit" class="btn btn-success btn_g" id="btnImagen" value="btnImagen" >INSERTAR</button>
                    </center>
                </div>

                <input type="hidden" class="form-control txt3"  id="txtIdCompraImg" name="txtIdCompraImg" value="" >

            </div>
        </form>
    </center>

<br>
    <div class="row">
        <center><h2>TABLA DE LAS COMPRAS</h2></center>
    </div>  
    <div class="row">
        <table class="tabla">
            <thead>
                <tr class="tr_x">
                    <th class="th_x">PROVEEDOR</th>
                    <th class="th_x">DESCRIPCION</th>
                    <th class="th_x">FECHA DE LA COMPRA</th>
                    <th class="th_x">TOTAL</th>
                    <th class="th_x">COMPROBANTE</th>
                    <th class="th_x" colspan="2">ACCIONES</th>
                </tr>
            </thead>
            <?php foreach ($datosCompras as $compra ){
                $dataCompra=$compra['com_id']."||".$compra['com_descripcion']."||".$compra['com_fecha']."||".$compra['prov_id']."||".$compra['prov_compania']?>
                <tr class="tr_x">
                    <td class="td_x"><?php echo $compra['prov_compania']; ?></td>
                    <td class="td_x"><?php echo $compra['com_descripcion']; ?></td>
                    <td class="td_x"><?php echo $compra['com_fecha']; ?></td>
                    <td class="td_x"><?php echo $compra['com_total']; ?></td>
                    <td class="td_x"><img src="data:image/jpg;base64,<?php echo base64_encode($compra['com_comprobante'])?>" width="100px"/></td>
                    <td class="td_btn"> 
                    <button type="button" class="btn btn-success" value="Seleccionar" name="accion" onclick="abrir_compra('<?php echo $dataCompra?>')">VER DETALLE</button> 
                    </td>
                    <td class="td_btn">

                         <button type="button" class="btn btn-light" value="Seleccionar" name="accion" onclick="sel_compra('<?php echo $dataCompra?>')">SELECCIONAR</button> 

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
    <script src="js/compras.js"></script>
</body>

</html>