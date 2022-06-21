

function sel_producto(dataProductos){
    p=dataProductos.split('||');

   $("#txtIdProducto").val(p[0]);

   $("#txtDescripcionPro").val(p[2]+" "+p[3]+" "+p[1]);

   $("#txtStock").val(p[4]);



}



function comprar(id){

    var IdProducto = document.getElementById("txtIdProducto").value;

    var cantidad = $("#txtCantidad").val();
    
    var stock = $("#txtStock").val();

    var accion = document.getElementById("btnGua").value;

    var info = "venta="+id+"&producto="+IdProducto+"&cantidad="+cantidad+"&accion="+accion;

    var op =0;

    console.log(IdProducto+" "+cantidad+" "+id);
    
    if(cantidad==null||cantidad==''||isNaN(cantidad)||cantidad<=0||parseInt(cantidad) > (parseInt(stock)-2)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La cantidad es obligatoria y debe estar entre 0 y '+(parseInt(stock)-2),
        })
        op=1;
    }

    if(IdProducto==null||IdProducto==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No selecciono un producto',
        })
        op=1;
    }
    if(op==0){
        $.ajax({
            url: '../negocios/Negocios_VentasDetalle.php',
            type: 'POST',
            data: info,
        })
        .done(function(respuesta){

            if(respuesta=='ok'){

                setTimeout(function(){
                    location.href="P_ventasDetalle_presencial.php?id="+id;
                },1000);    
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


function eliminar_venta(x){
    p=x.split('||');

    console.log(x);

    var accion = document.getElementById("btnEli").value;

    infoEli = "id="+p[0]+"&accion="+accion;

    $.ajax({
        url: '../negocios/Negocios_VentasDetalle.php',
        type: 'POST',
        data: infoEli,
    })
    .done(function(respuesta){

        if(respuesta=='ok'){

            setTimeout(function(){
                location.href="P_ventasDetalle_presencial.php?id="+p[1];
            },1000);    
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Surgio un error:' + respuesta,
            })
        }
        
    });
}


function confirmar(cli,ven,total){

    location.href="P_ventas_presencial.php";
    
}

