
        <!-- Main Content -->
        <main>
            <!-- New Users Section -->
            <div class="new-users">
                <h2>Listes des admins</h2>
                <div class="user-list">
                <?php foreach( $administrators as $administrator ){ ?>
                    <div class="user">
                        <img src="<?php echo base_url()?>assets/images/manager.svg">
                        <h2><?= $administrator['nom']  ?></h2>
                    </div>
                <?php } ?>
                    <div class="user">
                        <a href="<?= site_url('AdmisController/insertionPage')?>"><img src="<?php echo base_url()?>assets/images/plus.png"></a>
                        <h2>Ajouter</h2>
                    </div>
                </div>
            
                <div class="recent-orders">
                    <table>
                        <thead>
                            <tr>
                                <th>identifiant</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <?php foreach( $administrators as $administrator ){ ?>
                        <tr>
                            <td><?= $administrator['id'] ?></td>
                            <td><?= $administrator['nom'] ?></td>
                            <td><?= $administrator['prenom'] ?></td>
                            <td><?= $administrator['email'] ?></td>
                            <td><a href="<?= site_url('AdmisController/delete/'.$administrator['id']) ?>"style="color: red;">Supprimer</a></td>
                            <td><a href="<?= site_url('AdmisController/loadForm/'.$administrator['id']) ?>">Modifier</a></td>
                        </tr>
                       <?php  }?>
                    </table>
                </div>
            </div>
            <!-- End of New Users Section -->

            <!-- End of Recent Orders -->
            <div class="recent-orders client_div" >
                <h2>Listes des clients</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($clients as $client){ ?>
                    <tr>
                        <td><?= $client["nom"]?></td>
                        <td><?= $client["prenom"]?></td>
                        <td><?= $client["email"]?></td>
                        <td><a href="" style="color: red;">Supprimer</a></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- End of Recent Orders -->

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
            <!-- End of Nav -->
        </div>
  

