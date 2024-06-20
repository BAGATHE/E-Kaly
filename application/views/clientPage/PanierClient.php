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
  <link rel="stylesheet" href="<?php echo base_url()?>assets/font/font.css">

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
    <article>
      <!-- 
        - #FOOD MENU
      -->

      <section class="section food-menu" id="food-menu">
        <div class="container">
       <!--SECTION RECHERCHE-->
        <div class="search-content">
            <form action="">
              <input type="text" name="" id="" placeholder="recherche plat">
              <input type="number" name="prix_min">
              <input type="time" name="prix_max">
              <button type="submit">
                <span class="material-icons-sharp">
                  search
                </span>
              </button>
            </form>
          <!-- SECTION RESULTAT-->

          </div>

          <h2 class="h2 section-title">
            <span class="span">Votre Panier</span>
          </h2>

          <div class="achat">
            <p class="section-text prix-total" style="color: #222222; font-size: 25px;">
              Prix Total : <span>50000 Ar</span>
            </p>
            <form action="">
              <button type="submit" class="valider-achat btn-hover">Valider achat</button>
            </form>
          </div>
          <ul class="food-menu-list">

            <li>
              <div class="food-menu-card">

                <div class="card-banner">
                  <img src="<?php echo base_url()?>assets/images/food-menu-1.png" width="300" height="300" loading="lazy"
                    alt="Fried Chicken Unlimited" class="w-100">
                </div>

                
                <div class="remove-cart">
                  <a href="">
                    <span class="material-icons-sharp">
                      clear
                    </span>
                  </a>
                </div>

                <div class="wrapper">
                  <p class="category">Chicken</p>
                </div>

                <h3 class="h3 card-title">Fried Chicken Unlimited</h3>

                <div class="price-wrapper" style="display: flex;">

                  <data class="price" value="49.00"> <span style="color: #505050;">Prix unitaire:</span>$49.00</data>
                  <data class="price" value="49.00"><span style="color: #505050;">Prix total:</span> $49.00</data>

                </div>

                <div class="price-wrapper" style="color: #222222;">
                  <a href="">-</a>
                  <p>2</p>
                  <a href="">+</a>
                </div>

              </div>
            </li>

            <li>
              <div class="food-menu-card">

                <div class="card-banner">
                  <img src="<?php echo base_url()?>assets/images/food-menu-2.png" width="300" height="300" loading="lazy"
                    alt="Burger King Whopper" class="w-100">
                </div>

                <div class="remove-cart">
                  <a href="">
                    <span class="material-icons-sharp">
                      clear
                    </span>
                  </a>
                </div>

                <div class="wrapper">
                  <p class="category">Noddles</p>
                </div>

                <h3 class="h3 card-title">Burger King Whopper</h3>

                <div class="price-wrapper" style="display: flex;">

                  <data class="price" value="49.00"> <span style="color: #505050;">Prix unitaire:</span>$49.00</data>
                  <data class="price" value="49.00"><span style="color: #505050;">Prix total:</span> $49.00</data>

                </div>

                <div class="price-wrapper" style="color: #222222;">
                  <a href="">-</a>
                  <p>2</p>
                  <a href="">+</a>
                </div>

              </div>
            </li>

            <li>
              <div class="food-menu-card">

                <div class="card-banner">
                  <img src="<?php echo base_url()?>assets/images/food-menu-3.png" width="300" height="300" loading="lazy"
                    alt="White Castle Pizzas" class="w-100">
                </div>

                <div class="remove-cart">
                  <a href="">
                    <span class="material-icons-sharp">
                      clear
                    </span>
                  </a>
                </div>

                <div class="wrapper">
                  <p class="category">Pizzas</p>
                </div>

                <h3 class="h3 card-title">White Castle Pizzas</h3>

                <div class="price-wrapper" style="display: flex;">

                  <data class="price" value="49.00"> <span style="color: #505050;">Prix unitaire:</span>$49.00</data>
                  <data class="price" value="49.00"><span style="color: #505050;">Prix total:</span> $49.00</data>

                </div>

                <div class="price-wrapper" style="color: #222222;">
                  <a href="">-</a>
                  <p>2</p>
                  <a href="">+</a>
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

  <!-- 
    - ionicon link
  -->
  <script type="module" src="<?php echo base_url()?>assets/js/ionicons.esm.js"></script>
  <!-- <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->


</body>

</html>