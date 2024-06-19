<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Kaly</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/Logo.png" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/client.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/panier.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/note.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/font/font.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="<?php echo base_url()?>assets/images/hero-banner.png" media="min-width(768px)">
  <link rel="preload" as="image" href="<?php echo base_url()?>assets/images/hero-banner-bg.png" media="min-width(768px)">
  <link rel="preload" as="image" href="<?php echo base_url()?>assets/images/hero-bg.jpg">

</head>

<body id="top">

  <!-- 
    - #HEADER
  -->
  <header class="header" data-header>
    <div class="container">

      <h1>
        <a href="#" class="logo">E-KALY<span class="span">.</span></a>
      </h1>

      <nav class="navbar" data-navbar>
        <ul class="navbar-list">

          <li class="nav-item">
            <a href="<?=site_url('ClientController/acceuilPage')?>" class="navbar-link" data-nav-link>Accueil</a>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('ClientController/favorisPage')?>" class="navbar-link" data-nav-link>Favoris</a>
          </li>

          <li class="nav-item">
              <a href="<?=site_url('ClientController/aboutPage')?>" class="navbar-link" data-nav-link>A Propos</a>  
          </li>


        </ul>
      </nav>

      <div class="header-btn-group">
      <?php if(!isset($client) || $client == null){ ?>
        <a href="<?php echo site_url('AuthentificationController/checkUserLogin');?>"><button class="btn btn-hover">Login</button></a>
      <?php  }else{?>
        <a href="<?=site_url('ClientController/clientLogout') ?>"><button class="btn btn-hover">deconnection</button></a>
      <?php } ?>
        <button class="nav-toggle-btn" aria-label="Toggle Menu" data-menu-toggle-btn>
          <span class="line top"></span>
          <span class="line middle"></span>
          <span class="line bottom"></span>
        </button>
      </div>

    </div>
  </header>



  <main>
   
    <article id="plat" >
      <!-- 
        - #FOOD MENU
      -->
      <section class="section food-menu" id="food-menu">
        <div class="container">
        <h4 style="margin-right:2.5vw;">Notez nous!</h4>
        <input type="hidden" name="resto_note" value="<?=site_url("ClientController/getNoteRestoClient");?>" id="client_note_resto" >
        <form action="<?php echo site_url("ClientController/insertNoteRestoClient"); ?>" class="rating"  style="margin-right:24vw;" id="ratingForm">
          <input type="hidden" name="id_resto" value="<?=$info_resto["id"] ?>">    
          <input type="hidden" name="id_client" value="<?=$client["id"] ?>">
          <input value="5" name="rate" id="star5" type="radio">
          <label title="text" for="star5"></label>
          <input value="4" name="rate" id="star4" type="radio">
          <label title="text" for="star4"></label>
          <input value="3" name="rate" id="star3" type="radio">
          <label title="text" for="star3"></label>
          <input value="2" name="rate" id="star2" type="radio">
          <label title="text" for="star2"></label>
          <input value="1" name="rate" id="star1" type="radio">
          <label title="text" for="star1"></label>
          </form>
        <div class="search-content">
            <form action="<?=site_url("ClientController/rechercherPlat") ?>" method="POST" id="recherche_plat">
              <input type="text" name="nom_plat" id="" placeholder="recherche plat">
              <input type="number" name="prix_min" placeholder="prix min">
              <input type="number" name="prix_max" placeholder="prix_max">
              <input type="hidden" name="id_resto" value="<?=$info_resto["id"] ?>">   
              <button type="submit">
                <span class="material-icons-sharp">
                  search
                </span>
              </button>
            </form>
          <!-- SECTION RESULTAT-->
          <ul class="food-menu-list-2">
            <?php if(isset($plat_recherche) && $plat_recherche != null){ ?>
              <?php foreach($plat_recherche as $plat_resto){ ?>
            <li>
              <div class="food-menu-card">
                <div class="card-banner">
                    <button class="btn food-menu-btn">
                      <span class="material-icons-sharp">
                        shopping_cart
                      </span>
                      Ajouter au panier
                    </button>
                </div>

                <div class="wrapper">
                  <p class="category"></p>
                </div>
                <input type="hidden" name="plat_id" value="<?=$plat_resto["id_plat"] ?>" class="plat_id">
                <h3 class="h3 card-title"><?=$plat_resto["description"] ?></h3>

                <div class="price-wrapper" style="display: flex;">
                <data class="price" value="<?=$plat_resto["prix"]?>"><?=$plat_resto["prix"]?> Ar</data>
                </div>
              </div>
            </li>
           <?php }  } ?>
          
          </ul>
          

          </div>


          <h2 class="h2 section-title">
            Plat disponibles chez <span class="span"><?=$info_resto["nom"] ?></span>
          </h2>
         
          <p class="section-text">
            Vous trouvez ici la liste des plats disponibles.
          </p>

          <ul class="food-menu-list">
            <!-- php boucle de liste de plat du resto -->
           <?php foreach($list_plat_resto as $plat){ ?>
            <li>
              <div class="food-menu-card">
                <div class="card-banner">
                  <img src="<?php echo base_url()?>assets/images/food-menu-1.png" width="300" height="300" loading="lazy"
                    alt="Fried Chicken Unlimited" class="w-100">

                    <button class="btn food-menu-btn">
                      <span class="material-icons-sharp">
                        shopping_cart
                      </span>
                      Ajouter au panier
                    </button>
                </div>

                <div class="wrapper">
                  <p class="category"></p>
                </div>
                <input type="hidden" name="plat_id" value="<?=$plat["id_plat"] ?>" class="plat_id">
                <h3 class="h3 card-title"><?=$plat["description"] ?></h3>

                <div class="price-wrapper" style="display: flex;">

                  <data class="price" value="<?=$plat["prix"]?>"><?=$plat["prix"]?> Ar</data>

                  <a href="#" class="btn-link">
                    <span style="display: flex;">
                        <p><?=$plat["note"]?></p>
                        <span class="material-icons-sharp">
                            star
                        </span>
                    </span>

                  </a>

                </div>

                <div class="price-wrapper note-fav">
                  <form action="<?=site_url("ClientController/insertNotePlatClient")?>" class="noteForm" method="POST" >
                    <input type="hidden" name="id_plat" value="<?=$plat["id_plat"] ?>" >
                    <input type="hidden" name="id_client" value="<?=$client["id"] ?>">
                    <input type="number" max="5" min="0" placeholder="Noter" name="note">
                    <button type="submit">Noter</button>
                  </form>
                </div>

              </div>
            </li>
           <?php } ?>
          </ul>


        </div>
      </section>
      <!-- 
        - #CTA
      -->
    </article>

    <aside id="div_panier">
    <form action="<?=base_url()?>index.php/ClientController/ValiderPanier" method="post" id="formulairePanier"> 
    <input type="hidden" name="id_resto" value="<?=$info_resto["id"] ?>">    
    <input type="hidden" name="id_client" value="<?=$client["id"] ?>">
    <div class="panier">
            <div class="header-panier">
                <span class="titre-panier">Votre panier</span>
                <span class="nombre-articles">0 Articles</span>
            </div>
            <div class="contenu-panier">
                <div class="sous-total">
                    <span class="texte-sous-total">Sous-total</span>
                    <span class="prix-sous-total"></span> Ar
                </div>
            </div>
            <button type="button" class="bouton-continuer" id="bouton-confirmation">Continuer</button>
            </div>
        
        <section id="info_complementaire" style="display:none;">
        <div class="input-adresse">
        <select name="adresse" id="optionsAdresse" >
            <option value="0" selected>choisir quartier</option>
            <option value="1">Analakely</option>
            <option value="20">Isotry</option>
            <option value="32">andoram 102</option>
        </select>
        <input type="text" placeholder="repere" id="repere" name="repere">
        </div>
        <div id="map" ></div>
        <div>
          <h3 style="text-align:center;">Prix de livraison</h3>
          <p style="text-align:center;" id="livraison_prix"></p>
        </div>
        <h3 style="text-align:center;" >Total a payer : <span id="total_payement"></span></h3>
        <button type="submit" class="bouton-continuer" id="">Valider</button>
        </section>
      </form>
    </aside>
  </main>




