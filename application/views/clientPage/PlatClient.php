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
           <?php foreach($list_plat_resto as $plat){  ?>
            <li>
              <div class="food-menu-card">
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
                '1': [-18.9083181,47.5262845],
                '2': [-18.8978735,47.5255695],
                '3': [-18.9242775,47.5287731],
                '4': [-18.9159866,47.5657712],
                '5': [-18.9275742,47.5130896],
                '6': [-18.9292156,47.4981480],
                '7': [-18.8986092,47.5200540],
                '8': [-18.9037134,47.5293499],
                '9': [-18.9174615,47.5313719],
                '10': [-18.9007471,47.5173715],
                '11': [-18.9123208,47.5365130],
                '12': [-18.8958717,47.5384325],
                '13': [-18.9021321,47.5246027],
                '14': [-18.9021313,47.5352782],
                '15': [-18.91000000, 47.52650000],
                '16': [-18.9104394,47.5306336],
                '17': [-18.9107383,47.5210239],
                '18': [-18.9104247,47.5168708],
                '19': [-18.9191141,47.5243646],
                '20': [-18.9097086,47.5288741],
                '21': [-18.8918640,47.5355036],
                '22': [-18.9123265,47.5119034],
                '23': [-18.9073725,47.5210871],
                '24': [-18.9325956,47.5274904],
                '26': [-18.9578923,47.5281890],
                '28': [-18.9127038,47.5163415],
                '29': [-18.9034637,47.5123933],
                '30': [-18.9792134,47.5335333],
                '31': [-18.9426447,47.5240731],
                '32': [-18.9362863,47.5245648],
                '33': [-18.9977702,47.5342483],
                '34': [-18.8867581,47.5212986],
                '35': [-18.9030772,47.5217396],
                '36': [-18.9182962,47.5449553],
                '37': [-18.8756504,47.5251073],
                '38': [-18.8846077,47.5099316],
                '39': [-18.8767941,47.5468778],
                '40': [-18.9005783,47.5450308],
                '41': [-18.8889, 47.5983],
                '42': [-18.9032, 47.5546],
                '43': [-18.8870, 47.5427],
                '44': [-18.8711, 47.5401],
                '45': [-18.8635, 47.5300],
                '46': [-18.9125, 47.5281],
                '47': [-18.8983, 47.5270],
                '48': [-18.9115, 47.5378],
                '49': [-18.9127, 47.5298],
                '50': [-18.9172, 47.5304]
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