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
                <a href="<?= site_url('AdmisController/listRestoLivreur') ?>">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>Restaurant & Livreur</h3>
                </a>
                <a href="<?= site_url('AdmisController/livreurPaye') ?>">
                    <span class="material-icons-sharp">
                        delivery_dining
                    </span>
                    <h3>Fiche de Paye Livreur</h3>
                </a>
                <a href="<?= site_url('AdmisController/revenue') ?>">
                    <span class="material-icons-sharp">
                        assessment
                    </span>
                    <h3>Revenue</h3>
                </a>
                <a href="<?=site_url('AdmisController/miseEnAvant') ?>">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Mise en avant</h3>
                </a>
                <a href="<?=site_url('AdmisController/adminLogout') ?>">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->