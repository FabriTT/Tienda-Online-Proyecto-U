<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/frm_graficas.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>
    <br>
        <center>
        <div class="row">
            <center><h2>GENERACION DE GRAFICAS</h2><center>
        </div>

        <div class="row frm">
                <div class="col-md-3">
                    <center><label class="label lbl">FECHA INICIAL</label></center> 
                </div>
                <div class="col-md-3">
                <input type="date" class="dt" id="txtInicio">
                </div>
                <div class="col-md-3">
                    <center><label class="label lbl">FECHA FINAL</label></center> 
                </div>
                <div class="col-md-3">
                <input type="date" class="dt" id="txtFin">
                </div>
        </div>
        <div class="row">
            <center> <button type="button" class="btn btn-success btn_g" id="accionVenta" value="venta" onclick="generar()">GENERAR GRAFICA</button></center>
        </div>


        <div class="row">
            <center><h2>GRAFICA DE VENTAS</h2><center>
        </div>
        <div class="row frm" id="actualizar">
            <canvas id="myChart" ></canvas>
        </div>
        </center>

        <br>

        <center>
        <div class="row">
            <center><h2></h2><center>
        </div>

        <div class="row frm">
                <div class="col-md-3">
                    <center><label class="label lbl">FECHA INICIAL</label></center> 
                </div>
                <div class="col-md-3">
                <input type="date" class="dt" id="txtInicio2">
                </div>
                <div class="col-md-3">
                    <center><label class="label lbl">FECHA FINAL</label></center> 
                </div>
                <div class="col-md-3">
                <input type="date" class="dt" id="txtFin2">
                </div>
        </div>
        <div class="row">
            <center> <button type="button" class="btn btn-success btn_g" id="accionCompra" value="compra" onclick="generar2()">GENERAR GRAFICA</button></center>
        </div>


        <div class="row">
            <center><h2>GRAFICA DE COMPRAS</h2><center>
        </div>
        <div class="row frm" id="actualizar">
            <canvas id="myChart2" ></canvas>
        </div>
        </center>
   
    
    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/aafb2c5e00.js" crossorigin="anonymous"></script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="js/graficas.js"></script>

    


</body>

</html>