
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="<?php echo base_url()?>assets/images/Logo.png">
            <h2>E-<span class="kaly">KALY</span></h2>
        </div>
        <ul class="side-menu">
            <li>
                <a href="<?= site_url('RestoController')?>">
                    <span class="material-icons-sharp">
                        home
                    </span>
                    Accueil
                </a>
            </li>
            <li>
                <a href="<?= site_url('RestoController/historiqueCommande')?>">
                    <span class="material-icons-sharp">
                        article
                    </span>
                    Historique commande
                </a>
            </li>
            <li>
                <a href="<?= site_url('RestoController/loadMiseEnAvantPage')?>">
                    <span class="material-icons-sharp">
                        star
                    </span>
                    Mise en avant
                </a>
            </li>
            <li>
                <a href="<?= site_url('RestoController/loadStatistiquePage')?>">
                    <span class="material-icons-sharp">
                    insert_chart
                    </span>
                    Global statistique
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="<?= site_url('RestoController/logOut')?>" class="logout">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

