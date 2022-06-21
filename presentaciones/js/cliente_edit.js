function editar_cliente(id){
    var nombre = document.getElementById("txtNombre").value;
    var paterno = document.getElementById("txtPaterno").value;
    var materno = document.getElementById("txtMaterno").value;
    var contra = document.getElementById("txtPassword").value;
    var carnet = document.getElementById("txtCarnet").value;
    var fecha = document.getElementById("txtFecha").value;
    var direccion = document.getElementById("txtDireccion").value;
    var telefono = document.getElementById("txtTelefono").value;
    var correo = document.getElementById("txtCorreo").value;

    console.log(id);

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
        var info = "nombre="+nombre+"&paterno="+paterno+"&materno="+materno+"&carnet="+carnet+"&fecha="+fecha+"&telefono="+telefono+"&correo="+correo+"&direccion="+direccion+"&accion="+accion+"&id="+id;
    }else{
        op=2;
        var info = "nombre="+nombre+"&paterno="+paterno+"&materno="+materno+"&contra="+contra+"&carnet="+carnet+"&fecha="+fecha+"&telefono="+telefono+"&correo="+correo+"&direccion="+direccion+"&accion="+accion+"&id="+id;
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

    if(direccion==null||direccion==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La direccion es obligatoria',
        })
        op=1;
    }

    


    if(op==0){
        console.log('SIN CAMBIAR CONTRASEÑA');
        $.ajax({
            url: '../negocios/Negocios_Clientes.php',
            type: 'POST',
            data: info,
        })
        .done(function(respuesta){
            console.log(respuesta)
            if(respuesta=='ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Se edito exitosamente su nombre de usuario es: CLI'+carnet,
                })
                setTimeout(function(){
                    top.location.href="P_interaccion.php?id="+id;
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
            url: '../negocios/Negocios_Clientes.php',
            type: 'POST',
            data: info,
        })
        .done(function(respuesta){
            console.log(respuesta)
            if(respuesta=='ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Se modifico los datos y se cambio la contraseña exitosamente su nombre de usuario es: CLI'+carnet,
                })
                setTimeout(function(){
                    top.location.href="P_interaccion.php?id="+id;
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
