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
            <a href="#" class="notif">
                <span class="material-icons-sharp">
                    notifications_none
                </span>
                <span class="count">12</span>
            </a>
            <a href="#" class="profile">
                <p>resto_nom</p>
                <img src="<?php echo base_url()?>assets/images/Logo.png">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <h1 class="ajouter"><a href="<?=site_url('RestoController/ajouterPlat')?>">+ Ajouter</a></h1>
            <h1 class="ajouter"><a href="<?=site_url('RestoController/loadFormModifQuantiteProduction')?>">+ Modifier Quantité Plat</a></h1>
            <div class="container">
                <div class="card">
                    <img src="<?php echo base_url()?>assets/images/plat.png" alt="">
                    <div class="info">
                        <h2>Riz cantonais</h2>
                        <p class="price">22000Ar</p>
                    </div>
                    <div class="info">
                        <div class="note">
                            <p>
                                Note : 
                                <span class="etoile">
                                    5 
                                    <span class="material-icons-sharp">
                                        star
                                    </span>
                                </span>
                            </p>
                        </div>
                        <p>Quantite : <span class="qtt">10</span></p>
                    </div>
                    <div class="button">
                        <a href="<?=site_url('RestoController/loadFormPlat') ?>" class="update">Modifier</a>
                        <a href="" class="delete">Supprimer</a>
                    </div>
                </div>
                <div class="card">
                    <img src="<?php echo base_url()?>assets/images/plat.png" alt="">
                    <div class="info">
                        <h2>Riz cantonais</h2>
                        <p class="price">22000Ar</p>
                    </div>
                    <div class="info">
                        <div class="note">
                            <p>
                                Note : 
                                <span class="etoile">
                                    5 
                                    <span class="material-icons-sharp">
                                        star
                                    </span>
                                </span>
                            </p>
                        </div>
                        <p>Quantite : <span class="qtt">10</span></p>
                    </div>
                    <div class="button">
                        <a href="ModifPlat.html" class="update">Modifier</a>
                        <a href="" class="delete">Supprimer</a>
                    </div>
                </div>
            </div>
            
        </main>

    </div>
