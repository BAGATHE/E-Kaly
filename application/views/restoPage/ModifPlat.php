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
                        <form action="<?=site_url('RestoController/modifierPlat') ?>" method="post" enctype="multipart/form-data">
                            <h2>Modifier Plat</h2>
                            <input type="hidden" name="id_plat" value="<?=$plat["id"] ?>">
                            <input type="hidden" name="id_resto" value="<?=$plat["id_resto"] ?>">
                            <div class="form-input">
                                <label for="">Description</label>
                                <input type="text" placeholder="description_plat" name="description_plat" value="<?=$plat["description"] ?>">
                            </div>
                            <div class="form-input">
                                <label for="">Prix</label>
                                <input type="number" placeholder="prix_plat"  name="prix_plat" value="<?=$plat["prix"] ?>">
                            </div>
                            <div class="form-input">
                                <label for="">Image</label>
                                <input type="file" name="image">
                            </div>
                            <button type="submit">Modifier</button>
                        </form>

                        <form action="<?=site_url('RestoController/modifierQuantitePlat') ?>" method="post">
                            <h2>Modifier Quantite_Plat</h2>
                            <input type="hidden" name="id" value="<?=$change_quantiter_plat['id'] ?>">
                            <input type="hidden" name="id_plat" value="<?=$change_quantiter_plat["id_plat"] ?>">
                            <div class="form-input">
                                <label for="">Date</label>
                                <input type="datetime-local" placeholder="date" value="<?=$change_quantiter_plat['date'] ?>" name="date">
                            </div>
                            <div class="form-input">
                                <label for="">Production</label>
                                <input type="number" placeholder="production" value="<?=$change_quantiter_plat['production'] ?>"  name="production">
                            </div>
                            <button type="submit">Modifier</button>
                        </form>
                    </div>
                </div>

            </div>

        </main>

    </div>
