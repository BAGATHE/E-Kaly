var ctx = document.getElementById('myChartannuel').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar', // Type de graphique: bar, line, pie, etc.
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Revenue Mensuel',
            data: [12, 19, 3, 5, 2, 3, 7, 10, 12, 15, 9, 5], // Remplacez ces données par les vôtres
            backgroundColor: 'rgba(28, 180, 91, 0.5)',
            borderColor: 'rgba(75, 192, 192, 1)',
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