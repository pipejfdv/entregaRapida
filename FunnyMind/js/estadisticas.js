const basicStats = document.getElementById('basicStats');

new Chart(basicStats, {
    type: 'line',
    data: {
        labels: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'],
        datasets: [{
            label: 'Exp',
            data: [25, 80, 45, 100, 20, 30, 120],
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