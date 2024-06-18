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
          <div class="search-content">
            <form action="">
              <input type="text" name="" id="" placeholder="Recherche de plat">
              <button type="submit">
                <span class="material-icons-sharp">
                  search
                </span>
              </button>
            </form>
          </div>

          <h2 class="h2 section-title">
            Plat disponibles chez <span class="span">Bogota By-Pass</span>
          </h2>

          <p class="section-text">
            Vous trouvez ici la liste des plats disponibles.
          </p>

          <ul class="food-menu-list">

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
                  <p class="category">Chicken</p>
                </div>

                <h3 class="h3 card-title">Fried Chicken Unlimited</h3>

                <div class="price-wrapper" style="display: flex;">

                  <data class="price" value="49.00">$49.00</data>

                  <a href="#" class="btn-link">
                    <span style="display: flex;">
                        <p>5</p>
                        <span class="material-icons-sharp">
                            star
                        </span>
                    </span>

                  </a>

                </div>

                <div class="price-wrapper note-fav">
                  <form action="" >
                    <input type="number" max="5" min="0" placeholder="Noter">
                    <button type="submit">Noter</button>
                  </form>
                </div>

              </div>
            </li>

            <li>
              <div class="food-menu-card">

                <div class="card-banner">
                  <img src="<?php echo base_url()?>assets/images/food-menu-2.png" width="300" height="300" loading="lazy"
                    alt="Burger King Whopper" class="w-100">

                    <button class="btn food-menu-btn">
                      <span class="material-icons-sharp">
                        shopping_cart
                      </span>
                      Ajouter au panier
                    </button>
                </div>

                <div class="wrapper">
                  <p class="category">Noddles</p>
                </div>

                <h3 class="h3 card-title">Burger King Whopper</h3>

                <div class="price-wrapper" style="display: flex;">

                  <data class="price" value="49.00">$49.00</data>

                  <a href="#" class="btn-link">
                    <span style="display: flex;">
                        <p>5</p>
                        <span class="material-icons-sharp">
                            star
                        </span>
                    </span>

                  </a>

                </div>

                <div class="price-wrapper note-fav">
                  <form action="" >
                    <input type="number" max="5" min="0" placeholder="Noter">
                    <button type="submit">Noter</button>
                  </form>
                </div>

              </div>
            </li>

            <li>
              <div class="food-menu-card">

                <div class="card-banner">
                  <img src="<?php echo base_url()?>assets/images/food-menu-3.png" width="300" height="300" loading="lazy"
                    alt="White Castle Pizzas" class="w-100">

                    <button class="btn food-menu-btn">
                      <span class="material-icons-sharp">
                        shopping_cart
                      </span>
                      Ajouter au panier
                    </button>
                </div>

                <div class="wrapper">
                  <p class="category">Pizzas</p>
                </div>

                <h3 class="h3 card-title">White Castle Pizzas</h3>

                <div class="price-wrapper" style="display: flex;">

                  <data class="price" value="49.00">$49.00</data>

                  <a href="#" class="btn-link">
                    <span style="display: flex;">
                        <p>5</p>
                        <span class="material-icons-sharp">
                            star
                        </span>
                    </span>

                  </a>

                </div>

                <div class="price-wrapper note-fav">
                  <form action="" >
                    <input type="number" max="5" min="0" placeholder="Noter">
                    <button type="submit">Noter</button>
                  </form>
                </div>

              </div>
            </li>

            <li>
              <div class="food-menu-card">

                <div class="card-banner">
                  <img src="<?php echo base_url()?>assets/images/food-menu-2.png" width="300" height="300" loading="lazy"
                    alt="Burger King Whopper" class="w-100">

                    <button class="btn food-menu-btn">
                      <span class="material-icons-sharp">
                        shopping_cart
                      </span>
                      Ajouter au panier
                    </button>
                </div>

                <div class="wrapper">
                  <p class="category">Noddles</p>
                </div>

                <h3 class="h3 card-title">Burger King Whopper</h3>

                <div class="price-wrapper" style="display: flex;">

                  <data class="price" value="49.00">$49.00</data>

                  <a href="#" class="btn-link">
                    <span style="display: flex;">
                        <p>5</p>
                        <span class="material-icons-sharp">
                            star
                        </span>
                    </span>

                  </a>

                </div>

                <div class="price-wrapper note-fav">
                  <form action="" >
                    <input type="number" max="5" min="0" placeholder="Noter">
                    <button type="submit">Noter</button>
                  </form>
                </div>

              </div>
            </li>

            <li>
              <div class="food-menu-card">

                <div class="card-banner">
                  <img src="<?php echo base_url()?>assets/images/food-menu-2.png" width="300" height="300" loading="lazy"
                    alt="Burger King Whopper" class="w-100">

                    <button class="btn food-menu-btn">
                      <span class="material-icons-sharp">
                        shopping_cart
                      </span>
                      Ajouter au panier
                    </button>
                </div>

                <div class="wrapper">
                  <p class="category">Noddles</p>
                </div>

                <h3 class="h3 card-title">Burger King Whopper</h3>

                <div class="price-wrapper" style="display: flex;">

                  <data class="price" value="49.00">$49.00</data>

                  <a href="#" class="btn-link">
                    <span style="display: flex;">
                        <p>5</p>
                        <span class="material-icons-sharp">
                            star
                        </span>
                    </span>

                  </a>

                </div>

                <div class="price-wrapper note-fav">
                  <form action="" >
                    <input type="number" max="5" min="0" placeholder="Noter">
                    <button type="submit">Noter</button>
                  </form>
                </div>

              </div>
            </li>

            <li>
              <div class="food-menu-card">

                <div class="card-banner">
                  <img src="<?php echo base_url()?>assets/images/food-menu-2.png" width="300" height="300" loading="lazy"
                    alt="Burger King Whopper" class="w-100">

                    <button class="btn food-menu-btn">
                      <span class="material-icons-sharp">
                        shopping_cart
                      </span>
                      Ajouter au panier
                    </button>
                </div>

                <div class="wrapper">
                  <p class="category">Noddles</p>
                </div>

                <h3 class="h3 card-title">Burger King Whopper</h3>

                <div class="price-wrapper" style="display: flex;">

                  <data class="price" value="49.00">$49.00</data>

                  <a href="#" class="btn-link">
                    <span style="display: flex;">
                        <p>5</p>
                        <span class="material-icons-sharp">
                            star
                        </span>
                    </span>

                  </a>

                </div>
                <div class="price-wrapper note-fav">
                  <form action="" >
                    <input type="number" max="5" min="0" placeholder="Noter">
                    <button type="submit">Noter</button>
                  </form>
                </div>
              </div>
            </li>
          </ul>


        </div>
      </section>
      <!-- 
        - #CTA
      -->
    </article>

    <aside id="div_panier">
        <div class="panier">
            <div class="header-panier">
                <span class="titre-panier">Votre panier</span>
                <span class="nombre-articles">0 Articles</span>
            </div>
            <div class="contenu-panier">
              <!--
                <div class="article" data-price="52000">
                    <span class="supprimer-article">✖</span>
                    <span class="nom-article">MIX GOURMANDISE MARINE</span>
                    <span class="prix-article">52000</span> Ar
                    <div class="quantite">
                        <button class="quantite-btn decrement">-</button>
                        <span class="quantite-nombre">1</span>
                        <button class="quantite-btn increment">+</button>
                    </div>
                </div>
                <div class="article" data-price="52000">
                    <span class="supprimer-article">✖</span>
                    <span class="nom-article">MIX GOURMANDISE MARINE</span>
                    <span class="prix-article">52000</span> Ar
                    <div class="quantite">
                        <button class="quantite-btn decrement">-</button>
                        <span class="quantite-nombre">1</span>
                        <button class="quantite-btn increment">+</button>
                    </div>
                </div>
      -->
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
        <input type="text" placeholder="numero telephone joingnable" id="numero" name="numero" >
        </div>
        <div id="map" ></div>
        <div>
          <h3 style="text-align:center;">Prix de livraison</h3>
          
          <p style="text-align:center; display:none;"  >758522</p>
        </div>
        </section>
        
    </aside>
  </main>




