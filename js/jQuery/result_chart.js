var ctx = document.getElementById('myChart').getContext('2d');
var myChart;
var itemsMeses = "";
var hours = new Date();
var number_mes = hours.getUTCMonth();
number_mes ++;
$.ajax({
    type: "GET",
    url: ".././logica/valor_and_qty_chart.php",
    dataType: "json",
    async: true,
    success: function(e){
        var mes = {
            Meses: [],
            Valores: []
        };
        var len = e.length;
        for(var i = 0; i < len; i++){
            // verificar o se o mes e igual a do banco de dado
            if(e[i]["mes"] == number_mes){
                // verificar se existe informações no banco de dado
                if(e[i]["mes"].length == null && e[i]["total"] == null){
                    console.log("Sem informações do banco de dado");
                }else{
                    if(e[i]["mes"].length != null && e[i]["total"] != null){
                        console.log("numero do Mes é: " + number_mes);
                        mes.Meses.push(e[i]["mes"]);
                        mes.Valores.push(e[i]["total"]);
                    }
                }
            }
        }
        console.log(mes.Valores);
        myChart = new Chart(ctx, {
            type: 'line',
            data:{
                labels: mes.Meses,
                datasets: [
                        {
                            // label: "Gráfico de Receitas",
                            data: mes.Valores,
                            backgroundColor: ['rgba(78,72,255, 0.1)'],
                            borderColor: ['rgba(78,72,255)'],
                            pointBorderWidth: 3
                        }
                    ]
            },
            options: {
                title: {
                    display: true,
                    text: "Grafico de Valores Acumulado"
                }
            }
        });
        // function addData(chart, label, data) {
        //     chart.data.labels.push(label);
        //     chart.data.datasets.forEach((dataset) => {
        //         dataset.data.push(data);
        //     });
        //     chart.update();
        // }
        // addData(myChart, mes.Meses, mes.Valores);
        // remover o primeiro valor adicionado no grafico
        // function removeData(chart) {
        //     chart.data.labels.splice(0,3);
        //     chart.data.datasets.forEach((dataset) => {
        //         dataset.data.splice(0,3);
        //     });
        //         chart.update();
        // }
        // removeData(myChart);
    },
    error: function(e){
        console.log("ERRO => " + e);
    }
});
// ===========================================