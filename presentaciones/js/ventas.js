function sel_venta(dataVentas){
    ven=dataVentas.split('||');

   $("#txtIdVenta").val(ven[0]);
   $("#txtDescripcion").val(ven[1]);

   document.getElementById("lblCliente").innerHTML=ven[5]+" "+ven[6]+" "+ven[7];

   document.getElementById("txtIdEmpleado").value=ven[8];
   document.getElementById("txtIdEmpleado").text=ven[3]+" "+ven[4];
   console.log(ven[8]+"--"+ven[3]+" "+ven[4])


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
        location.href="P_ventasDetalle.php?id="+id;
    }

    
}


function editar_venta(){
    var id = document.getElementById("txtIdVenta").value;
    var descripcion = document.getElementById("txtDescripcion").value;
    var empleado = document.getElementById("txtIdEmpleado").value;

    var accion = document.getElementById("btnEdit").value;
    console.log(empleado);
    var regExp2 = /[a-zA-Z]+/;


    var info = "id="+id+"&descripcion="+descripcion+"&empleado="+empleado+"&accion="+accion;
    var op=0;

    if(empleado==null||empleado==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El repartidor es obligatorio y no debe contener numeros',
        })
        op=1;
    }

    if(descripcion==null||descripcion==''||!regExp2.test(descripcion)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La descripcion es obligatoria y no debe contener numeros',
        })
        op=1;
    }

    if(id==null||id==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No selecciono un registro',
        })
        op=1;
    }

    if(op==0){
        $.ajax({
            url: '../negocios/Negocios_Ventas.php',
            type: 'POST',
            data: info,
        })
        .done(function(respuesta){
            console.log(respuesta)
            if(respuesta=='ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Se edito exitosamente',
                })
                setTimeout(function(){
                    location.href="P_ventas.php";
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


function advertencia(dataVentas){
    ven=dataVentas.split('||');
    infoAdvertencia="correo="+ven[2];

    $.ajax({
        url: '../negocios/CorreoAdvertencia.php',
        type: 'POST',
        data: infoAdvertencia,
    })
    .done(function(respuesta){
        console.log(respuesta)
        if(respuesta=='ok'){
            Swal.fire({
                icon: 'success',
                title: 'Correcto',
                text: 'Se envio el correo exitosamente',
            })  
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Surgio un error:' + respuesta,
            })
        }
        
    });

}



function anular(dataVentas){
    ven=dataVentas.split('||');

    var accion = document.getElementById("btnA").value;

    infoVeri="id="+ven[0]+"&accion="+accion;
    infoAnular="correo="+ven[2];

    $.ajax({
        url: '../negocios/Negocios_Ventas.php',
        type: 'POST',
        data: infoVeri,
    })
    .done(function(respuesta){
        //----------------------------------------------

        if(respuesta=='ok'){

            $.ajax({
                url: '../negocios/CorreoAnular.php',
                type: 'POST',
                data: infoAnular,
            })
            .done(function(respuesta2){
                //----------------------------------------------------------------------------------------
                console.log(respuesta2)
                if(respuesta2=='ok'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto',
                        text: 'Se envio el correo exitosamente',
                    }) 
                    setTimeout(function(){
                        location.href="P_ventas.php";
                    },3000);   
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Surgio un error:' + respuesta2,
                    })
                }
                
            });




        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error: '+respuesta,
            })
        }
        
    });


}






function confirmar(dataVentas){
    ven=dataVentas.split('||');

    infoConfirmar="correo="+ven[2]+"&nombre="+ven[3]+"&paterno="+ven[4];
    infoOcupar="accion="+"ocupar"+"&id="+ven[8];

    op=0;

    if(ven[3]==null||ven[3]==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No asigno un repartidor para esta venta',
        })
        op=1;
    }


    


    if(op==0){

        $.ajax({
            url: '../negocios/Negocios_Empleados.php',
            type: 'POST',
            data: infoOcupar,
        })
        .done(function(respuesta){
    
        });

        $.ajax({
            url: '../negocios/CorreoConfirmar.php',
            type: 'POST',
            data: infoConfirmar,
        })
        .done(function(respuesta){
            console.log(respuesta)
            if(respuesta=='ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Se envio el correo exitosamente',
                })  
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


function ReporteVen(){
    top.location.href="../reportes/ReporteVentas.php";
}