<!-- Main Content -->
        <main>
            <div class="ajout">
            <form  method="post" id="livreurForm" action="<?php echo site_url('LivreurController/edit');?>" >
                    <h2>Modifier Livreur</h2>
                    <input type="hidden" name="id" value="<?=$livreur["id"]?>">
                    <div class="form-input">
                        <label for="">Nom Complet</label>
                        <input type="text" placeholder="Nom Livreur" name="nom_complet" value="<?=$livreur['nom_complet'] ?>">
                    </div>
                    
                    <div class="form-input">
                        <label for="">Email</label>
                        <input type="email" placeholder="email" name="email" value="<?=$livreur['email'] ?>">
                    </div>
                    
                    <div class="form-input">
                    <label for="">Adresse</label>
                    <select name="adresse" id="options" multiple>
                    <?php foreach( $adresses as $adresse ){?>  
                        <?php if( $adresse['id'] == $livreur['adresse'] ){?>
                    <option selected value="<?=$adresse['id'] ?>"><?=$adresse['nom']?></option>
                     <?php }else{?>
                        <option  value="<?=$adresse['id'] ?>"><?=$adresse['nom']?></option>
                    <?php } } ?>
                    </select>
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
