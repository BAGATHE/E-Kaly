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
  
  <script src="<?php echo base_url()?>assets/js/terme.js"></script>

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
    <article>
  
      <!-- 
        - #ABOUT
      -->

      <section class="section section-divider gray about" id="about">
        <div class="container">

          <div class="about-banner">
            <img src="<?php echo base_url()?>assets/images/terme.png" width="1000" height="880" loading="lazy" alt="delivery boy"
              class="w-100 delivery-img" data-delivery-boy>
          </div>

          <div class="about-content">

            <h2 class="h2 section-title">
              Termes <span class="span">&</span> Conditions
            </h2>

            <!-- <p class="section-text">
              The restaurants in Hangzhou also catered to many northern Chinese who had fled south from Kaifeng during
              the Jurchen
              invasion of the 1120s, while it is also known that many restaurants were run by families.
            </p> -->

            <ul class="about-list" id="about-list">

            </ul>


          </div>

        </div>
      </section>

      <!-- 
        - #Termes et conditions
      -->

      <section class="section section-divider gray delivery">
        <div class="container">

          <div class="delivery-content">

            <h2 class="h2 section-title">
              A Propos<span class="span">.</span>
            </h2>

            <p class="section-text">
            E-Kaly est le moyen le plus simple de commander vos repas en ligne depuis votre smartphone ou votre tablette. 
            A portée de main, accédez à de délicieuses cuisines  et à un choix de restaurants qui livrent dans votre ville/quartier. 
            Idéal pour les déjeuners au bureau, lorsque vous n'avez pas le temps de quitter le travail,ou vous êtes étudiant  et que vous luttez contre les embouteillages 


            </p>

          </div>

          <figure class="delivery-banner">

            <img src="<?php echo base_url()?>assets/images/Logo.png" width="500" height="500" loading="lazy" alt="delivery boy"
              class="w-40 delivery-img" data-delivery-boy>
          </figure>

        </div>
      </section>





      <!-- 
        - #Section develloper
      -->

      <section class="section section-divider white testi">
        <div class="container">
          <h2 class="h2 section-title">
            E-Kaly <span class="span">Devellopeurs</span>
          </h2>

          <ul class="testi-list has-scrollbar">

            <!-- Angelo -->
            <li class="testi-item">
              <div class="testi-card">

                <div class="profile-wrapper">

                  <figure class="avatar">
                    <img src="<?php echo base_url()?>assets/images/dev/Profil.jpg" width="80" height="80" loading="lazy" alt="Robert William">
                  </figure>

                  <div>
                    <h3 class="h4 testi-name">Angelo</h3>

                    <p class="testi-title">Integrateur et Chef de projet</p>
                  </div>

                </div>


              </div>
            </li>

            <!-- Antonio -->
            <li class="testi-item">
              <div class="testi-card">

                <div class="profile-wrapper">

                  <figure class="avatar">
                    <img src="<?php echo base_url()?>assets/images/dev/Antonio.jpg" width="80" height="80" loading="lazy" alt="Thomas Josef">
                  </figure>

                  <div>
                    <h3 class="h4 testi-name">Antonio</h3>

                    <p class="testi-title">Frontend Develloper</p>
                  </div>

                </div>
                
              </div>
            </li>
            <!-- Rova -->
            <li class="testi-item">
              <div class="testi-card">

                <div class="profile-wrapper">

                  <figure class="avatar">
                    <img src="<?php echo base_url()?>assets/images/dev/Rova.jpg" width="80" height="80" loading="lazy" alt="Thomas Josef">
                  </figure>

                  <div>
                    <h3 class="h4 testi-name">Rova</h3>

                    <p class="testi-title">Frontend Develloper</p>
                  </div>

                </div>

              </div>
            </li>

            <!-- Matthieu -->
            <li class="testi-item">
              <div class="testi-card">

                <div class="profile-wrapper">

                  <figure class="avatar">
                    <img src="<?php echo base_url()?>assets/images/dev/Profil.jpg" width="80" height="80" loading="lazy" alt="Thomas Josef">
                  </figure>

                  <div>
                    <h3 class="h4 testi-name">Matthieu</h3>

                    <p class="testi-title">Frontend Develloper</p>
                  </div>

                </div>

              </div>
            </li>

            <!-- Naly -->
            <li class="testi-item">
              <div class="testi-card">

                <div class="profile-wrapper">

                  <figure class="avatar">
                    <img src="<?php echo base_url()?>assets/images/dev/Profil.jpg" width="80" height="80" loading="lazy" alt="Thomas Josef">
                  </figure>

                  <div>
                    <h3 class="h4 testi-name">Naly</h3>

                    <p class="testi-title">Backend Develloper</p>
                  </div>

                </div>

              </div>
            </li>

            <!-- Zo -->
            <li class="testi-item">
              <div class="testi-card">

                <div class="profile-wrapper">

                  <figure class="avatar">
                    <img src="<?php echo base_url()?>assets/images/dev/Zo.png" width="80" height="80" loading="lazy" alt="Thomas Josef">
                  </figure>

                  <div>
                    <h3 class="h4 testi-name">Zo</h3>

                    <p class="testi-title">Backend Develloper</p>
                  </div>

                </div>

              </div>
            </li>

            <!-- Mahery -->
            <li class="testi-item">
              <div class="testi-card">

                <div class="profile-wrapper">

                  <figure class="avatar">
                    <img src="<?php echo base_url()?>assets/images/dev/Profil.jpg" width="80" height="80" loading="lazy" alt="Thomas Josef">
                  </figure>

                  <div>
                    <h3 class="h4 testi-name">Mahery</h3>

                    <p class="testi-title">Backend Develloper</p>
                  </div>

                </div>

              </div>
            </li>

            <!-- Ando -->
            <li class="testi-item">
              <div class="testi-card">

                <div class="profile-wrapper">

                  <figure class="avatar">
                    <img src="<?php echo base_url()?>assets/images/dev/Profil.jpg" width="80" height="80" loading="lazy" alt="Thomas Josef">
                  </figure>

                  <div>
                    <h3 class="h4 testi-name">Ando</h3>

                    <p class="testi-title">Backend Develloper</p>
                  </div>

                </div>

              </div>
            </li>

            <!-- Joshua -->
            <li class="testi-item">
              <div class="testi-card">

                <div class="profile-wrapper">

                  <figure class="avatar">
                    <img src="<?php echo base_url()?>assets/images/dev/Profil.jpg" width="80" height="80" loading="lazy" alt="Thomas Josef">
                  </figure>

                  <div>
                    <h3 class="h4 testi-name">Joshua</h3>

                    <p class="testi-title">Integrateur</p>
                  </div>

                </div>

              </div>
            </li>

            <!-- Tsanta -->
            <li class="testi-item">
              <div class="testi-card">

                <div class="profile-wrapper">

                  <figure class="avatar">
                    <img src="<?php echo base_url()?>assets/images/dev/Profil.jpg" width="80" height="80" loading="lazy" alt="Thomas Josef">
                  </figure>

                  <div>
                    <h3 class="h4 testi-name">Tsanta</h3>

                    <p class="testi-title">Integrateur</p>
                  </div>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>

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

  <!-- 
    - ionicon link
  -->
  <script type="module" src="<?php echo base_url()?>assets/js/ionicons.esm.js"></script>
  <!-- <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->

</body>

</html>