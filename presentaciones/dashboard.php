<?php

    include_once '../negocios/Negocios_Empleados.php';

    $id=$_GET['id'];

    $datoEmpleado=N_buscar_empleado($id);

    foreach($datoEmpleado as $aux){
        $cargo = $aux['car_id'];
    }


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
</head>

<body>

    <div class="container-fluid ">
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
             <div class="col-md-3 modulos">

                 <div class="row"><button id="btnProductos" type="button " class="btn  btn_color boton_mod" onclick="P_productos()" ><i class="fa-solid fa-dolly"></i>   PRODUCTOS </button></div>
                 <div class="row"><button id="btnProveedores" type="button " class="btn  btn_color boton_mod" onclick="P_proveedores()"  ><i class="fa-solid fa-truck-field"></i>  PROVEEDORES </button></div>
                 <div class="row"><button id="btnClientes" type="button " class="btn  btn_color boton_mod" onclick="P_clientes()"  ><i class="fa-solid fa-user-large"></i>   CLIENTES </button></div>
                 <div class="row"><button id="btnEmpleados" type="button " class="btn  btn_color boton_mod" onclick="P_empleados('<?php echo $id?>')" ><i class="fa-solid fa-user-tie"></i><a></a>   EMPLEADOS </button></div>
                 <div class="row"><button id="btnVentas" type="button " class="btn  btn_color boton_mod" onclick="P_ventas()"    ><i class="fa-solid fa-cart-shopping"></i>   VENTAS</button></div>
                 <div class="row"><button id="btnVentasPresencial" type="button " class="btn  btn_color boton_mod" onclick="P_ventas_presencial()"  ><i class="fa-solid fa-cash-register"></i>  VENTA PRESENCIAL</button></div>
                 <div class="row"><button id="btnCompras" type="button " class="btn  btn_color boton_mod" onclick="P_compras()"   ><i class="fa-solid fa-dollar-sign"></i>   COMPRAS</button></div>
                 <div class="row"><button id="btnGraficas" type="button " class="btn  btn_color boton_mod" onclick="P_graficas()"  ><i class="fa-solid fa-chart-simple"></i>   GRAFICAS</button></div>
                 <br>
                 <br>
                 <div class="row">
                    <center><button id="btnDesocupado" value="btnDesocuapdo" type="button" class="btn btn-primary" onclick="desocupar('<?php echo $id?>')"  style="width: 200px"><i class="fa-solid fa-person-circle-check"></i> MARCAR DESOCUPADO </button></center>
                </div>

                 <div class="row targeta">
                     <div class="col-md-3">
                        <i class="fa-solid fa-user icon_u"></i>
                     </div>
                     <div class="col-md-9">

                        <?php foreach ($datoEmpleado as $empleado ){?>
                            <p class="info"><?php echo "NOMBRE: ".$empleado['emp_nombre']?></p>
                            <p class="info"><?php echo "APELLIDO: ".$empleado['emp_paterno']?></p>
                            <p class="info"><?php echo "CARNET: ".$empleado['emp_ci']?></p>
                            <p class="info"><?php echo "CARGO: ".$empleado['car_descripcion']?></p>
                        <?php } ?>

                     </div>
                 </div>
                 
                 
             </div>

             <div class="col-md-9 contenido">
                 
                
                <iframe class="x_iframe" id ="iframeDashboard" ></iframe>
                
                

             </div>
         </div>
    </div>

    <script>
        aux='<?php echo json_encode($cargo)?>'; 
    </script>                    

    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aafb2c5e00.js" crossorigin="anonymous"></script>
    <!--JavaScript-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/dashboard.js"></script>
</body>



</html>