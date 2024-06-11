   <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit">
                        <span class="material-icons-sharp">
                            troubleshoot
                        </span>
                    </button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="<?=site_url('RestoController/notificationPage')?>" class="notif">
                <span class="material-icons-sharp">
                    notifications_none
                </span>
            </a>
            <a href="#" class="profile">
                <p><?=$current_resto["nom"]?></p>
                <img src="<?php echo base_url()?>assets/images/Logo.png">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Les commandes du Jours</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table id="table_commande_du_jour">
                        <thead>
                            <tr>
                                <th>id Commande</th>
                                <th>Date de Commande</th>
                                <th>Prix total</th>
                                <th>Statut</th>
                                <th>Voir detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </main>

    </div>

