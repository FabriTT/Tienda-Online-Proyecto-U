<?php 
    include_once '../negocios/Negocios_Empleados.php';

    $prueba=(isset($_GET['id']))?$_GET['id']:"";
    $datosEmpleados = N_mostrar_empleados();



    
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/tablas.css">
    <link rel="stylesheet" href="css/frm_empleados.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>
    
<br>
<br>
<center>
    <form action="" method="post">
        <div class="frm">
            <div class="row">
                <center><h2>REGISTRO DE EMPLEADOS</h2></center>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control txt" placeholder="NOMBRE" id="txtNombre"  value="" maxlength="100">    
                </div>
                    <div class="col-md-4">
                <input type="text" class="form-control txt" placeholder="PATERNO" id="txtPaterno" value="" maxlength="50">    
                </div>     
                <div class="col-md-4">
                    <input type="text" class="form-control txt" placeholder="MATERNO" id="txtMaterno" value=""  maxlength="50">    
                </div> 
            </div>

            <div class="row">
                <div class="col-md-6">
                    <input type="password" class="form-control txt2" placeholder="CONTRASEÑA" id="txtPassword" maxlength="50">    
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control txt2" placeholder="CARNET" id="txtCarnet" value="" maxlength="8">    
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <center><label class="label lbl">FECHA DE NACIMIENTO</label></center> 
                </div>
                <div class="col-md-6">
                <input type="date" class="dt" id="txtFecha" value="" maxlength="150">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <center><label class="label lbl">CARGO</label></center> 
                </div>
                <div class="col-md-6">
                    <select class="lista" id="txtCargo" value="">
                            <option selected disabled ></option>
                            <option class="opc" value="ALM">ALMACENERO</option>
                            <option class="opc" value="CFO">DIRECTOR FINNCIERO</option>
                            <option class="opc" value="ECV">ENCARGADO DE COMPRAS Y VENTAS</option>
                            <option class="opc" value="RRHH">RECURSOS HUMANOS</option>
                            <option class="opc" value="SUDO">SUPERUSUARIO</option>
                            <option class="opc" value="REP">REPARTIDOR</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control txt3" placeholder="TELEFONO" id="txtTelefono" value="" maxlength="8">    
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control txt3" placeholder="CORREO" id="txtCorreo" value="" maxlength="100">    
                </div>
            </div>


            <div class="row">
                <center>
                <button type="button" class="btn btn-success btn_g" id="btnGua" value="btnGuardar" onclick="guardar_empleado()">GUARDAR</button>
                <button type="button" class="btn btn-primary btn_g" id="btnEdit" value="btnEditar" onclick="editar_empleado()">EDITAR</button>
                <button type="button" class="btn btn-danger btn_g" id="btnEli" value="btnEliminar" onclick="eliminar_empleado()">ELIMINAR</button>
                <button type="button" class="btn btn-secondary btn_g" id="btnEli" value="btnEliminar" onclick="ReporteEmp()">REPORTE</button>
                <center>
            </div>
            <input type="hidden" class="form-control txt3"  id="txtIdEmpleado" value="" >
            <input type="hidden" class="form-control txt3"  id="txtIdUsuario" value="<?php echo $prueba?>" >
        </div>
    </form>
</center>



<br>

    <div class="row">
        <center><h2>TABLA DE EMPLEADOS</h2></center>
    </div>
    <div class="row">
        <table class="tabla">
            <thead>
                <tr class="tr_x">
                    <th class="th_x">NOMBRE</th>
                    <th class="th_x">APELLIDO PATERNO</th>
                    <th class="th_x">APELLIDO MATERNO</th>
                    <th class="th_x">CARGO</th>
                    <th class="th_x">NICKNAME</th>
                    <th class="th_x">CARNET</th>
                    <th class="th_x">FECHA DE NACIMIENTO</th>
                    <th class="th_x">CORREO</th>
                    <th class="th_x">TELEFONO</th>
                    <th class="th_x">ESTADO</th>
                    <th class="th_x" colspan="1">ACCIONES</th>
                </tr>
            </thead>
            <?php foreach ($datosEmpleados as $empleado ){
                 $dataEmpleado=$empleado['emp_id']."||".$empleado['emp_nombre']."||".$empleado['emp_paterno']."||".$empleado['emp_materno']."||".$empleado['emp_ci']."||".$empleado['emp_fecha_n']."||".$empleado['emp_correo']."||".$empleado['emp_telefono']."||".$empleado['car_id']."||".$empleado['car_descripcion']?>
                <tr class="tr_x">
                    <td class="td_x"><?php echo $empleado['emp_nombre']; ?></td>
                    <td class="td_x"><?php echo $empleado['emp_paterno']; ?></td>
                    <td class="td_x"><?php echo $empleado['emp_materno']; ?></td>
                    <td class="td_x"><?php echo $empleado['car_descripcion']; ?></td>
                    <td class="td_x"><?php echo $empleado['emp_nickname']; ?></td>
                    <td class="td_x"><?php echo $empleado['emp_ci']; ?></td>
                    <td class="td_x"><?php echo $empleado['emp_fecha_n']; ?></td>
                    <td class="td_x"><?php echo $empleado['emp_correo']; ?></td>
                    <td class="td_x"><?php echo $empleado['emp_telefono']; ?></td>
                    <td class="td_x"><?php echo $empleado['emp_atareado']; ?></td>
                    <td class="td_btn"> 

                        <form action="" method="post">


                            <button type="button" class="btn btn-light" value="Seleccionar" name="accion" onclick="sel_empleado('<?php echo $dataEmpleado?>')" >SELECCIONAR</button> 
                       
                        </form>

                        

                    </td>
                </tr>

            <?php } ?>
        </table>
    </div>

<br>
<br>

    
    
    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aafb2c5e00.js" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/empleados.js"></script>
</body>

</html>