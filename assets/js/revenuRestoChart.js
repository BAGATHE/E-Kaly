document.addEventListener('DOMContentLoaded', function () {
    // Monthly Revenue Chart
    var monthlyRevenueCtx = document.getElementById('monthlyRevenueChart').getContext('2d');
    var monthlyRevenueChart = new Chart(monthlyRevenueCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Revenu Mensuel',
                data: [3200, 4500, 3000, 5200, 4700, 3300, 4900, 6100, 5800, 4600, 3400, 6200],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
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

    // Annual Revenue Chart
    var annualRevenueCtx = document.getElementById('annualRevenueChart').getContext('2d');
    var annualRevenueChart = new Chart(annualRevenueCtx, {
        type: 'line',
        data: {
            labels: ['2018', '2019', '2020', '2021', '2022', '2023'],
            datasets: [{
                label: 'Revenu Annuel',
                data: [42000, 54000, 63000, 75000, 89000, 96000],
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
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