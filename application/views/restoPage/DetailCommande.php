    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <form action="#">
                <div class="form-input">
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
            <a href="<?= site_url('RestoController/infoProfil')?>" class="profile">
                <p><?=$profil["nom"]?></p>
                <img src="<?php echo base_url()?>assets/images/<?=$profil['image'] ?>">
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
                            <img src="<?php if($detail['image'] != null) { echo base_url('assets/images/').$detail['image']; } else { echo base_url('assets/images/Logo.png'); } ?>" width="600" height="390" loading="lazy" alt="<?php echo $detail['image']; ?>" class="w-100">
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
