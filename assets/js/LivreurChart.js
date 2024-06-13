google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
   var data = google.visualization.arrayToDataTable([
      ['Jour', 'Ventes'],
      ['1', 1000],
      ['2', 1170],
      ['3', 660],
      ['4', 1030],
      ['5', 800],
      ['6', 950],
      ['7', 1200],
      ['8', 750],
      ['9', 830],
      ['10', 990],
      ['11', 700],
      ['12', 780],
      ['13', 850],
      ['14', 920],
      ['15', 1100],
      ['16', 950],
      ['17', 1050],
      ['18', 1200],
      ['19', 800],
      ['20', 850],
      ['21', 950],
      ['22', 1100],
      ['23', 800],
      ['24', 750],
      ['25', 850],
      ['26', 950],
      ['27', 1200],
      ['28', 1100],
      ['29', 1050],
      ['30', 950]
   ]);

   var options = {
      title: 'Ventes quotidiennes pour le mois',
      hAxis: { title: 'Jour', titleTextStyle: { color: '#333' } },
      vAxis: { minValue: 0 },
      bar: { groupWidth: '80%' },
      chartArea: { width: '70%', height: '50%' },
      height: 300
   };

   var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));
   chart.draw(data, options);
}