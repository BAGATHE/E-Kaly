$(document).ready(function(){
$('#statistiqueResto').submit(function(event){
    event.preventDefault();
    var form = $(this);
    var url = form.attr('action');
     //Récupérer les données du formulaire
     var formData = $(this).serialize();
       $.ajax({
        type: 'POST',
        url: url ,
        data: formData,
        success: function(response) {
           // Traiter la réponse pour obtenir les revenus mensuels
           console.log(response);
           var jsonResponse = JSON.parse(response);
           console.log(jsonResponse);
           console.log(jsonResponse.stat_chiffre[0]);
           
           if('day' in jsonResponse.stat_chiffre[0]){
            // Initialise tous les jours du mois à 0
            var dailyChiffreAffaire = Array(31).fill(0);
            var dailyRevenu = Array(31).fill(0);
            var dailyDepense = Array(31).fill(0);

            jsonResponse.stat_chiffre.forEach(function(item) {
                var day = parseInt(item.day, 10); // Jour de 1 à 31
                dailyChiffreAffaire[day - 1] = parseFloat(item.chiffreDAffaireResto);
                dailyRevenu[day - 1] = parseFloat(item.revenue);
                dailyDepense[day - 1] = parseFloat(item.depense);
            });
            // Mettre à jour le graphique mensuel
            updateChart(monthlyRevenueChart, dailyChiffreAffaire, dailyRevenu, dailyDepense);
            $("#chartmensuel").show();
            $("#stat_mensuel").show();
            $("#chartannuel").hide();
            $("#stat_annuel").hide();
            }else{
              // Initialise tous les mois de l'année à 0
            var monthlyChiffreAffaire = Array(12).fill(0);
            var monthlyRevenu = Array(12).fill(0);
            var monthlyDepense = Array(12).fill(0);

            // Supposons que jsonResponse.stat_chiffre contient les données mensuelles
            jsonResponse.stat_chiffre.forEach(function(item) {
            var month = parseInt(item.month, 10); // Mois de 1 à 12
            monthlyChiffreAffaire[month - 1] += parseFloat(item.chiffreDAffaireResto);
            monthlyRevenu[month - 1] += parseFloat(item.revenue);
            monthlyDepense[month - 1] += parseFloat(item.depense);
        });
        // Mettre à jour le graphique annuel
        updateChart(annualRevenueChart, monthlyChiffreAffaire, monthlyRevenu, monthlyDepense);
        $("#chartannuel").show();
        $("#stat_annuel").show();
        $("#chartmensuel").hide();
        $("#stat_mensuel").hide();
         }
        
        updateOrdersTable(jsonResponse.stat_vente_plat);
        },
        /*error: function(xhr, status, error) {
            // Gérer les erreurs de requête AJAX
            alert('Une erreur s\'est produite lors de la validation: ' + error);
        }*/
    });
 });



 function updateChart(chart, dataChiffreAFaire, dataRevenu, dataDepense) {
    chart.data.datasets[0].data = dataChiffreAFaire;
    chart.data.datasets[1].data = dataRevenu;
    chart.data.datasets[2].data = dataDepense;
    chart.update();
}

/*function mise  jour table de historique vente par plat*/
function updateOrdersTable(data) {
    let ordersTable = $('#orders-table tbody');
    ordersTable.empty();
    $.each(data, function(index, order) {
        ordersTable.append('<tr><td>' + order.description + '</td><td>' + order.prix  + '</td><td>' + order.vendu + '</td><td>'+order.vendu * order.prix   +'</td></tr>');
    });
}




/**graphique mensuelle*/
    var monthlyRevenueCtx = document.getElementById('chartmensuel').getContext('2d');
    var monthlyRevenueChart = new Chart(monthlyRevenueCtx, {
        type: 'bar',
        data: {
            labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'],
            datasets: [
                {
                    label: 'Chiffre à faire',
                    data:  Array(31).fill(0),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Revenu',
                    data: Array(31).fill(0),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Commission',
                    data:  Array(31).fill(0),
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
    

/*graphique annuelle*/
    var annualRevenueCtx = document.getElementById('chartannuel').getContext('2d');
    var annualRevenueChart = new Chart(annualRevenueCtx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [
            {
                label: 'Chiffre à faire',
                data: Array(12).fill(0), // Initialement tous les mois à 0
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Revenu',
                data: Array(12).fill(0), // Initialement tous les mois à 0
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            },
            {
                label: 'Commission',
                data: Array(12).fill(0), // Initialement tous les mois à 0
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




/*

// PICHART

// PiChart Option
// Options du graphique circulaire
const pieChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
        position: 'right',
    },
};

// PiChart Mensuel
// Initialisation du graphique circulaire pour le revenu mensuel
const monthlyRevenuePieChart = new Chart(document.getElementById('monthlyRevenuePieChart'), {
    type: 'pie',
    data: {
        labels: ['Semaine 1', 'Semaine 2', 'Semaine 3', 'Semaine 4'],
        datasets: [{
            label: 'Top 5 des vente',
            data: [800, 900, 1000, 1100],
            backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#8e5ea2']
        }]
    },
    options: pieChartOptions
});

*/
