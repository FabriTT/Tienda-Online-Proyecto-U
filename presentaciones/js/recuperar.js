var codigo = parseInt(Math.random()*10000);

function ocultar(){
    var x =document.getElementById("txtPassword");
    if(x.type=="password"){
         x.type="text";
    }else{
         x.type="password";
    }
}

function verificar(){
     var correo = document.getElementById("txtCorreo").value;
     var accion = document.getElementById("btnVerificar").value;
     
     var info = "correo="+correo+"&accion="+accion;
     var info2 = "correo="+correo+"&codigo="+codigo;

     var regExp1 = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/g;
     var op =0;


     if(correo==null||correo==''||!regExp1.test(correo)){
          Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'El correo es obligatorio o el formato que ingreso es incorrecto',
          })
          op=1;
     }

     if(op==0){
          $.ajax({
               url: '../negocios/Negocios_login.php',
               type: 'POST',
               data: info,
           })
           .done(function(respuesta){
               res=JSON.parse(respuesta)
               if(res[0]!=null){
                   document.getElementById("OcultoId").value=res[0];
                   document.getElementById("OcultoTabla").value=res[1];
                   $.ajax({
                    url: '../negocios/Correos.php',
                    type: 'POST',
                    data: info2,
                    })
                    .done(function(respuesta2){
                       
                        if(respuesta2=='ok'){
                            Swal.fire({
                                icon: 'success',
                                title: 'Correcto',
                                text: 'Se evnio a su correo un codigo para verificar su identidad, debe ingresar el codigo en el siguiente campo',
                            })
                            document.getElementById("divNumero").style.display='block';
                            document.getElementById("btnComprobar").style.display='block';
                            document.getElementById("btnVerificar").style.display='none';
                            document.getElementById("txtCorreo").disabled=true;
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Error:'+respuesta2,
                            })
                        }
                        
                    });
               }else{
                   Swal.fire({
                       icon: 'error',
                       title: 'Oops...',
                       text: 'El correo que ingreso no se encuentra registrado en el sistema',
                   })
               }
               
           });
     }
}

function validarNum(){
    var numero = document.getElementById("txtNumero").value;

    if(numero==codigo){
        document.getElementById("divContra").style.display='block';
        document.getElementById("txtNumero").disabled=true;
        document.getElementById("btnComprobar").style.display='none';
        document.getElementById("btnRestablecer").style.display='block';

    }else{
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El codigo es incorrecto',
        })
    }
}

function CambiarContra(){
    var contra = document.getElementById("txtPassword").value;
    var id = document.getElementById("OcultoId").value;
    var tabla = document.getElementById("OcultoTabla").value;


    var infoContra = "contra="+contra+"&id="+id+"&tabla="+tabla;

    var op =0;

    if(contra==null||contra==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El campo de la contraseña esta vacio',
        })
        op=1;
   }

   if(op==0){
    $.ajax({
        url: '../negocios/Negocios_login.php',
        type: 'POST',
        data: infoContra,
    })
    .done(function(respuesta3){

        if(respuesta3.trim()=='okey'){
            Swal.fire({
                icon: 'success',
                title: 'Finalizacion',
                text: 'Se modifico exitosamente su contraseña',
            })
            document.getElementById("txtPassword").disabled=true;
            document.getElementById("btnRestablecer").style.display='none';
            setTimeout(function(){
                location.href="login.php";
            },3000);
            
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error'+respuesta3,
            })
        }
    });
   }
}