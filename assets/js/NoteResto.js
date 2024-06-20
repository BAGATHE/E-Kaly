$(document).ready(function() {
    /*recuperation du note attribue par le client sur le resto*/
    var id_resto = $('input[name="id_resto"]').val();
    var id_client = $('input[name="id_client"]').val();
    var url_note_client = $('input[name="resto_note"]').val();  
    // Requête AJAX pour récupérer la note du client
    $.ajax({
        type: 'GET',
        url: url_note_client,
        data: { id_resto: id_resto, id_client: id_client },
        success: function(response) {
            var data = JSON.parse(response);
            if (data.status === 'success' && data.note !== null) {
                $('input[name="rate"][value="' + data.note + '"]').prop('checked', true);
            }
        },
        error: function(error) {
            console.log(error);
            alert('Erreur lors de la récupération de la note');
        }
    });

    // Écouter les changements de sélection sur les boutons radio
    $('input[name="rate"]').change(function() {
        var form = $('#ratingForm');
        var url = form.attr('action');
        var data = form.serialize(); // Serialize form data
       
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {
                console.log(response);
                alert('Note envoyée avec succès');
            },
            error: function(error) {
                console.log(error);
                alert('Erreur lors de l\'envoi de la note');
            }
        });
    });
/***requette pour insere note de plat */
    $('.noteForm').on('submit', function(e) {
        e.preventDefault(); // Empêche le rechargement de la page

        var form = $(this);
        var url = form.attr('action');
        var data = form.serialize(); // Sérialiser les données du formulaire
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status === 'success') {
                    alert('Note envoyée avec succès');
                } else {
                    alert('Erreur lors de l\'envoi de la note');
                }
            },
            error: function(error) {
                console.log(error);
                alert('Erreur lors de l\'envoi de la note');
            }
        });
    });


});