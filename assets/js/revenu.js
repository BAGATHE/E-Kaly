$(document).ready(function(){
   $('#statistique').submit(function(event){
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
              var jsonResponse = JSON.parse(response);
              console.log(jsonResponse);
              
              if('day' in jsonResponse[0]){
                var dailyRevenue = Array(30).fill(0); // Initialise tous les jours du mois à 
                jsonResponse.forEach(function(item) {
                    var day = parseInt(item.day, 10); // Jour de 1 à 30
                    dailyRevenue[day - 1] = parseFloat(item.revenu_total_jour); // Met à jour avec les revenus
                });
                
                // Mettre à jour le graphique
                updateChart(myChartmensuelle, dailyRevenue);
                monthlyRevenue =  Array(12).fill(0);
                updateChart(myChartannuel,monthlyRevenue);
              }else{
                var monthlyRevenue = Array(12).fill(0); // Initialise tous les mois à 0
                jsonResponse .forEach(function(item) {
                var monthIndex = parseInt(item.month, 10) - 1; // Les mois sont de 0 à 11
                monthlyRevenue[monthIndex] = parseFloat(item.revenu_total); // Met à jour avec les revenus   
                });
                updateChart(myChartannuel, monthlyRevenue);
                dailyRevenue = Array(30).fill(0);
                updateChart(myChartmensuelle,dailyRevenue  );
              }
        
           },
           /*error: function(xhr, status, error) {
               // Gérer les erreurs de requête AJAX
               alert('Une erreur s\'est produite lors de la validation: ' + error);
           }*/
       });
    });
  });
  

  function updateChart(chart, data) {
    chart.data.datasets[0].data = data;
    chart.update();
  }

  var ctx_annuel = document.getElementById('myChartannuel').getContext('2d');
  var myChartannuel = new Chart(ctx_annuel, {
    type: 'bar', // Type de graphique: bar, line, pie, etc.
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [{
        label: 'Revenue Mensuel',
        data: Array(12).fill(0), // Initialement tous les mois à 0
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



  var ctx_mensuelle = document.getElementById('myChartmensuelle').getContext('2d');
  var myChartmensuelle= new Chart(ctx_mensuelle, {
      type: 'bar', // Type de graphique: bar, line, pie, etc.
      data: {
          labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30'], // Les 30 jours du mois
          datasets: [{
              label: 'Revenue Journalier',
              data: Array(31).fill(0), // Initialement tous les jours à 0
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
  