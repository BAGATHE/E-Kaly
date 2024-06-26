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
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Historiques des commandes</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <form  id='statistique'  method="POST" action="<?php echo site_url('RestoController\historiqueCommande');?>">
                        <select class="form-select  d-sm-inline-block" aria-label="Default select example" id="mois" style="width: 12vw;" name="mois">
                            <option value="0" selected>choisir  mois</option>
                            <option value="1">Janvier</option>
                            <option value="2">Fevrier</option>
                            <option value="3">Mars</option>
                            <option value="4">Avril</option>
                            <option value="5">Mai</option>
                            <option value="6">Juin</option>
                            <option value="7">Juillet</option>
                            <option value="8">Aout</option>
                            <option value="9">Septembre</option>
                            <option value="10">Octobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Decembre</option>
                        </select>

                        <select class="form-select  d-sm-inline-block" aria-label="Default select example" id="annee" style="width: 12vw;" name="annee">
                            <option value="0">choisir  année</option>
                            <option value="2024">2024</option>
                        </select>
                        <button class="btn btn-primary" style="width: 5em; height: 3em; color: var(--white-clr); border-radius: 5px; background: var(--green-clr); cursor: pointer;" type="submit">voir</button>
                        </form>
                    </div>
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <form  id='statistique'  method="POST" action="<?php echo site_url('RestoController\historiqueCommande');?>">
                        <input type="date" name="date">
                        <button class="btn btn-primary" style="width: 5em; height: 3em; color: var(--white-clr); border-radius: 5px; background: var(--green-clr); cursor: pointer;" type="submit">voir</button>
                        </form>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Date de Commande</th>
                                <th>Adresse de Livraison</th>
                                <th>N° Commande</th>
                                <th>Somme(+Livraison)</th>
                                <th>Commission(Plateforme)</th>
                                <th>Voir detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($historique_commande)) : ?>
                                <?php foreach ($historique_commande as $commande) : ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url('assets/images/profile-1.jpg'); ?>">
                                            <p><?php echo $commande['nom_client']; ?></p>
                                        </td>
                                        <td><?php echo $commande['date']; ?></td>
                                        <td><?php echo $commande['adresse']; ?></td>
                                        <td>Commande <?php echo $commande['id_commande']; ?></td>
                                        <td><?php echo $commande['total']; ?> </td>
                                        <td><?php echo $commande['commission']; ?> </td>
                                        <td><span class="status process"><a href="<?= site_url('RestoController/getDetailCommandeByid/'.$commande['id_commande']); ?>">Detail</a></span></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="7">Aucune commande trouvée pour cette période.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>

        </main>

    </div>
