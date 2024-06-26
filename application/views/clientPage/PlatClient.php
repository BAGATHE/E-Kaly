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
        <a href="<?=site_url('ClientController/clientLogout') ?>"><button class="btn btn-hover">Déconnection</button></a>
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
           <?php foreach($list_plat_resto as $plat){  ?>
            <li>
              <div class="food-menu-card plat">
                <div class="card-banner">
                   <img src="<?php if($plat['image'] != null) { echo base_url('assets/images/').$plat['image']; } else { echo base_url('assets/images/Logo.png'); } ?>" width="600" height="390" loading="lazy" alt="<?php echo $plat['description']; ?>" class="w-100">

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
                        <p>
                          <?=number_format($plat["note"],1, '.', ',') ?>
                        </p>
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
        
        <section id="info_complementaire">

        <div class="input-adresse">
        <select name="adresse" id="optionsAdresse" >
           <option value="0" selected>Choisir quartier</option>

              <?php foreach ($adresses as $adresse ){ ?>
                <option value="<?=$adresse["id"] ?>"><?=$adresse["nom"] ?></option>
          <?php }  ?>
        </select>
        <input type="text" placeholder="repere" id="repere" name="repere">
        </div>
        <div id="map" ></div>
        <div id="prix_total_payement"  style="display:none;">
          <h3 style="text-align:center;">Prix de livraison</h3>
          <p style="text-align:center;" id="livraison_prix"></p>
      
        <h3 style="text-align:center;" >Total a payer : <span id="total_payement"></span></h3>
        <input type="hidden" name="latitude" id="latitude" val="">
        <input type="hidden" name="longitude" val="" id="longitude">
        <button type="submit" class="bouton-continuer" id="">Valider</button>
        </div>
        </section>
      </form>
    </aside>
  </main>




<!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top" style="background-image: url('<?php echo base_url()?>assets/images/footer-illustration.png')">
      <div class="container">

        <div class="footer-brand">

          <a href="" class="logo">E-Kaly<span class="span">.</span></a>

          <p class="footer-text">
            Des experts financiers vous soutiennent ou vous aident à découvrir de quelle manière vous pouvez lever davantage de fonds.
          </p>

        </div>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Contact</p>
          </li>

          <li>
            <p class="footer-list-item">+261 34 84 520 18</p>
          </li>

          <li>
            <p class="footer-list-item">ekaly@gmail.com</p>
          </li>

          <li>
            <address class="footer-list-item">Lot 201-E420, Andoharanofotsy,Antananarivo.</address>
          </li>

        </ul>

        <ul class="footer-list">

          <li>
            <p class="footer-list-title">Heure d'ouverture</p>
          </li>

          <li>
            <p class="footer-list-item">Lundi-Vendredi: 06:00-22:00</p>
          </li>

          <li>
            <p class="footer-list-item">Samedi 05:00-00:00</p>
          </li>

          <li>
            <p class="footer-list-item">Dimanche: 10:00-22:00</p>
          </li>

        </ul>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <p class="copyright-text">
          &copy; 2024 - Devellopeurs : <a href="#" class="copyright-link">Antonio - Matthieu - Angelo - Naly - Zo - Ando - Mahery - Tsanta - Rova - Joshua</a>
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
                '1': [-18.9083181,47.5262845],
                '2': [-18.8978735,47.5255695],
                '3': [-18.9242775,47.5287731],
                '4': [-18.9159866,47.5657712],
                '5': [-18.9275742,47.5130896],
                '6': [-18.9292156,47.4981480],
                '7': [-18.8986092,47.5200540],
                '8': [-18.9037134,47.5293499],
                '9': [-18.9174615,47.5313719],
                '10': [-18.89448418947927,47.53698412925651],
                '11': [-18.901680627902227,47.52448532473487],
                '12': [-18.8958717,47.5384325],
                '13': [-18.907098495007926,47.54324913024902],
                '14': [-18.90901682721876,47.530953884124756],
                '15': [-18.912961421892753, 47.52077161787855],
                '16': [-18.9104394,47.5306336],
                '17': [-18.918620207528782,47.524999695225425],
                '18': [-18.9104247,47.5168708],
                '19': [-18.9191141,47.5243646],
                '20': [-18.9097086,47.5288741],
                '21': [-18.90678942925861,47.52314691133188],
                '22': [-18.93085143600485,47.52670472468013],
                '23': [-18.9073725,47.5210871],
                '24': [-18.95954527856256,47.52689838409424],
                '25':[-18.91652310113871,47.518611337278706],
                '26': [-18.91310272102047,47.51723804626308],
                '27':[-18.90621927845529,47.507488166595785],
                '28': [ -18.98646088259979,47.53251561668927],
                '29': [-18.943350235590103, 47.528743743896484],
                '30': [ -18.940184103694182, 47.52213478088379],
                '31': [-18.996786490994886, 47.53537993995851],
                '32': [-18.878676182424343,47.521705627441406],
                '33': [-18.904415749692024,47.51896917237658],
                '34': [-18.8867581,47.5212986],
                '35': [ -18.875038705033933, 47.52220928086657],
                '36': [ -18.87833793598639, 47.50934595328599],
                '37': [-18.876036722911692,47.543463706970215],
                '38': [-18.901065704812094, 47.545494647470306],
                '39': [-18.892644321876908,47.529215812683105],
                '40': [-18.9005783,47.5450308],
                '41': [-18.8889, 47.5983],
                '42': [-18.9032, 47.5546],
                '43': [ -18.876222592072118,47.5250453192824],
                '44': [-18.8711, 47.5401],
                '45': [-18.8635, 47.5300],
                '46': [-18.910285553366148, 47.5248384475708],
                '47': [-18.92484855294493, 47.55489265323119],
                '48': [-18.9115, 47.5378],
                '49': [-18.91424188705639, 47.530543699347966],
                '50': [ -18.918143239683832,  47.53097783327222]
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
                $("#latitude").val(e.latlng.lat);
                $("#longitude").val(e.latlng.lng);


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
              var infoElement = document.getElementById('prix_total_payement');
              console.log(infoElement);
              if (infoElement.style.display === "none" || infoElement.style.display === "") {
                infoElement.style.display = "block";} else { infoElement.style.display = "none";}

                 var prix_livraison =  $("#livraison_prix").text();
                 if(prix_livraison== null || ""){
                  prix_livraison = 0;
                 }
                  var total = parseInt($(".prix-sous-total").text()) + parseInt(prix_livraison);
                  $("#total_payement").text(total);
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
              console.log(response);
              var result = JSON.parse(response);
              if(result.status === "success") {
                alert("Votre commande sera livrée le plus tôt possible, à tout à l'heure.");
                window.location.href = "<?php echo site_url('ClientController'); ?>";
              } else {
                console.log(response);
                 console.log(result.response);
                 var errorMessages = result.response;
                 alert(errorMessages);
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