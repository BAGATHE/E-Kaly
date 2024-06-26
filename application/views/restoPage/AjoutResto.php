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
                    <div class="ajout">
                    <form action="<?=site_url('RestoController/insertionPlat_etQuantiteProduction')?>" method="POST" enctype="multipart/form-data">
                            <h2>Ajouter Plat</h2>
                            <input type="hidden" name ="id_resto"value="<?=$current_resto["id"] ?>">
                            <div class="form-input">
                                <label for="">Description</label>
                                <input type="text" placeholder="description_plat" name="description" required>
                            </div>
                            <div class="form-input">
                                <label for="">Prix</label>
                                <input type="number" placeholder="prix_plat" name="prix" required>
                            </div>
                            <div class="form-input">
                                <label for="">Image</label>
                                <input type="file" name="image" required>
                            </div>

                            <h2>Ajouter Quantite_Plat</h2>
                            <div class="form-input">
                                <label for="">Date</label>
                                <input type="datetime-local" name="date" required>
                            </div>
                            <div class="form-input">
                                <label for="">Production Journalière fixe</label>
                                <input type="number" placeholder="production" name="production" >
                            </div>
                            <button type="submit">Ajouter</button>
                        </form>
                    </div>
                </div>

            </div>

        </main>

    </div>
