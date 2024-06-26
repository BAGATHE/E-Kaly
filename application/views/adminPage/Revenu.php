      
      <!-- Main Content -->
        <main>
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <form class="liste" id='statistique'  method="POST" action="<?php echo site_url('AdmisController/checkStatisiqueGeneral');?>">
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

              <select class="form-select  d-sm-inline-block" aria-label="Default select example" id="anner" style="width: 12vw;" name="anner">
                <option value="0">choisir  année</option>
                <option value="2024">2024</option>
              </select>
              <button style="width: 5em; height: 3em; color: var(--white-clr); border-radius: 5px; background: var(--green-clr); cursor: pointer;" 
                    type="submit">Valider</button>
            </form>
        </div>
        
            <h1>Revenue Annuel</h1>
            <canvas id="myChartannuel" width="400" height="200"></canvas>
            <h1>Revenue Mensuel</h1>
            <canvas id="myChartmensuelle" width="400" height="200"></canvas>

            <!-- Tableau ajouter -->
            <!-- <div class="bottom-data">
                <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3 style="text-align: center;">Details</h3>
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
            </div> -->
            
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p><b>nom_admin</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="">
                    </div>
                </div>

            </div>

        </div>
<script src="<?=base_url()?>assets/js/Chart.min.js"></script>
<script src="<?=base_url()?>assets/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/jquery/jquery-3.7.1.js"></script>
<script src="<?=base_url()?>assets/js/revenu.js"></script>



  