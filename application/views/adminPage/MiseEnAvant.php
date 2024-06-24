        <!-- Main Content -->
        <main>

    
            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Listes des validitéé mise en avant Resto</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nom restaurant</th>
                            <th>Durée</th>
                            <th>Date debut</th>
                            <th>Date fin</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($list_resto) || !empty($list_resto)){ 
                           foreach($list_resto as $resto){ ?>
                        <tr>
                            <td><?=$resto["nom"] ?></td>
                            <td><?=$resto["duree"] ?></td>
                            <td><?=$resto["date_debut"] ?></td>
                            <td><?=$resto["date_fin"] ?></td>
                            
                        </tr>

                        <?php }  }?>
                   
                    </tbody>
                </table>
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