<?php 

    include_once '../negocios/Negocios_Productos.php';
    $datosProductos = N_mostrar_productos();

    $datosClasificaciones = N_mostrar_clasificaciones();



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
    <link rel="stylesheet" href="css/frm_productos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
<br>
    <center>
        <form action="" id="insertarProducto">
            <div class="frm">
                <div class="row">
                    <center><h2>REGISTRO DE PRODUCTOS</h2></center>
                </div>

                <div class="row">

                    <div class="col-md-4">
                        <center><label class="label lbl">PROVEEDOR</label></center> 
                    </div>
                    <div class="col-md-8">

                        
                        <select class="lista" id="txtProveedor">
                            <option selected disabled ></option>

                            <?php foreach ($datosProveedores as $proveedor ){?>
                            <option  class="opc" value="<?php echo $proveedor['prov_id']; ?>" ><?php echo $proveedor['prov_compania']; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <center><label class="label lbl">CLASIFICACION</label></center> 
                    </div>
                    <div class="col-md-8">

                        
                        <select class="lista" id="txtClasificacion" >
                            <option selected disabled ></option>

                            <?php foreach ($datosClasificaciones as $clasificacion ){?>
                            <option  class="opc" value="<?php echo$clasificacion['cla_id']; ?>" ><?php echo $clasificacion['cla_categoria']." ".$clasificacion['cla_marca']; ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control txt" placeholder="NOMBRE" id="txtDescripcionPro" value="" maxlength="100">    
                    </div>
                </div>

                <div class="row">
                    <center>
                    <div class="col-md-6">
                        <input type="text" class="form-control txt2" placeholder="STOCK" id="txtStock" value="" style="margin-left: 10px" maxlength="10">    
                    </div>
                    </center>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control txt2" placeholder="PRECIO COMPRA" id="txtPrecioCom" value="" style="margin-left: 10px" maxlength="8">    
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control txt2" placeholder="PRECIO VENTA" id="txtPrecioVen" value="" style="margin-right: 10px" maxlength="8">    
                    </div>
                    
                </div>



                
                

                
                <div class="row">
                    <center>
                        <button  type="button" class="btn btn-success btn_g" id="btnGuarPro" value="btnGuardarPro" onclick="guardar_pro()">GUARDAR</button>
                         <button type="button" class="btn btn-primary btn_g" id="btnEditPro" value="btnEditarPro" onclick="editar_pro()" >EDITAR</button>
                         <button type="button" class="btn btn-danger btn_g"  id="btnEliPro" value="btnEliminarPro" onclick="eliminar_pro()">ELIMINAR</button>
                         <button type="button" class="btn btn-secondary btn_g"  id="btnRepPro" value="btnReportePro" onclick="ReportePro()">REPORTE</button>
                    </center>
                </div>

                <input type="hidden" class="form-control txt3"  id="txtIdProducto" value="" >

            </div>
        </form>
    </center>

    <br>
    <br>
    <center>
    <form action="../datos/Datos_Imagen.php" method="POST" enctype="multipart/form-data">
            <div class="frm">
                <div class="row">
                    <center><h2>INSERTAR IMAGENES</h2></center>
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
                        <input type="text" class="form-control txt" placeholder="NOMBRE" id="txtDescripcionImg" name="txtDescripcionImg" required="" maxlength="100">    
                    </div>
                </div>
     
                
                
                <div class="row">
                    <center>
                        <button  type="submit" class="btn btn-success btn_g" id="btnImagen" value="btnImagen" >INSERTAR</button>
                    </center>
                </div>

                <input type="hidden" class="form-control txt3"  id="txtIdProducto" value="" >

            </div>
        </form>
    </center>




    <br>
    <div class="row">
        <center><h2>TABLA DE PRODUCTOS</h2></center>
    </div>  

    <div class="row">
        <table class="tabla">
            <thead>
                <tr class="tr_x">
                    <th class="th_x">PROVEEDOR</th>
                    <th class="th_x">CATEGORIA</th>
                    <th class="th_x">MARCA</th>
                    <th class="th_x">PRODUCTO</th>
                    <th class="th_x">STOCK</th>
                    <th class="th_x">PRECIO COMPRA</th>
                    <th class="th_x">PRECIO VENTA</th>
                    <th class="th_x">IMAGEN</th>
                    <th class="th_x">ACCIONES</th>
                </tr>
            </thead>
            <?php foreach ($datosProductos as $producto ){
                $dataProducto=$producto['pro_id']."||".$producto['pro_descripcion']."||".$producto['pro_stock']."||".$producto['pro_precio_com']."||".$producto['pro_precio_ven']."||".$producto["prov_id"]."||".$producto["prov_compania"]."||".$producto['cla_id']."||".$producto['cla_categoria']."||".$producto['cla_marca']?>
                <tr class="tr_x">
                    <td class="td_x"><?php echo $producto['prov_compania']; ?></td>
                    <td class="td_x"><?php echo $producto['cla_categoria']; ?></td>
                    <td class="td_x"><?php echo $producto['cla_marca']; ?></td>
                    <td class="td_x"><?php echo $producto['pro_descripcion']; ?></td>
                    <td class="td_x"><?php echo $producto['pro_stock']; ?></td>
                    <td class="td_x"><?php echo $producto['pro_precio_com']; ?></td>
                    <td class="td_x"><?php echo $producto['pro_precio_ven']; ?></td>
                    <td class="td_x"><img src="data:image/jpg;base64,<?php echo base64_encode($producto['pro_imagen'])?>" width="100px"/></td>
                    <td class="td_btn"> 
                        
                        <button type="button" class="btn btn-light" value="SeleccionarPro" id="btnSelPro" onclick="sel_producto('<?php echo $dataProducto?>')">SELECCIONAR</button> 

                    </td>
                </tr>

            <?php } ?>
        </table>
    </div>

    <br>


    <!--//////////////////MARCAS Y CATEGORIAS/////////////////////////////-->
    
    <div class="row">
         
        <button  type="button" class="btn btn-secondary btn_g" onclick="ReporteProAudi()" >REPORTE DE MODIFICACIONES</button>
        
    </div>
   
    
    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aafb2c5e00.js" crossorigin="anonymous"></script>
    <!--Javascript-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/productos.js"></script>

</body>

</html>