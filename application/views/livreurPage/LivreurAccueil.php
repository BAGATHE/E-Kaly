<main>
            <h1>Accueil</h1>
            <div class="insights">
               <div class="sales">
                  <span class="material-symbols-sharp" style="background: #0ca4be;">offline_pin</span>
                  <div class="middle">
                      <div class="left">
                          <h3>Status</h3>
                           <form action="<?=site_url("LivreurController/updateStatus")?>" method="post">
                        <select name="status" id="status">
                            <option value="dispo" <?= $status == "dispo" ? "selected" : "" ?>>Actif</option>
                            <option value="non dispo" <?= $status == "non-dispo" ? "selected" : "" ?>>Inactif</option>
                        </select>
                              <button type="submit">Valider</button>
                           </form>
                      </div>
                  </div>
               </div>
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
                <h2>Commande disponible</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Commande</th>
                            <th>Adresse de récupération</th>
                            <th>Adresse de livraison</th>
                            <th>Prix de la livraison</th>
                            <th>Commission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($livraison)) : ?>
                            <?php foreach ($livraison as $commande) : ?>
                                <tr>
                                    <td>Commande <?= htmlspecialchars($commande['id_commande']) ?></td>
                                    <td><?= htmlspecialchars($commande['recuperation']) ?></td>
                                    <td><?= htmlspecialchars($commande['destination']) ?></td>
                                    <td><?= htmlspecialchars(number_format($commande['frais_livraison'], 2)) ?> Ar</td>
                                    <td><?= htmlspecialchars(number_format($commande['commission'] ,2)) ?> Ar</td>
                                    <td>
                                        <?php if ($commande['livree']) : ?>
                                            deja Accepte
                                        <?php else : ?>
                                            <a href="<?php echo site_url('LivreurController/accepterLivreur/'.$commande['id_commande']);?>">Accepter</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Aucune commande à livrer pour aujourd'hui.</td>
                            </tr>
                        <?php endif; ?>
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
                        <img src="<?=base_url()?>assets/images/Logo.png" alt="logotipo">
                    </div>
                </div>
            </div>
        </div>
   