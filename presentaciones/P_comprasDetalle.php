<?php 
    include_once '../negocios/Negocios_ComprasDetalle.php';
    $id=$_GET['id'];
    $proveedor=$_GET['prov'];
    $datosComprasDet = N_mostrar_ComprasDetalle($id);

    include_once '../negocios/Negocios_Productos.php';
    $datosProductos = N_mostrar_producto_x_prov($proveedor);


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
<div class="row">
    <div class="col-md-1">
        <button type="button" class="btn btn-danger"   value="btnEliminar" onclick="salir()">X</button>
    </div>
    <div class="col-md-11">
        
    </div>
</div>



<br>
<center>
        <form action="" method="post">
            <div class="frm">
                <div class="row">
                    <center><h2>REGISTRO DEL DETALLE DE LA COMPRA</h2></center>
                </div>

                
                <div class="row">
                    <div class="col">
                        <center><label class="label lbl">PRODUCTO</label></center> 
                    <div>
                    <div class="col-md-8">
                        <select class="lista" id="txtIdProducto">
                            <option selected disabled ></option>
                            <?php foreach ($datosProductos as $producto ){?>
                            <option class="opc" value="<?php echo $producto['pro_id']; ?>" ><?php echo $producto['pro_descripcion']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="txt" placeholder="CANTIDAD" id="txtCantidad" value="" maxlength="5">
                    </div>
                </div>

                   

                <div class="row">
                    <center>
                        <button type="button" class="btn btn-success btn_g" id="btnGua" value="btnGuardar" onclick="guardar_comdet('<?php echo $id?>','<?php echo $proveedor?>')">GUARDAR</button>
                        <button type="button" class="btn btn-danger btn_g"  id="btnEli" value="btnEliminar" onclick="eliminar_comdet('<?php echo $id?>','<?php echo $proveedor?>')">ELIMINAR</button>
                    </center>
                </div>

                <input type="hidden" class="form-control txt3"  id="txtIdCompraDet" value="" >
                <input type="hidden" class="form-control txt3"  id="txtIdCompra" value="<?php echo $id?>" >

            </div>
        </form>
    </center>


<br>
    <div class="row">
        <center><h2>TABLA DE LOS DETALLES DE LA COMPRA</h2></center>
    </div>  
    <div class="row">
        <table class="tabla">
            <thead>
                <tr class="tr_x">
                    <th class="th_x">PRODUCTO</th>
                    <th class="th_x">CANTIDAD</th>
                    <th class="th_x">PRECIO</th>
                    <th class="th_x" colspan="1">ACCIONES</th>
                </tr>
            </thead>
            <?php foreach ($datosComprasDet as $compraDet ){
                $dataCDetalle=$compraDet['comdet_id']."||".$compraDet['comdet_cantidad']."||".$compraDet['pro_id']."||".$compraDet['pro_descripcion']?>
                <tr class="tr_x">
                    <td class="td_x"><?php echo $compraDet['pro_descripcion']; ?></td>
                    <td class="td_x"><?php echo $compraDet['comdet_cantidad']; ?></td>
                    <td class="td_x"><?php echo $compraDet['pro_precio_com']; ?></td>
                    <td class="td_btn">

                         <button type="button" class="btn btn-light" value="Seleccionar" name="accion" onclick="sel_comdet('<?php echo $dataCDetalle?>')">SELECCIONAR</button> 

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
    <script src="js/comprasDetalle.js"></script>
</body>

</html>