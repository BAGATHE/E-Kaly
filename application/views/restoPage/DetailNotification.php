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
            <div>
                <h5>Date et heure Reception de Commande : <?=$commande['date'] ?> </h5>
                <h5>Total somme  de Commande : <?=$commande['total'] ?>  Ar</h5>
                <h5>Commision de la plateforme : <?=$commande['commission'] ?> Ar </h5>
                <h5>Livreur commissioné pour la livraison : Nom livreur </h5>
            </div>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Detail Commande:</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>*</th>
                                <th>idCommande</th>
                                <th>Plat</th>
                                <th>Prix unitaire</th>
                                <th>Quantité</th>
                                <th>Prix Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($details_commande)) : ?>
                                <?php foreach ($details_commande as $detail) : ?>
                                 <tr>
                                        <td><img src="<?=base_url()?>/assets/images/humber.png"></td>
                                        <td><?php echo $detail['id_commande']; ?></td>
                                        <td><?php echo $detail['description']; ?></td>
                                        <td><?php echo $detail['prix_unitaire']; ?> Ar</td>
                                        <td><?php echo $detail['quantite']; ?></td>
                                        <td><?php echo $detail['total']; ?> Ar</td>
                                 </tr>    
                                <?php endforeach; ?>
                            <?php else : ?>
                            <p>Aucun détail de commande trouvé pour cet identifiant.</p>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>

        </main>

    </div>