<!-- 
    - #FOOTER
  -->

  <footer class="footer" style="border:solid 2px yellow;" >

    <div class="footer-top" style="background-image: url('<?php echo base_url()?>assets/images/footer-illustration.png')">
      <div class="container">

        <div class="footer-brand">
        
          <a href="" class="logo">BOGOTA by pass<span class="span">.</span></a>

          <p class="footer-text">
            Financial experts support or help you to to find out which way you can raise your funds more.
          </p>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Contact Info</p>
          </li>

          <li>
            <p class="footer-list-item">+1 (062) 109-9222</p>
          </li>

          <li>
            <p class="footer-list-item">Info@YourGmail24.com</p>
          </li>

          <li>
            <address class="footer-list-item">153 Williamson Plaza, Maggieberg, MT 09514</address>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Opening Hours</p>
          </li>

          <li>
            <p class="footer-list-item">Monday-Friday: 08:00-22:00</p>
          </li>

          <li>
            <p class="footer-list-item">Tuesday 4PM: Till Mid Night</p>
          </li>

          <li>
            <p class="footer-list-item">Saturday: 10:00-16:00</p>
          </li>

        </ul>

      
     
      </div>

    </div>

    <div class="footer-bottom">
      <div class="container">
        <p class="copyright-text">
          &copy; 2024 Devellopeurs : <a href="#" class="copyright-link">Antonio - Matthieu - Angelo - Naly - Zo - Ando - Mahery - Tsanta - Rova - Joshua</a>
        </p>
      </div>
    </div>

  </footer>





  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="Back to top" data-back-top-btn>
    <span class="material-icons-sharp">
        keyboard_arrow_up
    </span>
  </a>






  <!-- 
    - custom js link
  -->
  <script src="<?php echo base_url()?>assets/js/script.js" defer></script>
  <script src="<?=base_url()?>assets/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/jquery/jquery-3.7.1.js"></script>
  <script src="<?=base_url()?>assets/js/NoteResto.js"></script>
  <script src="<?=base_url()?>assets/js/panier.js"></script>
  

  <!-- 
    - ionicon link
  -->
  <script type="module" src="<?php echo base_url()?>assets/js/ionicons.esm.js"></script>
  <!-- <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->


 <span style="display:none;" id="url"><?=base_url() ?></span>
 <span style="display:none;" id="adresse_resto"><?=$info_resto["adresse"] ?></span>
  <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialisation de la carte à Antananarivo, Madagascar
            var map = L.map('map').setView([-18.8792, 47.5079], 13);

            // Ajout de la couche OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            // Dictionnaire des quartiers avec leurs coordonnées
            var districts = {
                '20': [-18.9033, 47.5182],
                '1': [-18.9137, 47.5252],
                '32': [-18.98609417455635, 47.532829187957816]
                // Ajoutez d'autres quartiers avec leurs coordonnées
            };
            var currentMarker = null;
            // Gestionnaire de l'événement de changement de sélection
            var adresse_target = null;
            document.getElementById('optionsAdresse').addEventListener('change', function(event) {
                var selectedDistrict = event.target.value;
                adresse_target = event.target.value;
                if (selectedDistrict && districts[selectedDistrict]) {
                    var coordinates = districts[selectedDistrict];
                    map.setView(coordinates, 15); // Ajustez le niveau de zoom si nécessaire
                }
                //var mapElement = document.getElementById("map");
                //mapElement.classList.add('show');
            });
            map.on('click', function(e) {
                var inputElement = document.getElementById("repere");
                inputElement.classList.add('show');
                if (currentMarker) {
                    map.removeLayer(currentMarker);
                }
                // Ajouter un nouveau marqueur à l'endroit cliqué
                currentMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
                var url = $("#url").text();
                var adresseResto = $("#adresse_resto").text();

                $.ajax({
                  url: url+"index.php/ClientController/getPrixLivraison", // Remplacez par l'URL correcte de votre contrôleur CodeIgniter
                  type: 'POST', // Utilisation de POST pour envoyer les données
                  dataType: 'json', // Attendre une réponse JSON
                  data: {
                    adresse_resto: adresseResto,
                    adresse_target: adresse_target
                  },
                  success: function(response) {
                    $("#livraison_prix").text(response);
                    var total = parseInt($(".prix-sous-total").text()) + parseInt(response);
                    $("#total_payement").text(total);
                  },
                  error: function(xhr, status, error) {
                    // Gestion des erreurs
                    console.error(xhr.responseText); // Affichage de l'erreur dans la console
                  }
                });
              
              
            });
        });

       document.querySelector('#bouton-confirmation').addEventListener('click', function(event) {
              var infoElement = document.getElementById('info_complementaire');
              console.log(infoElement);
              if (infoElement.style.display === "none" || infoElement.style.display === "") {
                infoElement.style.display = "block";} else { infoElement.style.display = "none";}
              });         
    </script>
    <script>
       $('#formulairePanier').submit(function(event){
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
              var result = JSON.parse(response);
              if(result === "success") {
                alert("Votre commande sera livrée le plus tôt possible, à tout à l'heure.");
                window.location.href = "<?php echo site_url('ClientController/PlatClientPage'); ?>";
              } else {
                alert("Erreur lors de la validation du formulaire.");
              }
            },
            /*error: function(xhr, status, error) {
                // Gérer les erreurs de requête AJAX
                alert('Une erreur s\'est produite lors de la validation: ' + error);
            }*/
        });
     });
    </script>    
</body>

</html>