
    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <form action="#">
                <div class="form-input">
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="<?=site_url('RestoController/notificationPage')?>" class="notif">
                <span class="material-icons-sharp">
                    notifications_none
                </span>
                <span class="count">0</span>
            </a>
            <a href="<?= site_url('RestoController/infoProfil')?>" class="profile">
                <p><?=$profil["nom"]?></p>
                <img src="<?php echo base_url()?>assets/images/<?=$profil['image'] ?>">
            </a>
        </nav>

        <!-- End of Navbar -->

        <main>
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <form  id='statistiqueResto'  method="POST" action="<?php echo site_url('RestoController\globalStatResto');?>">
                        <input type="hidden" name="id_resto" value="<?=$current_resto['id'] ?>"/>
                        <select class="form-select  d-sm-inline-block" aria-label="Default select example" id="mois" style="width: 12vw;" name="mois">
                            <option value="0" selected>choisir  mois</option>
                            <option value="1">Janvier</option>
                            <option value="2">Fevrier</option>
                            <option value="3">Mars</option>
                            <option value="4">Avril</option>
                            <option value="5">Mai</option>
                            <option value="6">Juin</option>
                            <option value="7">Juillet</option>
                            <option value="8">Aout</option>
                            <option value="9">Septembre</option>
                            <option value="10">Octobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Decembre</option>
                        </select>

                        <select class="form-select  d-sm-inline-block" aria-label="Default select example" id="annee" style="width: 12vw;" name="annee">
                            <option value="0">choisir  année</option>
                            <option value="2024">2024</option>
                        </select>
                        <button class="btn btn-primary" style="width: 5em; height: 3em; color: var(--white-clr); border-radius: 5px; background: var(--green-clr); cursor: pointer;" type="submit">voir</button>
                        </form>
                    </div>
            
        
            <div id="containerchart_1">
                <h1 id="stat_annuel">Statistique Annuel</h1>
                <canvas id="chartannuel" width="400" height="150"></canvas>
            </div>

            <div id="containerchart_2" >
                <h1 id="stat_mensuel" >Statistique Mensuel</h1>
                <canvas id="chartmensuel" width="400" height="150"></canvas> 
            </div>
            
            <!-- Ajout du pie chart pour le revenu mensuel -->
            <!--
            <div id="containerPiechart">
            <h1 id="top_5">Top 5 vente</h1>
            <canvas id="monthlyRevenuePieChart" width="400" height="200"></canvas>
            </div>
            -->
            <!-- Tableau ajouter -->
            <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3 style="text-align: center;">Nombre de vente par plat</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table id="orders-table">
                        <thead>
                            <tr>
                                <th>Plat</th>
                                <th>Prix Unitaire</th>
                                <th>Quantite</th>
                                <th>Prix total</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
            
        </main>

    </div>
<script src="<?=base_url()?>assets/js/Chart2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script src="<?=base_url()?>assets/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/jquery/jquery-3.7.1.js"></script>
<script src="<?=base_url()?>assets/js/globalStatistiqueChart.js"></script>
