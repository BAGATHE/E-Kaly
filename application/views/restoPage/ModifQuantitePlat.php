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

            <div class="bottom-data">
                <div class="orders">
                    <div class="ajout">
                        <form action="">
                            <h2>Modifier Quantite_Plat</h2>
                            <div class="form-input">
                                <label for="">Plat</label>
                                <select name="" id="">
                                    <option value="id_plat">nom_plat</option>
                                    <option value="id_plat">nom_plat</option>
                                </select>
                            </div>
                            <div class="form-input">
                                <label for="">Date</label>
                                <input type="date" placeholder="date" value="date">
                            </div>
                            <div class="form-input">
                                <label for="">Production</label>
                                <input type="number" placeholder="production" value="3">
                            </div>
                            <button type="submit">Modifier</button>
                        </form>
                    </div>
                </div>

            </div>

        </main>

    </div>

