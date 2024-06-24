var compt = 0;
$(document).ready(function() {
    var detailUrl = $("#detailCommandeUrl").val();

    function fetchOrders() {
        var url_controller = $("#url_controller").val();
        console.log(url_controller);
        $.ajax({
            url: url_controller,
            method: 'GET',
            success: function(data) {
                var datas = JSON.parse(data);
                updateOrdersTable(datas);
                updateNotif(datas);
            },
          
        });
    }
    function updateNotif(datas){
        var notif = 0;
        var valeurStr = $('.count').text();
        var valeur = parseInt(valeurStr, 10);
    
        if(datas.length> valeur){
         var difference = datas.length - valeur;
         notif = valeur + difference;
        $('.count').empty();
        $('.count').text(notif);
        if(valeur!= 0 ) alert("vous aves une nouvelle commande");
         }else{
            $('.count').empty();
            $('.count').text(valeur);
         }
       
        
        
    }

    function updateOrdersTable(data) {
        let ordersTable = $('#table_commande_du_jour tbody');
        ordersTable.empty();

        $.each(data, function(index, order) {
            var tr = document.createElement('tr');

            var idCommande = document.createElement('td');
            idCommande.textContent = order.id_commande;
            tr.appendChild(idCommande);

            var date = document.createElement('td');
            date.textContent = order.date;
            tr.appendChild(date);

            var total = document.createElement('td');
            total.textContent = order.total;
            tr.appendChild(total);


            var status = document.createElement('td');
            var statusSpan = document.createElement('span');
            statusSpan.className = 'status process';
            var statusLink = document.createElement('a');
            if(order.paye==1){
                statusLink.textContent = 'Valider';
            }else{
                statusLink.textContent = 'En cours';
            }
            statusSpan.appendChild(statusLink);
            status.appendChild(statusSpan);
            tr.appendChild(status);

        

            var detail = document.createElement('td');
            var detailSpan = document.createElement('span');
            detailSpan.className = 'status process';
            var detailLink = document.createElement('a');
            detailLink.href = detailUrl+'/'+order.id_commande;
            detailLink.textContent = 'Detail';
            detailSpan.appendChild(detailLink);
            detail.appendChild(detailSpan);
            tr.appendChild(detail);

            ordersTable.append(tr);
        });
    }

    // envoie une requette tous les 10 seconde  
    setInterval(fetchOrders, 5000);


    fetchOrders();
});
