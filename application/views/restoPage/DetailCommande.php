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
            <h1 class="titre">Detail commande de <?=$commande['nom_client']?></h1>
            <h1 class="ajouter">Prix total : <span><?=$commande['total']?></span></h1>
            <div class="container">
                <?php if (!empty($details_commande)) : ?>
                    <?php foreach ($details_commande as $detail) : ?>
                        <div class="card">
                            <img src="<?php echo base_url('assets/images/humber.png'); ?>" alt="">
                            <div class="right">
                                <div class="info">
                                    <h2><?php echo $detail['description']; ?></h2>
                                    <p>Quantite : <span class="qtt"><?php echo $detail['quantite']; ?></span></p>
                                </div>
                                <div class="info">
                                    <p>Prix unitaire: <span class="price"><?php echo number_format($detail['prix_unitaire'], 0, ',', ' '); ?> Ar</span></p>
                                    <p>Prix total: <span class="price"><?php echo number_format($detail['total'], 0, ',', ' '); ?> Ar</span></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p>Aucun détail de commande trouvé pour cet identifiant.</p>
                <?php endif; ?>
        </div>

        </main>

    </div>
