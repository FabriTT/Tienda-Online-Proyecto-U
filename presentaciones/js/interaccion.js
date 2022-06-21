
function P_editar(x){
    var url = "P_cliente_edit.php?id="+x;
    document.getElementById("iframeDashboard").src=url;
}

function P_eliminar(x){
    var url = "P_cliente_delete.php?id="+x;
    document.getElementById("iframeDashboard").src=url;
}

function P_comprar(x){

    var accion = document.getElementById("btnCom").value;

    var info = "cliente="+x+"&accion="+accion;
    
    $.ajax({
        url: '../negocios/Negocios_Ventas.php',
        type: 'POST',
        data: info,
    })
    .done(function(respuesta){
        console.log(respuesta)
        if(!isNaN(respuesta)){
            setTimeout(function(){
                top.location.href="Carrito.php?id="+respuesta;
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


function salir(){
    location.href="Pagina_principal/index.php";
}

function ver_compras(x){
    var url = "P_cliente_compra.php?id="+x;
    document.getElementById("iframeDashboard").src=url;
}

