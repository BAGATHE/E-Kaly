<main>
            <h1>Livraisons du Jour</h1>
            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-sharp">payments</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Argent du jour</h3>
                             <h1 class="ekaly"><?= number_format($solde['somme_frais_livraison'])?> Ar</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recent-orders">
            <h2>Tableau des livraisons du <?=$current_livreur["nom_complet"];?></h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date commande</th>
                            <th>Restaurant</th>
                            <th>Adresse de livraison</th>
                            <th>Commission</th>
                            <th>Status</th>
                            <th>Carte</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($livraison_du_jours as $livraison){?>
                        <tr>
                            <td><?=$livraison["date_commande"]; ?></td>
                            <td><?=$livraison["resto"] ?></td>
                            <td><?=$livraison["adresse"] ?></td>
                            <td><?=$livraison["gain"] ?></td>
                            <td style="font-style:italic;"><?php echo ($livraison["status_livraison"] == 1) ? "Livré" : "Non livré"; ?></td>
                            <td>
                                <p style="font-style:italic; color:#677483; background-color:#1cb45b; border-radius:2rem;cursor: pointer;"
                                     onclick="showPopup(
                                    '<?= addslashes($livraison['resto']) ?>',
                                    '<?= addslashes($livraison['adresse_resto']) ?>',
                                    <?= $livraison['latitude_resto'] ?>,
                                    <?= $livraison['longitude_resto'] ?>,
                                    '<?= addslashes($livraison['adresse']) ?>',
                                    '<?= addslashes($livraison['repere_commande']) ?>',
                                    <?= $livraison['latitude_commande'] ?>,
                                    <?= $livraison['longitude_commande'] ?>
                                )">Afficher la carte</p>
                            </td>
                            <td><a href="<?=site_url("LivreurController/updateLivraison/".$livraison['id_commande']); ?>"><?php echo ($livraison["status_livraison"] == 0) ? "Livraison effectuer" : ""; ?></a></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </main>
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-sharp active">light_mode</span>
                    <span class="material-symbols-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Bonjour, <b><?=$current_livreur["nom_complet"]; ?></b></p>
                        <small class="text-muted">Livreur</small>
                    </div>
                    <div class="profile-photo">
                        <img src="<?=base_url()?>assets/images/Logo.png" alt="profile photo">
                    </div>
                </div>
            </div>
        </div>
<div id="overlay"></div>

<div id="popup" class="popup">
    <div class="popup-header">Carte de la commande</div>
    <div class="popup-content">
        <div id="map"></div>
    </div>
    <div class="popup-footer">
        <button class="close-btn" onclick="closePopup()">Fermer</button>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="<?=base_url()?>assets/js/popup_carte_commande.js"></script>