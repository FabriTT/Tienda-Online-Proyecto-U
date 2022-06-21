<?php

    include_once '../negocios/Negocios_Clientes.php';

    $id=$_GET['id'];

    $datoCliente=N_buscar_cliente($id);


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/interaccion.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>

<body >

    <div class="container-fluid">
         <div class="row  align-items-center barra_titulo">
             <div class="col-md-3  logo"><img src="img/logo.jpg" class="img" id="logo"> FOXCONN</div>
             <div class="col-md-7  titulo">
                
             </div>
             <div class="col-md-2 text-end  logout">
                <div class="dropdown ">
                    <button class="btn btn_color dropdown-toggle salir-b " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" >
                        <i class="fa-solid fa-arrow-right-to-bracket salir"></i>
                    </button>
                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="Pagina_Principal/index.php" >SALIR</a></li>
                    </ul>
                </div>
             </div>
         </div>
         <div class="row">
            <div class="col-md-9 contenido barra">
                 
                
                 <iframe class="x_iframe" id ="iframeDashboard" ></iframe>
                 
                 
 
             </div>

             <div class="col-md-3 modulos ">
                <div class="row"><button id="btnProductos" type="button " class="btn  btn_color boton_mod" onclick="P_editar(<?php echo $id?>)" ><i class="fa-solid fa-user-pen"></i>   EDITAR DATOS </button></div>
                <div class="row"><button id="btnProveedores" type="button " class="btn  btn_color boton_mod" onclick="P_eliminar(<?php echo $id?>)"  ><i class="fa-solid fa-user-slash"></i>  ELIMINAR CUENTA </button></div>
                <div class="row"><button id="btnClientes" type="button " class="btn  btn_color boton_mod" onclick="ver_compras(<?php echo $id?>)"  ><i class="fa-regular fa-file-lines"></i> COMPRAS REALIZADAS </button></div>
                
                <br>
                <br>


                <div class="row">
                    <center><label class="lbl3">NOTA: Por cada compra que realice debe adjuntar el comprobante de pago para que su compra se procese</label></center>
                </div>

                <br>

                <div class="row">
                    <center><label class="lbl3">Numero de cuenta: 1234567890  </label></center>
                    <center><label class="lbl3">Nombre: Alex Perez</label></center>
                    <center><label class="lbl3">CI: 10105050 LP Caja de ahorro</label></center>
                </div>


                <br>
                <br>

                <div class="row">
                    <center><button id="btnCom" value="btnComprar" type="button " class="btn btn-success" onclick="P_comprar(<?php echo $id?>)"  style="width: 200px"><i class="fa-solid fa-cart-shopping"></i> COMPRAR </button></center>
                </div>
                 
                <div class="row targeta">
                     <div class="col-md-3">
                        <i class="fa-solid fa-user icon_u"></i>
                     </div>
                     <div class="col-md-9">

                        <?php foreach ($datoCliente as $cliente ){?>
                            <p class="info"><?php echo "NOMBRE: ".$cliente['cli_nombre']?></p>
                            <p class="info"><?php echo "PATERNO: ".$cliente['cli_paterno']?></p>
                            <p class="info"><?php echo "MATERNO: ".$cliente['cli_materno']?></p>
                            <p class="info"><?php echo "CARNET: ".$cliente['cli_ci']?></p>
                        <?php } ?>

                     </div>
                </div>
                 

                 
             </div>

             
         </div>
    </div>
                

    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aafb2c5e00.js" crossorigin="anonymous"></script>
    <!--JavaScript-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/interaccion.js"></script>
</body>



</html>