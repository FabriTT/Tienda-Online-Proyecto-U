function sel_venta(dataVentas){
    ven=dataVentas.split('||');

   $("#txtIdVenta").val(ven[0]);
   $("#txtDescripcion").val("fecha: "+ ven[1]+" total: "+ven[2]);


}






function abrir_venta(x){
    var id = document.getElementById("txtIdVenta").value;


    if(id==null||id==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No selecciono un registro',
        })
        op=1;
    }else{
        location.href="P_cliente_compra_detalle.php?id="+id+"&cli="+x;
    }

    
}

function confirmar(x){

    var id = document.getElementById("txtIdVenta").value;
    var op=0;

    infoConfi = "accion="+"confirmar"+"&venta="+id;

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
            data: infoConfi,
        })
        .done(function(respuesta){
            console.log(respuesta)
            if(respuesta=='ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Gracias por su confirmacion',
                })
                setTimeout(function(){
                    location.href="P_cliente_compra.php?id="+x;
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

function reclamar(x){
    var id = document.getElementById("txtIdVenta").value;
    op=0;
    infoRecla = "accion="+"reclamar"+"&venta="+id;

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
            data: infoRecla,
        })
        .done(function(respuesta){
            console.log(respuesta)
            if(respuesta=='ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Nos comunicaremos con usted lo mas pronto posible ',
                })
                setTimeout(function(){
                    location.href="P_cliente_compra.php?id="+x;
                },4000);    
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

