function sel_producto(dataProductos){
    p=dataProductos.split('||');

   $("#txtIdProducto").val(p[0]);
   $("#txtDescripcionPro").val(p[1]);
   $("#txtStock").val(p[2]);
   $("#txtPrecioCom").val(p[3]);
   $("#txtPrecioVen").val(p[4]);


   $("#txtDescripcionImg").val(p[1]);
   
   document.getElementById("txtProveedor").value=p[5];
   document.getElementById("txtProveedor").text=p[6];

   document.getElementById("txtClasificacion").value=p[7];
   document.getElementById("txtClasificacion").text=p[8]+" "+p[9];


}


function guardar_pro(){

    var proveedor = document.getElementById("txtProveedor").value;
    var clasificacion = document.getElementById("txtClasificacion").value;

    var producto = document.getElementById("txtDescripcionPro").value;
    var stock = document.getElementById("txtStock").value;

    var precio_com = document.getElementById("txtPrecioCom").value;
    var precio_ven = document.getElementById("txtPrecioVen").value;

    var accion = document.getElementById("btnGuarPro").value;

    var regExp2 = /[a-zA-Z]+/;



    var infoGP = "producto="+producto+"&stock="+stock+"&precio_com="+precio_com+"&precio_ven="+precio_ven+"&proveedor="+proveedor+"&clasificacion="+clasificacion+"&accion="+accion;
    var op=0;

    if(producto==null||producto==''||!regExp2.test(producto)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El nombre del producto es obligatorio y no debe contener numeros',
        })
        op=1;
    }
    if(stock==null||stock==''||isNaN(stock)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El stock es obligatorio y no debe contener letras',
        })
        op=1;
    }

    if(precio_com==null||precio_com==''||isNaN(precio_com)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El precio de compra es obligatorio y no debe contener letras',
        })
        op=1;
    }


    if(precio_ven==null||precio_ven==''||isNaN(precio_ven)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El precio de venta es obligatorio y no debe contener letras',
        })
        op=1;
    }



    if(clasificacion==null||clasificacion==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La clasificacion es obligatoria',
        })
        op=1;
    }

    if(proveedor==null||proveedor==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El proveedor es obligatoria',
        })
        op=1;
    }

    if(op==0){
        $.ajax({
            url: '../negocios/Negocios_Productos.php',
            type: 'POST',
            data: infoGP,
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
                    location.href="P_productos.php";
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

function editar_pro(){
    var IdProducto = document.getElementById("txtIdProducto").value;
    var producto = document.getElementById("txtDescripcionPro").value;
    var stock = document.getElementById("txtStock").value;
    
    var precio_com = document.getElementById("txtPrecioCom").value;
    var precio_ven = document.getElementById("txtPrecioVen").value;

    var proveedor = document.getElementById("txtProveedor").value;
    var clasificacion = document.getElementById("txtClasificacion").value;

    var accion = document.getElementById("btnEditPro").value;

    var regExp2 = /[a-zA-Z]+/;



    var infoEP = "producto="+producto+"&stock="+stock+"&precio_com="+precio_com+"&precio_ven="+precio_ven+"&clasificacion="+clasificacion+"&proveedor="+proveedor+"&accion="+accion+"&id="+IdProducto;
    var op=0;


    if(producto==null||producto==''||!regExp2.test(producto)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El nombre del producto es obligatorio y no debe contener numeros',
        })
        op=1;
    }
    if(stock==null||stock==''||isNaN(stock)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El stock es obligatorio y no debe contener letras',
        })
        op=1;
    }
   

    if(precio_com==null||precio_com==''||isNaN(precio_com)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El precio de compra es obligatorio y no debe contener letras',
        })
        op=1;
    }


    if(precio_ven==null||precio_ven==''||isNaN(precio_ven)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El precio de venta es obligatorio y no debe contener letras',
        })
        op=1;
    }



    if(clasificacion==null||clasificacion==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La clasificacion es obligatoria',
        })
        op=1;
    }

    if(proveedor==null||proveedor==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El proveedor es obligatorio',
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
            url: '../negocios/Negocios_Productos.php',
            type: 'POST',
            data: infoEP,
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
                    location.href="P_productos.php";
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

function eliminar_pro(){
    var IdProducto = document.getElementById("txtIdProducto").value;

    var accion = document.getElementById("btnEliPro").value;



    var infoELP = "accion="+accion+"&id="+IdProducto;
    var op=0;


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
            url: '../negocios/Negocios_Productos.php',
            type: 'POST',
            data: infoELP,
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
                    location.href="P_productos.php";
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






function ReportePro(){
    top.location.href="../reportes/ReporteProducto.php";
}

function ReporteProAudi(){
    top.location.href="../reportes/ReporteAuditoriaProductos.php";
}

