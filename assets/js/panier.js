$(document).ready(function() {
    let articleIndex = 0;
    function updateSousTotal() {
        let total = 0;
        let articleCount = 0;
        $('.article').each(function() {
            const quantity = parseInt($(this).find('.quantite-nombre').text());
            const price = parseInt($(this).data('price'));
            total += quantity * price;
            articleCount += quantity;
        });
        $('.prix-sous-total').text(total + ' Ar');
        $('.nombre-articles').text(articleCount + ' Articles');
    }

    function addArticleToCart(itemName, itemPrice,idplat) {
        const $newArticle = $(`
            <div class="article" data-price="${itemPrice}">
                <span class="supprimer-article">✖</span>
                <span class="nom-article">${itemName}</span>
                <span class="prix-article">${itemPrice}</span> Ar
                <div class="quantite">
                    <span class="quantite-btn decrement">-</span>
                    <span class="quantite-nombre" style="display:none;">1</span>
                    <input type="number" name="articles[${articleIndex}][quantity]" class="quantite-input" value="1" min="1" style="width: 30px;">
                    <span class="quantite-btn increment">+</span>
                    <input type="hidden" name="articles[${articleIndex}][name]" value="${itemName}">
                    <input type="hidden" name="articles[${articleIndex}][price]" value="${itemPrice}">
                    <input type="hidden" name="articles[${articleIndex}][id_plat]" value="${idplat}">
                    
                </div>
            </div>
        `);

        $('.contenu-panier').append($newArticle);
        updateSousTotal();
        articleIndex++; 

        $newArticle.find('.increment').click(function() {
            let $quantity = $(this).siblings('.quantite-input');
            let quantity = parseInt($quantity.val());
            $quantity.val(quantity + 1);
            $(this).siblings('.quantite-nombre').text(quantity + 1);
            updateSousTotal();
        });

        $newArticle.find('.decrement').click(function() {
            let $quantity = $(this).siblings('.quantite-input');
            let quantity = parseInt($quantity.val());
            if (quantity > 1) {
                $quantity.val(quantity - 1);
                $(this).siblings('.quantite-nombre').text(quantity - 1);
                updateSousTotal();
            }
        });

        $newArticle.find('.supprimer-article').click(function() {
            $(this).closest('.article').remove();
            updateSousTotal();
        });
    }

    $('.increment').click(function() {
        let $quantity = $(this).siblings('.quantite-nombre');
        let quantity = parseInt($quantity.text());
        $quantity.text(quantity + 1);
        updateSousTotal();
    });

    $('.decrement').click(function() {
        let $quantity = $(this).siblings('.quantite-nombre');
        let quantity = parseInt($quantity.text());
        if (quantity > 1) {
            $quantity.text(quantity - 1);
        }
        updateSousTotal();
    });

    $('.supprimer-article').click(function() {
        $(this).closest('.article').remove();
        updateSousTotal();
    });

    $('.food-menu-btn').click(function() {
        const $foodCard = $(this).closest('.food-menu-card');
        const itemName = $foodCard.find('.card-title').text();
        const itemPrice = parseFloat($foodCard.find('.price').attr('value'));
        const id_plat = parseInt($foodCard.find('.plat_id').val());

        addArticleToCart(itemName, itemPrice,id_plat);
    });

});
