function sel_proveedor(dataProveedores){
    pr=dataProveedores.split('||');

   $("#txtIdProveedor").val(pr[0]);
   $("#txtCompania").val(pr[1]);
   $("#txtDescripcion").val(pr[2]);
   $("#txtDireccion").val(pr[3]);
   $("#txtTelefono").val(pr[4]);
}

function guardar_prov(){
    var compania = document.getElementById("txtCompania").value;
    var descripcion = document.getElementById("txtDescripcion").value;
    var direccion = document.getElementById("txtDireccion").value;
    var telefono = document.getElementById("txtTelefono").value;

    var accion = document.getElementById("btnGua").value;


    var regExp2 = /[a-zA-Z]+/;



    var infoGPr = "compania="+compania+"&descripcion="+descripcion+"&direccion="+direccion+"&telefono="+telefono+"&accion="+accion;
    var op=0;

    if(compania==null||compania==''||!regExp2.test(compania)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El nombre de la compania es obligatorio y no debe contener numeros',
        })
        op=1;
    }
    if(descripcion==null||descripcion==''||!regExp2.test(descripcion)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La descripcion es obligatorio y no debe contener numeros',
        })
        op=1;
    }

    if(direccion==null||direccion==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La direccion es obligatoria',
        })
        op=1;
    }

    if(telefono==null||telefono==''||isNaN(telefono)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El telefono es obligatorio y no debe contener letras',
        })
        op=1;
    }


    


    if(op==0){
        $.ajax({
            url: '../negocios/Negocios_Proveedores.php',
            type: 'POST',
            data: infoGPr,
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
                    location.href="P_proveedores.php";
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



function editar_prov(){
    var compania = document.getElementById("txtCompania").value;
    var descripcion = document.getElementById("txtDescripcion").value;
    var direccion = document.getElementById("txtDireccion").value;
    var telefono = document.getElementById("txtTelefono").value;

    var id = document.getElementById("txtIdProveedor").value;

    var accion = document.getElementById("btnEdit").value;


    var regExp2 = /[a-zA-Z]+/;

    console.log(id+accion);

    var infoEPr = "compania="+compania+"&descripcion="+descripcion+"&direccion="+direccion+"&telefono="+telefono+"&accion="+accion+"&id="+id;
    var op=0;

    if(compania==null||compania==''||!regExp2.test(compania)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El nombre de la compania es obligatorio y no debe contener numeros',
        })
        op=1;
    }
    if(descripcion==null||descripcion==''||!regExp2.test(descripcion)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La descripcion es obligatorio y no debe contener numeros',
        })
        op=1;
    }

    if(direccion==null||direccion==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La direccion es obligatoria',
        })
        op=1;
    }

    if(telefono==null||telefono==''||isNaN(telefono)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El telefono es obligatorio y no debe contener letras',
        })
        op=1;
    }

    if(id==null||id==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No selecciono un proveedor',
        })
        op=1;
    }


    

    if(op==0){
        $.ajax({
            url: '../negocios/Negocios_Proveedores.php',
            type: 'POST',
            data: infoEPr,
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
                    location.href="P_proveedores.php";
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



function eliminar_prov(){

    var compania = document.getElementById("txtCompania").value;
    var descripcion = document.getElementById("txtDescripcion").value;
    var direccion = document.getElementById("txtDireccion").value;
    var telefono = document.getElementById("txtTelefono").value;
    var id = document.getElementById("txtIdProveedor").value;

    var accion = document.getElementById("btnEli").value;


    var regExp2 = /[a-zA-Z]+/;

    console.log(id+accion);

    var infoELPr = "accion="+accion+"&id="+id;
    var op=0;

    if(compania==null||compania==''||!regExp2.test(compania)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El nombre de la compania es obligatorio y no debe contener numeros',
        })
        op=1;
    }
    if(descripcion==null||descripcion==''||!regExp2.test(descripcion)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La descripcion es obligatorio y no debe contener numeros',
        })
        op=1;
    }

    if(direccion==null||direccion==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La direccion es obligatoria',
        })
        op=1;
    }

    if(telefono==null||telefono==''||isNaN(telefono)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El telefono es obligatorio y no debe contener letras',
        })
        op=1;
    }

    if(id==null||id==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No selecciono un proveedor',
        })
        op=1;
    }


    

    if(op==0){
        $.ajax({
            url: '../negocios/Negocios_Proveedores.php',
            type: 'POST',
            data: infoELPr,
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
                    location.href="P_proveedores.php";
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


function ReporteProv(){
    top.location.href="../reportes/ReporteProveedores.php";
}
