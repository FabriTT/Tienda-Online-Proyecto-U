
var chart;
var contador=0;

var chart2;
var contador2=0;

function generar(){

    var inicio = document.getElementById("txtInicio").value;
    var fin = document.getElementById("txtFin").value;

    var accion = document.getElementById("accionVenta").value;

    var info = "inicio="+inicio+"&fin="+fin+"&accion="+accion;
    
    var op=0;

    if(inicio==null||inicio==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La fecha de inicio es obligatorio y no debe contener numeros',
        })
        op=1;
    }

    if(fin==null||fin==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La fecha de fin es obligatorio y no debe contener numeros',
        })
        op=1;
    }

    if(op==0){

        $.ajax({
            url: '../negocios/Negocios_Graficas.php',
            type: 'POST',
            data: info,
        })
        .done(function(respuesta){
            var fecha=[];
            var total =[];
            var data = JSON.parse(respuesta)
            data.forEach(function(x){
                fecha.push(x['fecha'])
                total.push(x['total'])
            });



            crearGrafica(fecha,total,'Total vendido')

            
            
        });



    }
   
}



function generar2(){

    var inicio2 = document.getElementById("txtInicio2").value;
    var fin2 = document.getElementById("txtFin2").value;

    var accion = document.getElementById("accionCompra").value;

    var info2 = "inicio="+inicio2+"&fin="+fin2+"&accion="+accion;
    
    var op=0;

    if(inicio2==null||inicio2==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La fecha de inicio es obligatorio y no debe contener numeros',
        })
        op=1;
    }

    if(fin2==null||fin2==''){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La fecha de fin es obligatorio y no debe contener numeros',
        })
        op=1;
    }

    if(op==0){

        $.ajax({
            url: '../negocios/Negocios_Graficas.php',
            type: 'POST',
            data: info2,
        })
        .done(function(respuesta2){
            var fecha2=[];
            var total2 =[];
            var data2 = JSON.parse(respuesta2)
            data2.forEach(function(x2){
                fecha2.push(x2['fecha'])
                total2.push(x2['total'])
            });



            crearGrafica2(fecha2,total2,'Total comprado')

            
            
        });



    }
   
}




function crearGrafica(etiquetas,datos,titulo){
    
    var ctx = document.getElementById('myChart');
    if(contador>=1){
        chart.destroy();
    }
    contador++;
    chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: etiquetas,
            datasets: [{
                label: titulo,
                data: datos,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    
}


function crearGrafica2(etiquetas2,datos2,titulo2){
    
    var ctx2 = document.getElementById('myChart2');
    if(contador2>=1){
        chart2.destroy();
    }
    contador2++;
    chart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: etiquetas2,
            datasets: [{
                label: titulo2,
                data: datos2,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    
}






