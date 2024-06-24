        <!-- Main Content -->
        <main>
            <!-- Recent Orders Table -->
            <div class="recent-orders resto_div">
                <h2>Listes des restaurants <a href="<?= site_url('AdmisController/insertionPageResto') ?>" style="color: #085696;">+ Ajouter</a></h2>
                <table>
                    <thead>
                        <tr>
                            <th>identifiant</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Description</th>
                            <th>Heure ouverture</th>
                            <th>Heure fermeture</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($restaurants as $resto){?>
                    <tr>
                        <td><img src="<?php echo base_url()?>assets/images/<?=$resto['image']?>" style="width: 40px;"></td>
                        <td><?=$resto['nom'] ?></td>
                        <td><?=$resto['adresse'] ?></td>
                        <td><?=$resto['description'] ?></td>
                        <td><?=$resto['heure_ouverture'] ?></td>
                        <td><?=$resto['heure_fermeture'] ?></td>
                        <td><?=$resto['email'] ?></td>
                        <td>
                            <a href="" class="delete-link" style="color: red;">Supprimer</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="recent-orders livreur_div">
                <h2>Listes des livreurs <a href="<?= site_url('AdmisController/insertionPageLivreur') ?>" style="color: #085696;">+ Ajouter</a></h2>
                <table>
                    <thead>
                        <tr>
                            <th>identifiant</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <?php foreach( $livreurs as $livreur ){?>  
                    <tr> 
                        <td><?=$livreur['id'] ?></td>
                        <td><?=$livreur['nom_complet'] ?></td>
                        <td><?=$livreur['email'] ?></td>
                        <td><?=$livreur['adresse'] ?></td>
                        <td>
                            <a href="" class="delete-link" style="color: red;">Supprimer</a>
                        </td>
                        <td><a href="<?= site_url('LivreurController/loadForm/'.$livreur['id']) ?>">Modifier</a></td>
                    </tr>
                    <?php } ?>
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
                        <img src="<?php echo base_url()?>assets/images/profile-1.jpg">
                    </div>
                </div>

            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
    $(document).ready(function() {
        // Ajouter le gestionnaire de confirmation de suppression
        $('.delete-link').on('click', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var confirmDelete = confirm('Confirmer la suppression');
            if (confirmDelete) {
                window.location.href = url;
            }
        });
    });
</script>

