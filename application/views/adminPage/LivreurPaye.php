        <!-- Main Content -->
        <main>

        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <form  id='statistique'  method="POST" action="<?php echo site_url('StatistiqueController/RevenuParMois');?>">
            
            

              <select class="form-select  d-sm-inline-block" aria-label="Default select example" id="anner" style="width: 12vw;" name="anner">
                <option value="0">choisir  année</option>
                <option value="2024">2024</option>
              </select>
              <button class="btn btn-primary" type="submit">Ajouter</button>
            </form>
        </div>

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Listes des livreurs Payés</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Contact</th>
                            <th>Horaire</th>
                            <th>Chiffre obtenu</th>
                            <th>Statuts</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tr>
                        <td>nom_livreur</td>
                        <td>contact_livreur</td>
                        <td>horaire_travail</td>
                        <td>100000</td>
                        <td style="color: #085696;">Payé</td>
                    </tr>
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
                        <p><b>nom_admin</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="./assets/images/profile-1.jpg">
                    </div>
                </div>

            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Notifications</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            autorenew
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Livraison (nom_livreur)</h3>
                            <small class="text_muted">
                                nom_resto
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

            </div>

        </div>