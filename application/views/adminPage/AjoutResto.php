
<!-- Main Content -->
        <main id="principale" >
            <div class="ajout">
                <form method="post" id="restaurantForm" action="<?php echo site_url('AdmisController/createResto');?>"   enctype="multipart/form-data">
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
                    <select name="adresse" id="optionsAdresse" multiple>
                    <?php foreach( $adresses as $adresse ){?>  
                    <option value="<?=$adresse['id'] ?>"><?=$adresse['nom']?></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div class="form-input" id="repere" >
                        <label for="">Repere</label>
                        <input type="text"  name="repere" >
                    </div>
                    <div class="form-input">
                        <label for="">Heure ouverture</label>
                        <input type="time" placeholder="00:00:00" name="heure_ouverture">
                    </div>
                    <div class="form-input">
                        <label for="">Heure fermeture</label>
                        <input type="time" placeholder="00:00:00" name="heure_fermeture">
                    </div>
                    <div class="form-input">
                        <label for="">mot de passe</label>
                        <input type="password" placeholder="mot de passe" name="mot_de_pass">
                    </div>
                    <div class="form-input">
                        <label for="">Image</label>
                        <input type="file" placeholder="importer" name="image">
                    </div>
                    <button type="submit">Ajouter</button>
                </form>
            </div>
            <div id="map" ></div>
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