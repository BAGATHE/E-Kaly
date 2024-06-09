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
                <img src="./assets/images/logo.png">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>

            <div class="bottom-data">
                <div class="orders">
                    <div class="ajout">
                        <form action="<?=base_url()?>/">
                            <h2>Mise en avant</h2>
                            <div class="form-input">
                                <input type="hidden" placeholder="id_resto" value="id_resto">
                            </div>
                            <div class="form-input">
                                <label for="">Prix</label>
                                <input type="number" placeholder="prix" value="45000" readonly>
                            </div>
                            <div class="form-input">
                                <label for="">Date</label>
                                <input type="date" placeholder="date" value="date">
                            </div>
                            <div class="form-input">
                                <label for="">Durée</label>
                                <input type="number" placeholder="duree" value="3">
                            </div>
                            <button type="submit">Modifier</button>
                        </form>
                    </div>
                </div>

            </div>

        </main>

    </div>
