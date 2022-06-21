function sel_empleado(dataEmpleados){
    e=dataEmpleados.split('||');

   $("#txtIdEmpleado").val(e[0]);
   $("#txtNombre").val(e[1]);
   $("#txtPaterno").val(e[2]);
   $("#txtMaterno").val(e[3]);
   $("#txtCarnet").val(e[4]);
   $("#txtFecha").val(e[5]);
   $("#txtTelefono").val(e[7]);
   $("#txtCorreo").val(e[6]);

   document.getElementById("txtCargo").value=e[8];
   document.getElementById("txtCargo").text=e[9];


}


function guardar_empleado(){
    var nombre = document.getElementById("txtNombre").value;
    var paterno = document.getElementById("txtPaterno").value;
    var materno = document.getElementById("txtMaterno").value;
    var contra = document.getElementById("txtPassword").value;
    var carnet = document.getElementById("txtCarnet").value;
    var fecha = document.getElementById("txtFecha").value;
    var cargo = document.getElementById("txtCargo").value;
    var telefono = document.getElementById("txtTelefono").value;
    var correo = document.getElementById("txtCorreo").value;

    var accion = document.getElementById("btnGua").value;

    var regExp1 = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/g;
    var regExp2 = /[a-zA-Z]+/;



    var infoGE = "nombre="+nombre+"&paterno="+paterno+"&materno="+materno+"&contra="+contra+"&carnet="+carnet+"&fecha="+fecha+"&cargo="+cargo+"&telefono="+telefono+"&correo="+correo+"&accion="+accion;
    var op=0;

    if(nombre==null||nombre==''||!regExp2.test(nombre)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El nombre es obligatorio y no debe contener numeros',
        })
        op=1;
    }
    if(paterno==null||paterno==''||!regExp2.test(paterno)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El apellido paterno es obligatorio y no debe contener numeros',
        })
        op=1;
    }
    if(materno==null||materno==''||!regExp2.test(materno)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El apellido materno es obligatorio y no debe contener numeros',
        })
        op=1;
    }
    if(contra==null||contra==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La contraseña es obligatorio',
        })
        op=1;
    }

    if(carnet==null||carnet==''||isNaN(carnet)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El carnet es obligatorio y debe contener solo numeros',
        })
        op=1;
    }

    if(fecha==null||fecha==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La fecha de nacimineto es obligatorio',
        })
        op=1;
    }

    if(cargo==null||cargo==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El cargo es obligatorio',
        })
        op=1;
    }

    if(correo==null||correo==''||!regExp1.test(correo)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El correo es obligatorio o el formato que ingreso es incorrecto',
        })
        op=1;
    }

    if(telefono==null||telefono==''||isNaN(telefono)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El telefono es obligatorio y debe contener solo numeros',
        })
        op=1;
    }

    


    if(op==0){
        $.ajax({
            url: '../negocios/Negocios_Empleados.php',
            type: 'POST',
            data: infoGE,
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
                    location.href="P_empleados.php";
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



function editar_empleado(){
    var nombre = document.getElementById("txtNombre").value;
    var paterno = document.getElementById("txtPaterno").value;
    var materno = document.getElementById("txtMaterno").value;
    var contra = document.getElementById("txtPassword").value;
    var carnet = document.getElementById("txtCarnet").value;
    var fecha = document.getElementById("txtFecha").value;
    var cargo = document.getElementById("txtCargo").value;
    var telefono = document.getElementById("txtTelefono").value;
    var correo = document.getElementById("txtCorreo").value;

    var id = document.getElementById("txtIdEmpleado").value;

    var accion = document.getElementById("btnEdit").value;

    var regExp1 = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/g;
    var regExp2 = /[a-zA-Z]+/;



    
    var op=0;

    if(nombre==null||nombre==''||!regExp2.test(nombre)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El nombre es obligatorio y no debe contener numeros',
        })
        op=1;
    }
    if(paterno==null||paterno==''||!regExp2.test(paterno)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El apellido paterno es obligatorio y no debe contener numeros',
        })
        op=1;
    }
    if(materno==null||materno==''||!regExp2.test(materno)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El apellido materno es obligatorio y no debe contener numeros',
        })
        op=1;
    }

    if(contra==null||contra==''){
        op=0;
        var infoEE = "nombre="+nombre+"&paterno="+paterno+"&materno="+materno+"&carnet="+carnet+"&fecha="+fecha+"&cargo="+cargo+"&telefono="+telefono+"&correo="+correo+"&accion="+accion+"&id="+id;
    }else{
        op=2;
        var infoEE = "nombre="+nombre+"&paterno="+paterno+"&materno="+materno+"&contra="+contra+"&carnet="+carnet+"&fecha="+fecha+"&cargo="+cargo+"&telefono="+telefono+"&correo="+correo+"&accion="+accion+"&id="+id;
    }

    if(carnet==null||carnet==''||isNaN(carnet)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El carnet es obligatorio y debe contener solo numeros',
        })
        op=1;
    }

    if(fecha==null||fecha==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La fecha de nacimineto es obligatorio',
        })
        op=1;
    }

    if(cargo==null||cargo==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El cargo es obligatorio',
        })
        op=1;
    }

    if(correo==null||correo==''||!regExp1.test(correo)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El correo es obligatorio o el formato que ingreso es incorrecto',
        })
        op=1;
    }

    if(telefono==null||telefono==''||isNaN(telefono)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El telefono es obligatorio y debe contener solo numeros',
        })
        op=1;
    }

    


    if(op==0){
        console.log('SIN CAMBIAR CONTRASEÑA');
        $.ajax({
            url: '../negocios/Negocios_Empleados.php',
            type: 'POST',
            data: infoEE,
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
                    location.href="P_empleados.php";
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


    if(op==2){
        console.log('CAMBIANDO CONTRASEÑA');
        
        $.ajax({
            url: '../negocios/Negocios_Empleados.php',
            type: 'POST',
            data: infoEE,
        })
        .done(function(respuesta){
            console.log(respuesta)
            if(respuesta=='ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Se modifico y se cambio la contraseña exitosamente',
                })
                setTimeout(function(){
                    location.href="P_empleados.php";
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




function eliminar_empleado(){
    var nombre = document.getElementById("txtNombre").value;
    var paterno = document.getElementById("txtPaterno").value;
    var materno = document.getElementById("txtMaterno").value;
    var contra = document.getElementById("txtPassword").value;
    var carnet = document.getElementById("txtCarnet").value;
    var fecha = document.getElementById("txtFecha").value;
    var cargo = document.getElementById("txtCargo").value;
    var telefono = document.getElementById("txtTelefono").value;
    var correo = document.getElementById("txtCorreo").value;

    var id = document.getElementById("txtIdEmpleado").value;

    var usuario = document.getElementById("txtIdUsuario").value;

    var accion = document.getElementById("btnEli").value;

    console.log(id+accion+usuario)

    var regExp1 = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/g;
    var regExp2 = /[a-zA-Z]+/;



    var infoELE = "accion="+accion+"&id="+id;
    var op=0;

    if(nombre==null||nombre==''||!regExp2.test(nombre)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El nombre es obligatorio y no debe contener numeros',
        })
        op=1;
    }
    if(paterno==null||paterno==''||!regExp2.test(paterno)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El apellido paterno es obligatorio y no debe contener numeros',
        })
        op=1;
    }
    if(materno==null||materno==''||!regExp2.test(materno)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El apellido materno es obligatorio y no debe contener numeros',
        })
        op=1;
    }


    if(carnet==null||carnet==''||isNaN(carnet)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El carnet es obligatorio y debe contener solo numeros',
        })
        op=1;
    }

    if(fecha==null||fecha==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La fecha de nacimineto es obligatorio',
        })
        op=1;
    }


    if(correo==null||correo==''||!regExp1.test(correo)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El correo es obligatorio o el formato que ingreso es incorrecto',
        })
        op=1;
    }

    if(telefono==null||telefono==''||isNaN(telefono)){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El telefono es obligatorio y debe contener solo numeros',
        })
        op=1;
    }

    

    
    if(op==0){
        $.ajax({
            url: '../negocios/Negocios_Empleados.php',
            type: 'POST',
            data: infoELE,
        })
        .done(function(respuesta){
            console.log(respuesta)
            if(respuesta=='ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Se elimino exitosamente',
                })
                if(usuario==id){
                    setTimeout(function(){
                        top.location.href="Pagina_principal/index.php";
                    },3000);  
                }else{
                    setTimeout(function(){
                        location.href="P_empleados.php";
                    },3000);  
                }
  
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


function ReporteEmp(){
    top.location.href="../reportes/ReporteEmpleados.php";
}