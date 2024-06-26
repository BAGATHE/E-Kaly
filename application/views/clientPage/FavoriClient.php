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
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/Logo.png" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/client.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/font/font.css">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="<?php echo base_url() ?>assets/images/hero-banner.png" media="min-width(768px)">
  <link rel="preload" as="image" href="<?php echo base_url() ?>assets/images/hero-banner-bg.png" media="min-width(768px)">
  <link rel="preload" as="image" href="<?php echo base_url() ?>assets/images/hero-bg.jpg">

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
            <a href="<?= site_url('ClientController/acceuilPage') ?>" class="navbar-link" data-nav-link>Accueil</a>
          </li>

          <li class="nav-item">
            <a href="<?= site_url('ClientController/favorisPage') ?>" class="navbar-link" data-nav-link>Favoris</a>
          </li>

          <li class="nav-item">
            <a href="<?= site_url('ClientController/aboutPage') ?>" class="navbar-link" data-nav-link>A Propos</a>
          </li>


        </ul>
      </nav>

      <div class="header-btn-group">
        <?php if (!isset($client) || $client == null) { ?>
          <a href="<?php echo site_url('AuthentificationController/checkUserLogin'); ?>"><button class="btn btn-hover">Login</button></a>
        <?php  } else { ?>
          <a href="<?= site_url('ClientController/clientLogout') ?>"><button class="btn btn-hover">Déconnection</button></a>
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
        - #HERO
      -->

      <section class="section section-divider white blog" id="blog">

        <div class="container">




          <h2 class="h2 section-title">
            Vos restaurants <span class="span">favoris</span>
          </h2>

          <p class="section-text">
            Voici la liste de vos restaurants favoris.
          </p>

          <!-- Liste resto -->
          <ul class="blog-list">
            <?php foreach ($favoris_restaurant as $restaurant) { ?>
              <li>
                <div class="blog-card favori">
                  <div class="card-banner">
                    <img src="<?php if ($restaurant['image'] != null) {
                                echo base_url('assets/images/') . $restaurant['image'];
                              } else {
                                echo base_url('assets/images/Logo.png');
                              } ?>" width="600" height="390" loading="lazy" alt="<?php echo $restaurant['nom_resto']; ?>" class="w-100">
                  </div>

                  <div class="card-content">

                    <div class="card-meta-wrapper">

                      <a href="#" class="card-meta-link">
                        <time class="meta-info" datetime="<?php echo $restaurant['heure_ouverture']; ?>">
                          De <?php echo $restaurant['heure_ouverture']; ?> à <?php echo $restaurant['heure_fermeture']; ?>
                        </time>
                      </a>

                    </div>

                    <h3 class="h3">
                      <a href="<?= site_url('ClientController/PlatClientPage/' . $restaurant['id_resto']) ?>" class="card-title"><?php echo $restaurant['nom_resto']; ?></a>
                    </h3>

                    <p class="card-text">
                      <span class="loc">Localisation :</span> <?= $restaurant["repere"] ?>
                    </p>


                    <a href="<?= site_url('ClientController/toFavorite/' . $restaurant['id_resto']) ?>" class="btn-link">
                      <span class="<?php echo $restaurant['id_client'] ? 'favori-active' : 'favoris-resto'; ?>">
                        <span class="material-icons-sharp">favorite</span>
                      </span>
                    </a>

                  </div>

                </div>
              </li>

            <?php } ?>
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
  <script src="<?php echo base_url() ?>assets/js/script.js" defer></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="<?php echo base_url() ?>assets/js/ionicons.esm.js"></script>
  <!-- <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->

</body>

</html>