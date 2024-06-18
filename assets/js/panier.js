$(document).ready(function() {
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

    function addArticleToCart(itemName, itemPrice) {
        const $newArticle = $(`
            <div class="article" data-price="${itemPrice}">
                <span class="supprimer-article">✖</span>
                <span class="nom-article">${itemName}</span>
                <span class="prix-article">${itemPrice}</span> Ar
                <div class="quantite">
                    <button class="quantite-btn decrement">-</button>
                    <span class="quantite-nombre">1</span>
                    <button class="quantite-btn increment">+</button>
                </div>
            </div>
        `);

        $('.contenu-panier').prepend($newArticle);
        updateSousTotal();

        // Attach events to the new elements
        $newArticle.find('.increment').click(function() {
            let $quantity = $(this).siblings('.quantite-nombre');
            let quantity = parseInt($quantity.text());
            $quantity.text(quantity + 1);
            updateSousTotal();
        });

        $newArticle.find('.decrement').click(function() {
            let $quantity = $(this).siblings('.quantite-nombre');
            let quantity = parseInt($quantity.text());
            if (quantity > 1) {
                $quantity.text(quantity - 1);
            }
            updateSousTotal();
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

        addArticleToCart(itemName, itemPrice);
    });
});
