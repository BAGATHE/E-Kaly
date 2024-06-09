document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('commissionChart').getContext('2d');
    var commissionChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Commission',
                data: [1200, 1500, 1000, 2000, 1700, 1300, 1900, 2100, 1800, 1600, 1400, 2000],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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
});