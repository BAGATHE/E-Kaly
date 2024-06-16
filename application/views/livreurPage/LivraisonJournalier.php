<main>
            <h1>Livraison du Jour</h1>
            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-sharp">payments</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Argent du jour</h3>
                            <h1 class="ekaly">Ar</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recent-orders">
                <h2>Livraisons du Jour</h2>
                <table>
                    <thead>
                        <tr>

                            <th>Date commande</th>
                            <th>Restaurant</th>
                            <th>adresse de livraison</th>
                            <th>Commission</th>
                            <th>Status</th>
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
                            <td><?php echo ($livraison["status_livraison"] == 1) ? "Livré" : "non livré"; ?></td>
                            <td><a href="<?=site_url("LivreurController/updateLivraison/".$livraison['id_commande']); ?>"><?php echo ($livraison["status_livraison"] == 0) ? "livraison effectuer" : ""; ?></a></td>
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
                        <p>Bonjour, <b>John Doe</b></p>
                        <small class="text-muted">Livreur</small>
                    </div>
                    <div class="profile-photo">
                        <img src="assets/images/profile.jpg" alt="profile photo">
                    </div>
                </div>
            </div>
        </div>
