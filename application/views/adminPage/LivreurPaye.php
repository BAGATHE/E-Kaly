        <!-- Main Content -->
        <main>

        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <form  id='statistique'  method="POST" action="<?php echo site_url('AdmisController/RevenuParMoisLivreur');?>">
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
                type="submit">Voir</button>
            </form>
        </div>

            <!-- Recent Orders Table -->
            <div class="recent-orders">
                <h2>Listes des livreurs Payés</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Contact</th>
                            <th>Salaire du mois</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($livreurs_payement) || !empty($livreurs_payement)){ 
                           foreach($livreurs_payement as $livreur){ ?>
                        <tr>
                            <td><?=$livreur["nom_complet"] ?></td>
                            <td><?=$livreur["telephone"] ?></td>
                            <td><?=$livreur["montant_a_paye"]?></td>
                        </tr>

                        <?php }  }?>
                    </tbody>
                </table>
            </div>

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
                        <p><?php echo $current_administrator["nom"]; ?></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="<?php echo base_url()?>assets/images/manager.svg">
                    </div>
                </div>

            </div>

        </div>
<script src="<?=base_url()?>assets/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/jquery/jquery-3.7.1.js"></script>
