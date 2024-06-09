document.addEventListener('DOMContentLoaded', function () {
    var monthlyRevenueCtx = document.getElementById('chartmensuel').getContext('2d');
    var monthlyRevenueChart = new Chart(monthlyRevenueCtx, {
        type: 'bar',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
            datasets: [
                {
                    label: 'Chiffre à faire',
                    data: [1200, 1500, 1000, 2000, 1700, 1300, 1900, 2100, 1800, 1600, 1400, 2000, 1500, 1700, 1800, 1900, 1600, 1700, 1800, 2000, 2200, 2400, 2600, 2800, 3000, 3200, 3400, 3600, 3800, 4000],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Revenu',
                    data: [1100, 1400, 900, 1900, 1600, 1200, 1800, 2000, 1700, 1500, 1300, 1900, 1400, 1600, 1700, 1800, 1500, 1600, 1700, 1900, 2100, 2300, 2500, 2700, 2900, 3100, 3300, 3500, 3700, 3900],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Commission',
                    data: [900, 1300, 800, 1800, 1500, 1100, 1700, 1900, 1600, 1400, 1200, 1800, 1300, 1500, 1600, 1700, 1400, 1500, 1600, 1800, 2000, 2200, 2400, 2600, 2800, 3000, 3200, 3400, 3600, 3800],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    


    var annualRevenueCtx = document.getElementById('chartannuel').getContext('2d');
    var annualRevenueChart = new Chart(annualRevenueCtx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [
            {
                label: 'Chiffre à faire',
                data: [42000, 54000, 63000, 75000, 89000, 96000, 102000, 115000, 123000, 135000, 145000, 150000],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Revenu',
                data: [40000, 52000, 60000, 72000, 85000, 91000, 98000, 110000, 118000, 130000, 140000, 145000],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
            {
                label: 'Commission',
                data: [35000, 48000, 55000, 67000, 79000, 86000, 92000, 105000, 113000, 125000, 135000, 140000],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }
        ]
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