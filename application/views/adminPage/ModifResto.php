<!-- Main Content -->
        <main>
            <div class="ajout">
            <form method="post" id="restaurantForm" action="<?php echo site_url('RestoController/edit');?>" >
                    <h2>Modif Restaurant</h2>
                    <input type="hidden" value="<?= $resto["id"] ?>"? name="id">
                    <div class="form-input">
                        <label for="">Nom</label>
                        <input type="text" placeholder="Nom" name="nom" value="<?=$resto["nom"] ?>">
                    </div>
                    <div class="form-input">
                        <label for="">Description</label>
                        <input type="text" placeholder="Description" name="description" value="<?=$resto["description"] ?>">
                    </div>
                    <div class="form-input">
                        <label for="">Email</label>
                        <input type="email" placeholder="email" name="email" value="<?=$resto["email"] ?>">
                    </div>
                    <div class="form-input">
                    <label for="">Adresse</label>
                    <select name="adresse" id="options" multiple>
                    <?php foreach( $adresses as $adresse ){?>  
                        <?php if( $adresse['id'] == $resto['adresse'] ){?>
                    <option selected value="<?=$adresse['id'] ?>"><?=$adresse['nom']?></option>
                     <?php }else{?>
                        <option  value="<?=$adresse['id'] ?>"><?=$adresse['nom']?></option>
                    <?php } } ?>
                    </select>
                    </div>
                    <div class="form-input">
                        <label for="">Heure ouverture</label>
                        <input type="text" placeholder="00:00:00" name="heure_ouverture" value="<?=$resto["heure_ouverture"] ?>">
                    </div>
                    <div class="form-input">
                        <label for="">Heure fermeture</label>
                        <input type="text" placeholder="00:00:00" name="heure_fermeture" value="<?=$resto["heure_fermeture"] ?>" >
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
