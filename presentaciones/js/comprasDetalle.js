function salir(){
    location.href="P_compras.php";
}


function sel_comdet(dataComprasDet){
    comdet=dataComprasDet.split('||');

   $("#txtIdCompraDet").val(comdet[0]);
   $("#txtCantidad").val(comdet[1]);

   document.getElementById("txtIdProducto").value=comdet[2];
   document.getElementById("txtIdProducto").text=comdet[3];
   console.log(comdet[2]+"--"+comdet[3]);

}



function guardar_comdet(x,y){

    var producto = document.getElementById("txtIdProducto").value;
    var cantidad = document.getElementById("txtCantidad").value;
    var compra = document.getElementById("txtIdCompra").value;


    var accion = document.getElementById("btnGua").value;

    console.log(accion);


    var infoG = "producto="+producto+"&cantidad="+cantidad+"&compra="+compra+"&accion="+accion;
    var op=0;

    if(producto==null||producto==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El producto es obligatorio es obligatorio y no debe contener numeros',
        })
        op=1;
    }
    if(cantidad==null||cantidad==''||isNaN(cantidad)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La cantidad es obligatoria y no debe contener letras',
        })
        op=1;
    }


    


    

    if(op==0){
        $.ajax({
            url: '../negocios/Negocios_ComprasDetalle.php',
            type: 'POST',
            data: infoG,
        })
        .done(function(respuesta){
            console.log(respuesta)
            if(respuesta=='ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Se guardo exitosamente',
                })
                setTimeout(function(){
                    location.href="P_comprasDetalle.php?id="+x+"&prov="+y;
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







function eliminar_comdet(x,y){


    var id = document.getElementById("txtIdCompraDet").value;

    var accion = document.getElementById("btnEli").value;



    console.log(id+accion);

    var infoE = "accion="+accion+"&id="+id;
    var op=0;



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
            url: '../negocios/Negocios_ComprasDetalle.php',
            type: 'POST',
            data: infoE,
        })
        .done(function(respuesta){
            console.log(respuesta)
            if(respuesta=='ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Se elimino exitosamente',
                })
                setTimeout(function(){
                    location.href="P_comprasDetalle.php?id="+x+"&prov="+y;
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