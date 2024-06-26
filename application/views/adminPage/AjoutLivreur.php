<!-- Main Content -->
<main>
            <div class="ajout">
                <form  method="post" id="livreurForm" action="<?php echo site_url('AdmisController/createLivreur');?>" >
                    <h2>Ajouter Livreur</h2>
                    
                    <div class="form-input">
                        <label for="">Nom Complet</label>
                        <input type="text" placeholder="Nom Livreur" name="nom_complet">
                    </div>
                    
                    <div class="form-input">
                        <label for="">Email</label>
                        <input type="email" placeholder="email" name="email">
                    </div>
                    
                    <div class="form-input">
                    <label for="">Adresse</label>
                    <select name="adresse" id="options" multiple>
                    <?php foreach( $adresses as $adresse ){?>  
                    <option value="<?=$adresse['id'] ?>"><?=$adresse['nom']?></option>
                    <?php } ?>
                    </select>
                    </div>

                    <div class="form-input">
                        <label for="">Mot de passe</label>
                        <input type="password" placeholder="mot de passe" name="mot_de_pass">
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