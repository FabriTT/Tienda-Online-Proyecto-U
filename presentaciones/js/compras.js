function sel_compra(dataCompras){
    com=dataCompras.split('||');

   $("#txtIdCompra").val(com[0]);
   $("#txtDescripcion").val(com[1]);
   $("#txtFecha").val(com[2]);

   document.getElementById("txtIdProveedor").value=com[3];
   document.getElementById("txtIdProveedor").text=com[4];

   $("#txtCompraImg").val(com[4]+" "+com[2]);

   $("#txtIdCompraImg").val(com[0]);
   

   console.log(com[3]+"--"+com[4])

}




function guardar_com(){
    var compania = document.getElementById("txtIdProveedor").value;
    var descripcion = document.getElementById("txtDescripcion").value;
    var fecha = document.getElementById("txtFecha").value;


    var accion = document.getElementById("btnGua").value;


    var regExp2 = /[a-zA-Z]+/;



    var infoGCom = "compania="+compania+"&descripcion="+descripcion+"&fecha="+fecha+"&accion="+accion;
    var op=0;

    if(compania==null||compania==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El proveedor es obligatorio',
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

    if(fecha==null||fecha==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La fecha es obligatoria',
        })
        op=1;
    }



    if(op==0){
        $.ajax({
            url: '../negocios/Negocios_Compras.php',
            type: 'POST',
            data: infoGCom,
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
                    location.href="P_compras.php";
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




function editar_com(){
    var compania = document.getElementById("txtIdProveedor").value;
    var descripcion = document.getElementById("txtDescripcion").value;
    var fecha = document.getElementById("txtFecha").value;

    var id = document.getElementById("txtIdCompra").value;

    var accion = document.getElementById("btnEdit").value;


    var regExp2 = /[a-zA-Z]+/;



    var infoECom = "compania="+compania+"&descripcion="+descripcion+"&fecha="+fecha+"&accion="+accion+"&id="+id;
    var op=0;

    if(compania==null||compania==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El proveedor es obligatorio',
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

    if(fecha==null||fecha==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La fecha es obligatoria',
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
            url: '../negocios/Negocios_Compras.php',
            type: 'POST',
            data: infoECom,
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
                    location.href="P_compras.php";
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




function eliminar_com(){

    var descripcion = document.getElementById("txtDescripcion").value;
    var fecha = document.getElementById("txtFecha").value;

    var id = document.getElementById("txtIdCompra").value;

    var accion = document.getElementById("btnEli").value;


    var regExp2 = /[a-zA-Z]+/;



    var infoELCom = "descripcion="+descripcion+"&fecha="+fecha+"&accion="+accion+"&id="+id;
    var op=0;


    if(descripcion==null||descripcion==''||!regExp2.test(descripcion)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La descripcion es obligatoria y no debe contener numeros',
        })
        op=1;
    }

    if(fecha==null||fecha==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La fecha es obligatoria',
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
            url: '../negocios/Negocios_Compras.php',
            type: 'POST',
            data: infoELCom,
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
                    location.href="P_compras.php";
                },3000);    
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: respuesta,
                })
            }
            
        });
    }

}


function abrir_compra(dataCompras){
    var id = document.getElementById("txtIdCompra").value;


    com=dataCompras.split('||');




    if(id==null||id==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No selecciono un registro',
        })
        op=1;
    }else{
        location.href="P_comprasDetalle.php?id="+id+"&prov="+com[3];
    }

    
}


function ReporteCom(){
    top.location.href="../reportes/ReporteCompras.php";
}