<?php 

    include_once '../negocios/Negocios_Productos.php';
    $datosProductos = N_mostrar_productos_stock();

    $id=$_GET['id'];
    
    
    include_once '../negocios/Negocios_VentasDetalle.php';
    $datosDetalle = N_mostrar_VentasDetalle($id);

    include_once '../negocios/Negocios_Ventas.php';
    $total = N_mostrar_total($id);

    include_once '../negocios/Negocios_Ventas.php';
    $cliente = N_obtener_cliente($id);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tablas.css">
    <link rel="stylesheet" href="css/carrito.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/carrito_presencial.js"></script>

</head>

<body>
<br>
    <div class="row">

        

        <div class="col-md-4">
        <br>
        <br>
        <br>
        <br>
        <form action="" id="insertarProducto">
            <div class="frm">
                <div class="row">
                    <center><h2>PRODUCTO</h2></center>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control txt" placeholder="PRODUCTO" id="txtDescripcionPro" value="" maxlength="100" disabled="true">    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control txt" placeholder="CANTIDAD" id="txtCantidad"  maxlength="10" >    
                    </div>
                </div>
                

                
                <div class="row">
                    <center>
                        <button  type="button" class="btn btn-success btn_g" id="btnGua" value="btnGuardar" onclick="comprar('<?php echo $id?>')">COMPRAR</button>
                    </center>
                </div>

                <input type="hidden" class="form-control txt3"  id="txtIdProducto" value="" >
                <input type="hidden" class="form-control txt3"  id="txtStock"  >

            </div>
        </form>
        </div>

        <div class="col-md-3">

        </div>

        <div class="col-md-5">

            <div class="row">
            <center><h2>CARRITO</h2></center>
            </div>  


            <div class="row">
            <table class="tabla">
                <thead>
                    <tr class="tr_x">
                        <th class="th_x">CATEGORIA</th>
                        <th class="th_x">MARCA</th>
                        <th class="th_x">PRODUCTO</th>
                        <th class="th_x">PRECIO</th>
                        <th class="th_x">CANTIDAD</th>
                        <th class="th_x">ACCIONES</th>
                    </tr>
                </thead>
                <?php foreach ($datosDetalle as $detalle ){
                    $dataDetalle=$detalle['vendet_id']."||".$detalle['ven_id']?>
                    <tr class="tr_x">
                        <td class="td_x"><?php echo $detalle['cla_categoria']; ?></td>
                        <td class="td_x"><?php echo $detalle['cla_marca']; ?></td>
                        <td class="td_x"><?php echo $detalle['pro_descripcion']; ?></td>
                        <td class="td_x"><?php echo $detalle['pro_precio_ven']; ?></td>
                        <td class="td_x"><?php echo $detalle['vendet_cantidad']; ?></td>
                        <td class="td_btn"> 
                            
                            <button type="button" class="btn btn-danger" value="btnEliminar" id="btnEli" onclick="eliminar_venta('<?php echo $dataDetalle?>')">ELIMINAR</button> 

                        </td>
                    </tr>

                <?php } ?>
            </table>
            </div>

            <div class="row frm2">
                    <center>
                        <button  type="submit" class="btn btn-success btn_g" id="btnSal" value="btnSalir" onclick="confirmar('<?php echo $cliente?>','<?php echo $id?>','<?php echo $total?>')">TERMINAR PEDIDO</button>
                        <label class="lbl">TOTAL:   <?php echo $total?> Bs.</label>
                    </center>
             </div>

        </div>
    </div>
        


  



    <br>
    <div class="row">
        <center><h2>TABLA DE PRODUCTOS</h2></center>
    </div>  

    <div class="row">
        <table class="tabla">
            <thead>
                <tr class="tr_x">
                    <th class="th_x">CATEGORIA</th>
                    <th class="th_x">MARCA</th>
                    <th class="th_x">PRODUCTO</th>
                    <th class="th_x">PRECIO</th>
                    <th class="th_x">IMAGEN</th>
                    <th class="th_x">ACCIONES</th>
                </tr>
            </thead>
            <?php foreach ($datosProductos as $producto ){
                $dataProducto=$producto['pro_id']."||".$producto['pro_descripcion']."||".$producto['cla_categoria']."||".$producto['cla_marca']."||".$producto['pro_stock']?>
                <tr class="tr_x">
                    <td class="td_x"><?php echo $producto['cla_categoria']; ?></td>
                    <td class="td_x"><?php echo $producto['cla_marca']; ?></td>
                    <td class="td_x"><?php echo $producto['pro_descripcion']; ?></td>
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
    <br>
    <br>


    
    
   
    
    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aafb2c5e00.js" crossorigin="anonymous"></script>
    <!--Javascript-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

</body>

</html>