function sel_venta(dataVentas){
    ven=dataVentas.split('||');

   $("#txtIdVenta").val(ven[0]);
   $("#txtDescripcion").val(ven[1]);



   document.getElementById("txtIdEmpleado").value=ven[7];
   document.getElementById("txtIdEmpleado").text=ven[2]+" "+ven[3];

   document.getElementById("txtIdCliente").value=ven[6];
   document.getElementById("txtIdCliente").text=ven[4]+" "+ven[5];

}

function guardar(){
    var cliente = document.getElementById("txtIdCliente").value;
    var empleado = document.getElementById("txtIdEmpleado").value;
    var descripcion = document.getElementById("txtDescripcion").value;
    var accion = document.getElementById("btnGua").value;

    console.log(cliente+"  "+empleado);
    var info =  "cliente="+cliente+"&empleado="+empleado+"&descripcion="+descripcion+"&accion="+accion;

    var op=0;

    if(cliente==null||cliente==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El cliente es obligatorio',
        })
        op=1;
    }
    if(empleado==null||empleado==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El empelado es obligatorio',
        })
        op=1;
    }
    if(descripcion==null||descripcion==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La descripcion es obligatoria ',
        })
        op=1;
    }

    if(op==0){
        $.ajax({
            url: '../negocios/Negocios_VentasPre.php',
            type: 'POST',
            data: info,
        })
        .done(function(respuesta){
            console.log(respuesta)
            if(respuesta=='ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Se registro exitosamente',
                })
                setTimeout(function(){
                    location.href="P_ventas_presencial.php";
                },3000);    
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Surgio un error:' + respuesta,
                })
            }
            
        });
    }


}

function eliminar(){
    var id = document.getElementById("txtIdVenta").value;
    var accion = document.getElementById("btnEli").value;

    var info =  "id="+id+"&accion="+accion;

    var op=0;

    if(id==null||id==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No seleccciono una venta',
        })
        op=1;
    }

    if(op==0){
        $.ajax({
            url: '../negocios/Negocios_VentasPre.php',
            type: 'POST',
            data: info,
        })
        .done(function(respuesta){
            console.log(respuesta)
            if(respuesta=='ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Se registro exitosamente',
                })
                setTimeout(function(){
                    location.href="P_ventas_presencial.php";
                },3000);    
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Surgio un error:' + respuesta,
                })
            }
            
        });
    }

}





function abrir_venta(){
    var id = document.getElementById("txtIdVenta").value;


    if(id==null||id==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No selecciono un registro',
        })
        op=1;
    }else{
        location.href="P_ventasDetalle_presencial.php?id="+id;
    }

    
}


function ReporteVen(){
    top.location.href="../reportes/ReporteVentas.php";
}