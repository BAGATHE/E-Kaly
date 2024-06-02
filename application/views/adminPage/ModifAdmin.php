<!-- Main Content -->
        <main>
            <div class="ajout">
            <form method="post" id="adminForm" action="<?php echo site_url('AdmisController/edit');?>" >
                    <h2>Modif Admin</h2>
                    <input type="hidden" name="id" value="<?=$administrator["id"] ?>">
                    <div class="form-input">
                        <label for="">Nom</label>
                        <input type="text" placeholder="Nom Admin" name="nom" value="<?=$administrator["nom"] ?>" >
                    </div>
                    <div class="form-input">
                        <label for="">prenom</label>
                        <input type="text" placeholder="prenom" name="prenom" value="<?=$administrator["prenom"] ?>">
                    </div>
                    <div class="form-input">
                        <label for="">email</label>
                        <input type="email" placeholder="email" name="email" value="<?=$administrator["email"] ?>">
                    </div>
                    <div class="form-input">
                        <label for="">mot de passe</label>
                        <input type="text" placeholder="mot de passe" name="mot_de_pass" value="<?=$administrator["mot_de_pass"] ?>">
                    </div>
                    <button type="submit">Modifier</button>
                </form>
            </div>
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p><?php echo $current_administrator["nom"]; ?></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="<?php echo base_url()?>assets/images/profile-1.jpg">
                    </div>
                </div>

            </div>

        </div>