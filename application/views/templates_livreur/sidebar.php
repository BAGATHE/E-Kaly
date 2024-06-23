<aside>
            <div class="top">
                <div class="logo">
                    <img src="<?=base_url()?>assets/images/Logo.png" alt="logotipo">
                    <h2>E<span class="ekaly">-KALY</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-sharp">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="<?= site_url('LivreurController') ?>"> 
                    <span class="material-symbols-sharp">home</span>
                    <h3>Accueil</h3>
                </a>
                <a href="<?= site_url('LivreurController/LoadLivraisonPage') ?>" >
                    <span class="material-symbols-sharp">electric_moped</span>
                    <h3>Livraison du jour</h3>
                </a>
                <a href="<?= site_url('LivreurController/LoadPerformancePage') ?>">
                    <span class="material-symbols-sharp">insights</span>
                    <h3>Performance</h3>
                </a>
                <a href="<?= site_url('LivreurController/livreurLogout') ?>">
                    <span class="material-symbols-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
    </aside>