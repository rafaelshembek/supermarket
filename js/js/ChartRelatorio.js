var mainCanvas = document.getElementById('chartRelatorio');
    mainCanvas.getContext("2d");

var Chart = new Chart(mainCanvas, {
    type: 'bar',
    data: {
        labels: ['Atualizando...'],
        datasets: [{
            label: 'Liquido Mensal',
            data: [0],
            backgroundColor: [
                'rgba(0,105,169,0.5)',
                'rgba(0,105,169,1)',
                'rgba(0,105,169,1)'
            ],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true
    }
});

// funções
refleshHora();
function refleshHora(){
    let tempo = new Date();
    // let month = tempo.getMonth();
    let year = tempo.getFullYear();
    $.ajax({
        type: "GET",
        url: "../logica/logica_result_chart.php",
        cache: false,
        dataType: "json",
        success: response => {
            // console.log(response.length);
            if(response.length == 0){
                setTimeout( () => {
                    addData(Chart,  'Sem dados no momento', [0]);
                    removeData(Chart);
                }, 2000 );
            }else{
                console.log(response);
                for (let index = 0; index < response.length; index++) {
                        setTimeout(() => {
                            addData(Chart,  response[index].mes +' '+ year, [response[index].total_compras]);
                            // removeData(Chart);
                        }, 2000);
                }
                setTimeout(() => {
                    removeData(Chart);
                }, 2000);
            }
        },
    });

}
function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
}
function removeData(chart) {
    chart.data.labels.shift();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.shift();
    });
    chart.update();
}