var canvasShow = document.getElementById('chartResult');
    canvasShow.getContext('2d');

var mainChart = new Chart(canvasShow, {
    type: 'line',
    data: {
        labels: ['teste1','teste1','teste1','teste1','teste1'],
        datasets: [{
            label: 'Totais de vendas mensais',
            data: [0,12,10,9,50],
            backgroundColor: [
            'rgb(41,153,255, 0.5)',
            'rgba(41,121,239, 1)',
            'rgba(41,121,239, 1)',
            'rgba(41,121,239, 1)',
            'rgba(41,121,239, 1)',
            'rgba(41,121,239, 1)'
            ],
            borderColor: [
                // 'rgba(255, 99, 132, 1)',
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
        responsivel: true
    }
})