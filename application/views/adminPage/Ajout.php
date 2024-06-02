<!-- Main Content -->
        <main>
            <div class="group-btn">
                 <button id="livreurBtn">livreur</button>

                 <button id="adminBtn">Admin</button>

                 <button id="restaurantBtn">Restaurant</button>
            </div>
            <div class="ajout">
                <form method="post" id="adminForm" action="<?php echo site_url('AdmisController/create');?>" style="display:none;">
                    <h2>Ajouter Admin</h2>
                    <div class="form-input">
                        <label for="">Nom</label>
                        <input type="text" placeholder="Nom Admin" name="nom">
                    </div>
                    <div class="form-input">
                        <label for="">prenom</label>
                        <input type="text" placeholder="prenom" name="prenom">
                    </div>
                    <div class="form-input">
                        <label for="">email</label>
                        <input type="email" placeholder="email" name="email">
                    </div>
                    <div class="form-input">
                        <label for="">mot de passe</label>
                        <input type="text" placeholder="mot de passe" name="mot_de_pass">
                    </div>
                    <button type="submit">Ajouter</button>
                </form>


                <form  method="post" id="livreurForm" action="<?php echo site_url('LivreurController/create');?>" style="display:none;">
                    <h2>Ajouter Livreur</h2>
                    
                    <div class="form-input">
                        <label for="">Nom Complet</label>
                        <input type="text" placeholder="Nom Livreur" name="nom_complet">
                    </div>
                    
                    <div class="form-input">
                        <label for="">email</label>
                        <input type="email" placeholder="email" name="email">
                    </div>
                    
                    <div class="form-input">
                        <label for="">adresse</label>
                        <input type="text" placeholder="Adresse" name="adresse">
                    </div>

                    <div class="form-input">
                        <label for="">mot de passe</label>
                        <input type="password" placeholder="mot de passe" name="mot_de_pass">
                    </div>
                    <button type="submit">Ajouter</button>
                </form>



                <form method="post" id="restaurantForm" action="<?php echo site_url('RestoController/create');?>" style="display:none;">
                    <h2>Ajouter Restaurant</h2>
                    <div class="form-input">
                        <label for="">Nom</label>
                        <input type="text" placeholder="Nom" name="nom">
                    </div>
                    <div class="form-input">
                        <label for="">Description</label>
                        <input type="text" placeholder="Description" name="description">
                    </div>
                    <div class="form-input">
                        <label for="">Email</label>
                        <input type="email" placeholder="email" name="email">
                    </div>
                    <div class="form-input">
                        <label for="">Adresse</label>
                        <input type="text" placeholder="Adresse" name="adresse">
                    </div>
                    <div class="form-input">
                        <label for="">Heure ouverture</label>
                        <input type="text" placeholder="00:00:00" name="heure_ouverture">
                    </div>
                    <div class="form-input">
                        <label for="">Heure fermeture</label>
                        <input type="text" placeholder="00:00:00" name="heure_fermeture">
                    </div>
                    <div class="form-input">
                        <label for="">mot de passe</label>
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
                        <img src="<?php echo base_url()?>assets/images/profile-1.jpg">
                    </div>
                </div>

            </div>

        </div>
