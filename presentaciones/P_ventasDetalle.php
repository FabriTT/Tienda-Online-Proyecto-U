<?php 
    include_once '../negocios/Negocios_VentasDetalle.php';
    $id=$_GET['id'];
    $datosVentasDet = N_mostrar_VentasDetalle($id);



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


<br>
    <div class="row">
        <center><h2>TABLA DE LOS DETALLES DE LA VENTA</h2></center>
    </div>  
    <div class="row">
        <table class="tabla">
            <thead>
                <tr class="tr_x">
                    <th class="th_x">CATEGORIA</th>
                    <th class="th_x">MARCA</th>
                    <th class="th_x">PRODUCTO</th>
                    <th class="th_x">CANTIDAD</th>
                    <th class="th_x">PRECIO</th>
                    <th class="th_x">ACCION</th>
                </tr>
            </thead>
            <?php foreach ($datosVentasDet as $ventaDet ){
                $dataVenta = $ventaDet['ven_id']."||".$ventaDet['vendet_id']?>
                <tr class="tr_x">
                    <td class="td_x"><?php echo $ventaDet['cla_categoria']; ?></td>
                    <td class="td_x"><?php echo $ventaDet['cla_marca']; ?></td>
                    <td class="td_x"><?php echo $ventaDet['pro_descripcion']; ?></td>
                    <td class="td_x"><?php echo $ventaDet['vendet_cantidad']; ?></td>
                    <td class="td_x"><?php echo $ventaDet['pro_precio_ven']; ?></td>
                    <td class="td_btn"> 
                    <button type="button" class="btn btn-danger" value="btnEliminar" id="btnEli" onclick="eliminar_venta('<?php echo $dataVenta?>')">ELIMINAR</button> 
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
    <script src="js/ventasDetalle.js"></script>
</body>

</html>