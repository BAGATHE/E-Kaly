    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit">
                        <span class="material-icons-sharp">
                            troubleshoot
                        </span>
                    </button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="<?=site_url('RestoController/notificationPage')?>" class="notif">
                <span class="material-icons-sharp">
                    notifications_none
                </span>
                <span class="count">0</span>
            </a>
            <a href="#" class="profile">
                <p><?=$current_resto["nom"]?></p>
                <img src="<?php echo base_url()?>assets/images/Logo.png">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <div>
                <h1>abonnement actuelle</h1>
                <h2>date debut: <span><?php if($mise_en_avant_info !=  null ) echo $mise_en_avant_info['date_debut'] ; ?></span></h2>
                <h2>date fin: <span><?php if($mise_en_avant_info != null ) echo  $mise_en_avant_info['date_fin']  ;?></span></h2>
            </div>

            <div class="bottom-data">
                <div class="orders">
                    <div class="ajout">
                        <form action="<?php echo site_url('RestoController/ajout_abonnement'); ?>" method="POST">
                            <h2>Mise en avant</h2>
                            <div class="form-input">
                                <input type="hidden" name="id_resto" value="<?=$current_resto["id"] ?>">
                                <input type="hidden" name="id_prix" value="<?=$prix_mise_en_avant["id"] ?>">
                            </div>
                            <div class="form-input">
                                <label for="">Prix</label>
                                <input type="number" placeholder="prix" name="prix" value="<?=$prix_mise_en_avant["prix"] ?>" readonly>
                            </div>
                            <div class="form-input">
                                <label for="">Date</label>
                                <input type="date" placeholder="date"  name="date">
                            </div>
                            <div class="form-input">
                                <label for="">Durée</label>
                                <input type="number" placeholder="duree" name="duree" value="3">
                            </div>
                            <button type="submit">Modifier</button>
                        </form>
                    </div>
                </div>

            </div>

        </main>

    </div>
