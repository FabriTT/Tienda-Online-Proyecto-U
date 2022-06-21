
function ocultar(){
    var x =document.getElementById("txtPassword");
    if(x.type=="password"){
         x.type="text";
    }else{
         x.type="password";
    }
}



function val_login(){
    var x = document.getElementById("contador").value;
    var usuario = document.getElementById("txtNickname").value;
    var password = document.getElementById("txtPassword").value;
    var accion = document.getElementById("btnLogin").value;
    var info = "usuario="+usuario+"&password="+password+"&accion="+accion;
    if(usuario === '' || password === ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El usuario y la contraseña son campos obligatorios',
        })
    }else{
        $.ajax({
            url: '../negocios/Negocios_login.php',
            type: 'POST',
            data: info,
        })
        .done(function(respuesta){
            console.log(respuesta)
            res=JSON.parse(respuesta)
            console.log(res)
            console.log(x)
            if(res[1]=='empleados'){
    
                location.href="dashboard.php?id="+res[0];
    
            }else if(res[1]=='clientes'){
    
                location.href="P_interaccion.php?id="+res[0];
    
            }else if(res[0]==null){
                x++;
                document.getElementById("contador").value=x;
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Usted no esta registrado o el nombre de usuario y contraseña son incorrectos',
                })
                if(x>3){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Usted realizo demasiados intentos puede cambiar su contraseña con el siguiente link',
                        footer: '<a href="Recuperar.php">Olvidaste tu contraseña?</a>'
                    })
                }
            }
        });
    }
    
}

function register(){
    var nombre = document.getElementById("txtNombre").value;
    var paterno = document.getElementById("txtPaterno").value;
    var materno = document.getElementById("txtMaterno").value;
    var contra = document.getElementById("txtContra").value;
    var carnet = document.getElementById("txtCarnet").value;
    var fecha = document.getElementById("txtFecha").value;
    var correo = document.getElementById("txtCorreo").value;
    var telefono = document.getElementById("txtTelefono").value;
    var direccion = document.getElementById("txtDireccion").value;
    var accion = document.getElementById("btnGuardar").value;

    var regExp1 = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/g;
    var regExp2 = /[a-zA-Z]+/;



    var info2 = "nombre="+nombre+"&paterno="+paterno+"&materno="+materno+"&contra="+contra+"&carnet="+carnet+"&fecha="+fecha+"&correo="+correo+"&telefono="+telefono+"&direccion="+direccion+"&accion="+accion;
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
            text: 'La direccion es obligatorio',
        })
        op=1;
    }

    if(op==0){
        $.ajax({
            url: '../negocios/Negocios_Clientes.php',
            type: 'POST',
            data: info2,
        })
        .done(function(respuesta){
            console.log(respuesta)
            if(respuesta=='ok'){
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto',
                    text: 'Se registro exitosamente su nombre de usuario es: CLI'+carnet,
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

