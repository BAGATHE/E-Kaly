$(document).ready(function(){
    $('#recherche_plat').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json', // Indique que la réponse doit être interprétée comme JSON
            success: function(response) {
                console.log("Réponse reçue:");
                console.log(response); // Affichez la réponse JSON dans la console
                var ul = $('.food-menu-list-2');
                ul.empty();
                $.each(response, function(index, plat) {
                    // Créez un nouvel élément li avec le contenu nécessaire
                    var li = $('<li>');
                    var card = `
                    <div class="food-menu-card">
                        <div class="wrapper">
                            <p class="category"></p>
                        </div>
                        <input type="hidden" name="plat_id" value="${plat.id_plat}" class="plat_id">
                        <h3 class="h3 card-title">${plat.description}</h3>
                        <div class="price-wrapper" style="display: flex;">
                            <data class="price" value="${plat.prix}">${plat.prix} Ar</data>
                            <a href="#" class="btn-link">
                                <span style="display: flex;">
                                    <p>${plat.note}</p>
                                    <span class="material-icons-sharp">
                                        star
                                    </span>
                                </span>
                            </a>
                               <button class="btn food-menu-btn-2">
                                Ajouter au panier
                                </button>
                        </div>
                     
                    </div>`;
                    li.html(card);
                    ul.append(li);
                });
            },
            error: function(xhr, status, error) {
                alert('Une erreur s\'est produite lors de la validation: ' + error);
            }
        });
    });
});
