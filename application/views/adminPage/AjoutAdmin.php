<!-- Main Content -->
<main >
            <div class="ajout">
                <form method="post" id="adminForm" action="<?php echo site_url('AdmisController/create');?>" >
                    <h2>Ajouter Admin</h2>
                    <div class="form-input">
                        <label for="">Nom</label>
                        <input type="text" placeholder="Nom Admin" name="nom">
                    </div>
                    <div class="form-input">
                        <label for="">Prenom</label>
                        <input type="text" placeholder="prenom" name="prenom">
                    </div>
                    <div class="form-input">
                        <label for="">Email</label>
                        <input type="email" placeholder="email" name="email">
                    </div>
                    <div class="form-input">
                        <label for="">Mot de passe</label>
                        <input type="text" placeholder="mot de passe" name="mot_de_pass">
                    </div>
                    <button type="submit">Ajouter</button>
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
                        <img src="<?php echo base_url()?>assets/images/manager.svg">
                    </div>
                </div>

            </div>

        </div>