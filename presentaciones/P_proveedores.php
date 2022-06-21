<?php 
    include_once '../negocios/Negocios_Proveedores.php';
    $datosProveedores = N_mostrar_Proveedores();
    

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tablas.css">
    <link rel="stylesheet" href="css/frm_proveedores.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
  
<br>
    <center>
        <form action="" method="post">
            <div class="frm">
                <div class="row">
                    <center><h2>REGISTRO DE PROVEEDORES</h2></center>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control txt" placeholder="COMPAÑIA" id="txtCompania" value=""  maxlength="150">    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control txt" placeholder="DESCRIPCION" id="txtDescripcion" value=""  maxlength="150">    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control txt2" placeholder="DIRECCION" style="margin-left: 10px" id="txtDireccion" value=""  maxlength="150">    
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control txt2" placeholder="TELEFONO" style="margin-right: 20px" id="txtTelefono" value=""  maxlength="8">    
                    </div>
                </div>
                

                <div class="row">
                     <center> 
                         <button type="button" class="btn btn-success btn_g" id="btnGua" value="btnGuardar" onclick="guardar_prov()">GUARDAR</button>
                         <button type="button" class="btn btn-primary btn_g" id="btnEdit" value="btnEditar" onclick="editar_prov()">EDITAR</button>
                         <button type="button" class="btn btn-danger btn_g"  id="btnEli" value="btnEliminar" onclick="eliminar_prov()">ELIMINAR</button>
                         <button type="button" class="btn btn-secondary btn_g"  id="btnRep" value="" onclick="ReporteProv()">REPORTE</button>
                    </center>
                </div>

                <input type="hidden" class="form-control txt3"  id="txtIdProveedor" value="" >
            </div>
        </form>
    </center>




<br>
    <div class="row">
        <center><h2>TABLA DE PROVEEDORES</h2></center>
    </div>  
    <div class="row">
        <table class="tabla">
            <thead>
                <tr class="tr_x">
                    <th class="th_x">COMPAÑIA</th>
                    <th class="th_x">DESCRIPCION</th>
                    <th class="th_x">DIRECCION</th>
                    <th class="th_x">TELEFONO</th>
                    <th class="th_x" colspan="1">ACCIONES</th>
                </tr>
            </thead>
            <?php foreach ($datosProveedores as $proveedor ){
                 $dataProveedor=$proveedor['prov_id']."||".$proveedor['prov_compania']."||".$proveedor['prov_descripcion']."||".$proveedor['prov_direccion']."||".$proveedor['prov_telefono']?>
                <tr class="tr_x">
                    <td class="td_x"><?php echo $proveedor['prov_compania']; ?></td>
                    <td class="td_x"><?php echo $proveedor['prov_descripcion']; ?></td>
                    <td class="td_x"><?php echo $proveedor['prov_direccion']; ?></td>
                    <td class="td_x"><?php echo $proveedor['prov_telefono']; ?></td>
                    <td class="td_btn"> 
                    <form action="" method="post">

                        <button type="button" class="btn btn-light" value="Seleccionar" name="accion" onclick="sel_proveedor('<?php echo $dataProveedor?>')">SELECCIONAR</button> 

                    </form>
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
    <script src="js/proveedores.js"></script>
</body>

</html>