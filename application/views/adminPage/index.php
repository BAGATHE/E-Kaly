
        <!-- Main Content -->
        <main>
            <div class="header">
                <div class="left" style="margin-top:11vh;">
                    <h1>Dashboard</h1>
                </div>
            </div>
            <!-- dashboard -->
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Client actif</h3>
                            <h1><?=$nb_client ?></h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <span class="material-icons-sharp">
                                    boy
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Restaurant sur le plateforme</h3>
                            <h1><?=$nb_resto ?></h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <span class="material-icons-sharp">
                                    house
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Revenue mensuel</h3>
                            <h1><?=number_format($revenu_generer["revenu_n"], 2, '.', ',') ?> Ar</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <span class="material-icons-sharp">
                                    assessment
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="diff">
                    <div class="status">
                        <div class="info">
                            <h3>Variation</h3>
                            <h1><?=number_format($revenu_generer["pourcentage_variation"],0, '.', ',') ?> %</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <span class="material-icons-sharp">
                                    auto_graph
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of dashboard -->

    

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
                    
                  
                

            </div>
            <!-- End of Nav -->
             <div class="reminders">
                <div class="header">
                    <h2>Administrateur</h2>  <a href="<?= site_url('AdmisController/insertionPageAdmin')?>"><img src="<?php echo base_url()?>assets/images/plus.png" style="width: 60px;"></a>
                    <span class="material-icons-sharp">
                        admin_panel_settings
                    </span>
                </div>
                <?php foreach( $administrators as $administrator ){ ?>

                <div class="notification">
                    <div class="icon" style="width: 60px;">
                    <div class="profile-photo" >
                        <img src="<?php echo base_url()?>assets/images/manager.svg">
                    </div>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3><?php echo $administrator["nom"]; ?></h3>
                            <small class="text_muted">
                                admministrateur
                            </small>
                        </div>
                        <!-- <span class="material-icons-sharp">
                            more_vert
                        </span> -->
                    </div>
                </div>
                <?php } ?>
              
            </div>
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

  