<!-- 
    - #FOOTER
  -->

  <footer class="footer" style="border:solid 2px yellow;" >

    <div class="footer-top" style="background-image: url('<?php echo base_url()?>assets/images/footer-illustration.png')">
      <div class="container">

        <div class="footer-brand">
        <form class="rating">
          <input value="5" name="rate" id="star5" type="radio">
          <label title="text" for="star5"></label>
          <input value="4" name="rate" id="star4" type="radio">
          <label title="text" for="star4"></label>
          <input value="3" name="rate" id="star3" type="radio" checked="">
          <label title="text" for="star3"></label>
          <input value="2" name="rate" id="star2" type="radio">
          <label title="text" for="star2"></label>
          <input value="1" name="rate" id="star1" type="radio">
          <label title="text" for="star1"></label>
      </form>
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
  <script src="<?=base_url()?>assets/js/panier.js"></script>
  <!-- 
    - ionicon link
  -->
  <script type="module" src="<?php echo base_url()?>assets/js/ionicons.esm.js"></script>
  <!-- <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->


 
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
            document.getElementById('optionsAdresse').addEventListener('change', function(event) {
                var selectedDistrict = event.target.value;
                if (selectedDistrict && districts[selectedDistrict]) {
                    var coordinates = districts[selectedDistrict];
                    map.setView(coordinates, 15); // Ajustez le niveau de zoom si nécessaire
                }
                var mapElement = document.getElementById("map");
                mapElement.classList.add('show');
            });
            map.on('click', function(e) {
                var inputElement = document.getElementById("repere");
                inputElement.classList.add('show');
                if (currentMarker) {
                    map.removeLayer(currentMarker);
                }
                // Ajouter un nouveau marqueur à l'endroit cliqué
                currentMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);



              
            });
        });

       document.querySelector('#bouton-confirmation').addEventListener('click', function(event) {
              var infoElement = document.getElementById('info_complementaire');
              console.log(infoElement);
              if (infoElement.style.display === "none" || infoElement.style.display === "") {
                infoElement.style.display = "block";} else { infoElement.style.display = "none";}
              });
              
    </script>
</body>

</html>