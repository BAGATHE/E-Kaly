
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
                <img src="<?=base_url()?>assets/images/logo.png">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
            <h1>statistique Annuel</h1>
            <canvas id="chartannuel" width="400" height="150"></canvas>
            <h1>statistique Mensuel</h1>
            <canvas id="chartmensuel" width="400" height="150"></canvas>
        </main>

    </div>

