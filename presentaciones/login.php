<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <div class="container-fluid">

        <div class="row centrear">
            <div class="col-md-4">
            </div>
            
            <div class="col-md-4  ">
                <center><img src="img/escudo.png" class="imagen"></center>
                <div class="body_login text-center">
                    <form action="#" method="post">
                        <div class="row text-center">
                            <div class="col-md-1">
                                <i class="fa-regular fa-user icons"></i>
                                
                            </div>
                            <div class="col-md-11 m_col">
                            <input type="text" id="txtNickname" class="form-control txt" placeholder="USUARIO" name="txtNickname" maxlength="50">    
                            </div>
                            
                        </div>
                        <div class="row text-center">
                            <div class="col-md-1">
                                <i class="fa-solid fa-key icons"></i>
                            </div>
                            <div class="col-md-11">
                                <div class="input-group largo">
                                    <input type="password" id="txtPassword" class="form-control txt" placeholder="CONTRASEÑA" name="txtPassword" maxlength="50">
                                    <button class="btn btn-outline-secondary btn_eye" type="button" onclick="ocultar()"><i class="fa-solid fa-eye eye"></i></button>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row align-items-center">
                            <button value="btnAcceder" type="button" class="btn btn-outline-light guardar"  name="accion" id="btnLogin"  onclick="val_login()" >ACCEDER</button>
                        </div>
                    </form>
                        <div class="row">
                            <button value="btnRegistrar" type="button" class="btn btn-link"  name="accion" data-bs-toggle="modal" data-bs-target="#exampleModal">REGISTRARSE</button>
                        </div> 
                </div>
                      
            </div>
            <div class="col-md-4">
            </div>

            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header diseño_m">
            <h5 class="modal-title" id="exampleModalLabel">REGISTRO</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
            <div class="modal-body diseño_m">
                
                <input type="text" id="txtNombre" class="form-control txt_modal" placeholder="NOMBRE" name="txtNombre"  maxlength="100">
                <input type="text" id="txtPaterno" class="form-control txt_modal" placeholder="APELLIDO PATERNO" name="txtPaterno"  maxlength="100">
                <input type="text" id="txtMaterno" class="form-control txt_modal" placeholder="APELLIDO MATERNO" name="txtMaterno"  maxlength="100">

                <input type="text" id="txtContra" class="form-control txt_modal" placeholder="CONTRASEÑA" name="txtPass"  maxlength="50">
                <input type="text" id="txtCarnet" class="form-control txt_modal" placeholder="CARNET" name="txtCarnet"  maxlength="8">
                <label class="label">FECHA DE NACIMIENTO</label> <input type="date" id="txtFecha" class="txt_fecha"  name="txtFecha" >
                
                <input type="text" id="txtCorreo" class="form-control txt_modal" placeholder="CORREO" name="txtCorreo"  maxlength="50">
                <input type="text" id="txtTelefono" class="form-control txt_modal" placeholder="TELEFONO" name="txtTelefono"  maxlength="8">
                <input type="text" id="txtDireccion" class="form-control txt_modal" placeholder="DIRECCION" name="txtDireccion" maxlength="200">
                
            </div>
            <div class="modal-footer diseño_m">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
                <button type="button" class="btn btn-primary"  id="btnGuardar" name="btnLogin" value="btnGuardar" onclick="register()">Guardar</button>
            </div>
        </form>
       
        </div>
    </div>
    </div>

    <input type="text" id="contador" style="display:none" value="0">


    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aafb2c5e00.js" crossorigin="anonymous"></script>
    <!--JS-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/val_login.js"></script>




</body>

</html>
