
        <!-- Main Content -->
        <main>
            <div class="header">
                <div class="left">
                    <h1>Dashboard</h1>
                </div>
            </div>

            <!-- Dashboard -->
            <ul class="insights">
                <li>
                    <span class="material-icons-sharp">
                        boy
                    </span>
                    <span class="info">
                        <h3>
                            15
                        </h3>
                        <p>Nombres de client actif</p>
                    </span>
                </li>
                <li>
                    <span class="material-icons-sharp">
                        house
                    </span>
                    <span class="info">
                        <h3>
                            20
                        </h3>
                        <p>Nombre de restaurant</p>
                    </span>
                </li>
                <li>
                    <span class="material-icons-sharp">
                        assessment
                    </span>
                    <span class="info">
                        <h3>
                            14000 Ar
                        </h3>
                        <p>Revenus mensuel</p>
                    </span>
                </li>
                <li>
                    <span class="material-icons-sharp">
                        auto_graph
                    </span>
                    <span class="info">
                        <h3>
                            6000 Ar
                        </h3>
                        <p>Difference de revenus</p>
                    </span>
                </li>
            </ul>
            <!-- End of Dashboard -->
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
                        <a href="<?= site_url('AdmisController/insertionPageAdmin')?>"><img src="<?php echo base_url()?>assets/images/plus.png"></a>
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
                            <td>
                                <a href="<?= site_url('AdmisController/delete/'.$administrator['id']) ?>" class="delete-link" style="color: red;">Supprimer</a>
                            </td>
                            <td><a href="<?= site_url('AdmisController/loadForm/'.$administrator['id']) ?>">Modifier</a></td>
                        </tr>
                       <?php  }?>
                    </table>
                </div>
            </div>
            <!-- End of New Users Section -->

            <!-- End of Recent Orders -->
            <div class="recent-orders client_div">
    <h2>Listes des clients</h2>
    <table id="client-table">
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
            <td>
                <a href="<?= site_url('AdmisController/deleteClient/'.$client["id"]) ?>" class="delete-link" style="color: red;">Supprimer</a>
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <div id="pagination-container"></div>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var rowsPerPage = 2;
        var rows = $('#client-table tbody tr');
        var rowsCount = rows.length;
        var pageCount = Math.ceil(rowsCount / rowsPerPage);
        var numbers = $('#pagination-container');

        // Générer les numéros de page
        for (var i = 0; i < pageCount; i++) {
            numbers.append('<a href="#" class="page-link">' + (i + 1) + '</a> ');
        }

        // Afficher les lignes correspondant à la page actuelle
        function showPage(page) {
            rows.hide();
            rows.slice((page - 1) * rowsPerPage, page * rowsPerPage).show();
            $('.page-link').removeClass('active');
            $('.page-link').eq(page - 1).addClass('active');
        }

        // Afficher la première page
        showPage(1);

        // Gestion du clic sur les numéros de page
        $('.page-link').click(function(e) {
            e.preventDefault();
            showPage($(this).text());
        });

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

  

