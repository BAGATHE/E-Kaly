 <!-- Sidebar Section -->
 <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="<?php echo base_url()?>assets/images/Logo.png">
                    <h2>E-<span class="kaly">KALY</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="<?= site_url('AdmisController') ?>">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Accueil</h3>
                </a>
                <a href="<?= site_url('RouteController/listRestoLivreur') ?>">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Restaurant & Livreur</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>
                <a href="<?= site_url('AuthentificationController/adminLogout') ?>">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->