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
            <h1 class="titre">Detail commande de Justin</h1>
            <h1 class="ajouter">Prix total : <span>120.000Ar</span></h1>
            <div class="container">
                <div class="card">
                    <img src="<?php echo base_url()?>assets/images/humber.png" alt="">
                    <div class="right">
                        <div class="info">
                            <h2>Humberger</h2>
                            <p>Quantite : <span class="qtt">5</span></p>
                        </div>
                        <div class="info">
                            <p>Prix unitaire: <span class="price">1000Ar</span></p>
                            <p>Prix total: <span class="price">5000Ar</span></p>
                        </div>
                    </div>
                </div>
            </div>
            
        </main>

    </div>
