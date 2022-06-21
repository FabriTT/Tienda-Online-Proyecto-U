function P_clientes(){
    var url = "P_clientes.php";
    document.getElementById("iframeDashboard").src=url;
}

function P_empleados(x){
    
    console.log(x);
    var url = "P_empleados.php?id="+x;
    document.getElementById("iframeDashboard").src=url;

}

function P_proveedores(){
    var url = "P_proveedores.php";
    document.getElementById("iframeDashboard").src=url;
}

function P_productos(){
    var url = "P_productos.php";
    document.getElementById("iframeDashboard").src=url;
}

function P_ventas(){
    var url = "P_ventas.php";
    document.getElementById("iframeDashboard").src=url;
}

function P_ventas_presencial(){
    var url = "P_ventas_presencial.php";
    document.getElementById("iframeDashboard").src=url;
}

function P_compras(){
    var url = "P_compras.php";
    document.getElementById("iframeDashboard").src=url;
}

function P_graficas(){
    var url = "P_graficas.php";
    document.getElementById("iframeDashboard").src=url;
}


function salir(){
    location.href="Pagina_principal/index.php";
}

$(document).ready(function(){
    
    var cadena = JSON.parse(aux);

    console.log(cadena); 

    var botonProductos = document.getElementById("btnProductos");
    var botonProveedores = document.getElementById("btnProveedores");
    var botonClientes = document.getElementById("btnClientes");
    var botonEmpleados = document.getElementById("btnEmpleados");
    var botonVentas = document.getElementById("btnVentas");
    var botonVentasPresencial = document.getElementById("btnVentasPresencial");
    var botonCompras = document.getElementById("btnCompras");
    var botonGraficas = document.getElementById("btnGraficas");
    var botonEstado = document.getElementById("btnDesocupado");



    if(cadena=='ALM'){

        botonProveedores.disabled=true;
        botonClientes.disabled=true;
        botonEmpleados.disabled=true;
        botonVentas.disabled=true;
        botonVentasPresencial.disabled=true;
        botonCompras.disabled=true;
        botonGraficas.disabled=true;
        botonEstado.style.display='none';

    }else if(cadena=='CFO'){
        botonProductos.disabled=true;
        botonProveedores.disabled=true;
        botonClientes.disabled=true;
        botonEmpleados.disabled=true;
        botonVentas.disabled=true;
        botonVentasPresencial.disabled=true;
        botonCompras.disabled=true;
        botonEstado.style.display='none';

    }else if(cadena=='ECV'){
        botonProductos.disabled=true;
        botonProveedores.disabled=true;
        botonClientes.disabled=true;
        botonEmpleados.disabled=true;
        botonGraficas.disabled=true;
        botonEstado.style.display='none';

    }else if(cadena=='RRHH'){
        botonProductos.disabled=true;
        botonVentas.disabled=true;
        botonVentasPresencial.disabled=true;
        botonCompras.disabled=true;
        botonGraficas.disabled=true;
        botonEstado.style.display='none';
        
    }else if(cadena=='REP'){
        botonProveedores.disabled=true;
        botonClientes.disabled=true;
        botonEmpleados.disabled=true;
        botonVentas.disabled=true;
        botonVentasPresencial.disabled=true;
        botonCompras.disabled=true;
        botonGraficas.disabled=true;
        botonProductos.disabled=true;
    }

           
});


function desocupar(id){

    info="accion="+"desocupar"+"&id="+id;
    $.ajax({
        url: '../negocios/Negocios_Empleados.php',
        type: 'POST',
        data: info,
    })
    .done(function(respuesta){
        console.log(respuesta)
        if(respuesta=='ok'){
            Swal.fire({
                icon: 'success',
                title: 'Correcto',
                text: 'Usted modifico su estado a libre',
            })
            setTimeout(function(){
                location.href="dashboard.php?id="+id;
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