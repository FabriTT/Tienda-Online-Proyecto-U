function eliminar_cliente(id){

    var usuario = document.getElementById("txtUsuario").value;
    var password = document.getElementById("txtPassword").value;

    var accion = document.getElementById("btnEli").value;

    var info = "usuario="+usuario+"&contra="+password+"&accion="+accion;

    if(usuario === '' || password === ''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El usuario y la contraseña son campos obligatorios',
        })
    }else{
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
                    text: 'Se elimino su cuenta',
                })
                setTimeout(function(){
                    top.location.href="Pagina_principal/index.php";
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