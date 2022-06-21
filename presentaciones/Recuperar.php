<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/recuperar.css">
</head>

<body>

    <div class="container-fluid">

        <div class="row centrear">
            <div class="col-md-4">
            </div>

            <center>
            <div class="col-md-4  ">
                <center><img src="img/escudo.png" class="imagen"></center>
                
                <div class="body_login text-center">
                    <form action="#" method="post">

                        <div class="row text-center">
                            <div class="col-md-1">
                                <i class="fa-regular fa-at icons"></i>
                                
                            </div>
                            <div class="col-md-11 m_col">
                                <input type="text" id="txtCorreo" class="form-control txt" placeholder="CORREO" name="txtCorreo" maxlength="50">    
                            </div>   
                        </div>


                        <div style="display:none" id="divNumero">
                            <div class="row text-center" >
                                <div class="col-md-1">
                                    <i class="fa-solid fa-hashtag icons"></i>
                                    
                                </div>
                                <div class="col-md-11 m_col">
                                    <input type="text" id="txtNumero" class="form-control txt" placeholder="NUMERO" name="txtNumero" maxlength="5">    
                                </div>   
                            </div>
                        </div>
                        

                        <div  style="display:none" id="divContra">
                            <div class="row text-center">
                                <div class="col-md-1">
                                    <i class="fa-solid fa-unlock icons"></i>
                                </div>
                                <div class="col-md-11">
                                    <div class="input-group largo">
                                        <input type="password" id="txtPassword" class="form-control txt" placeholder="CONTRASEÑA" name="txtPassword" maxlength="50">
                                        <button class="btn btn-outline-secondary btn_eye" type="button" onclick="ocultar()"><i class="fa-solid fa-eye eye"></i></button>
                                    </div>
                                </div>       
                            </div>
                        </div>
                        

                        <div class="row align-items-center">
                            <center><button value="btnVerificar" type="button" class="btn btn-outline-light guardar"  name="accion" id="btnVerificar"  onclick="verificar()" >VERIFICAR</button></center>
                        </div>

                        <div class="row align-items-center">
                            <center><button value="btnRestablecer" type="button" class="btn btn-outline-light guardar"  name="accion" id="btnRestablecer"  onclick="CambiarContra()" style="display:none" >RESTABLECER</button></center>
                        </div>

                        <div class="row align-items-center">
                            <center><button value="btnComprobar" type="button" class="btn btn-outline-light guardar"  name="accion" id="btnComprobar"  onclick="validarNum()" style="display:none" >COMPROBAR</button></center>
                        </div>

                    </form>

                    <input type="hidden" class="form-control" id="OcultoId"  value="" >
                    <input type="hidden" class="form-control" id="OcultoTabla"  value="" >
                </div>
   
            </div>
            </center>

            <div class="col-md-4">

            </div>

            </div>
        </div>
        
    </div>

   

    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aafb2c5e00.js" crossorigin="anonymous"></script>
    <!--JS-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/recuperar.js"></script>




</body>

</html>
