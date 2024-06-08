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
            <h1 class="ajouter"><a href="<?=site_url('RestoController/ajouterPlatPage')?>">+ Ajouter</a></h1>
            <div class="container">
            
            <?php foreach($list_plat_resto as $plat){ ?>
            <div class="card">
                    <img src="<?php echo base_url()?>assets/images/plat.png" alt="">
                    <div class="info">
                        <h2><?=$plat["description"] ?></h2>
                        <p class="price"><?=$plat["prix"] ?></p>
                    </div>
                    <div class="info">
                        <div class="note">
                            <p>
                                Note : 
                                <span class="etoile">
                                <?=$plat["note"] ?>
                                    <span class="material-icons-sharp">
                                        star
                                    </span>
                                </span>
                            </p>
                        </div>
                        <p>Quantite : <span class="qtt"><?=$plat["production"] ?></span></p>
                    </div>
                    <div class="button">
                        <a href="<?=site_url('RestoController/loadFormPlat/'.$plat["id_plat"]) ?>" class="update">Modifier</a>
                        <a href="" class="delete">Supprimer</a>
                    </div>
                </div>
         <?php }?>
                
            </div>
            
        </main>

    </div>
