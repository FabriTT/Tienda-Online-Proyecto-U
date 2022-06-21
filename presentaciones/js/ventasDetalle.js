function salir(){
    location.href="P_ventas.php";
}




function eliminar_venta(x){
    v=x.split('||');

    var accion = document.getElementById("btnEli").value;

    infoEli = "id="+v[1]+"&accion="+accion;

    $.ajax({
        url: '../negocios/Negocios_VentasDetalle.php',
        type: 'POST',
        data: infoEli,
    })
    .done(function(respuesta){

        if(respuesta=='ok'){
            Swal.fire({
                icon: 'success',
                title: 'Oops...',
                text: 'Se elimino correctamente',
            })
            setTimeout(function(){
                location.href="P_ventasDetalle.php?id="+v[0];
            },2000);    
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Surgio un error:' + respuesta,
            })
        }
        
    });
}



