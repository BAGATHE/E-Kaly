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
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Recent Orders</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Date de Commande</th>
                                <th>Intitulé</th>
                                <th>Adresse de Livraison</th>
                                <th>Somme(+Livraison)</th>
                                <th>Commission(Plateform)</th>
                                <th>Voir detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="<?php echo base_url()?>assets/images/profile-1.jpg">
                                    <p>Jean Noana</p>
                                </td>
                                <td>14-08-2023</td>
                                <td>Sakafo</td>
                                <td>any Itaosy</td>
                                <td>20.000 Ar</td>
                                <td>3.000 Ar</td>
                                <td><span class="status process"><a href="<?=site_url('RestoController/getDetailCommandeByid/eto id commande') ?>">Detail</a></span></td>
                            </tr>

                            <tr>
                        </tbody>
                    </table>
                </div>

        </main>

    </div>
