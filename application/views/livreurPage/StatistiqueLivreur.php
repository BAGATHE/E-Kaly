<main>
         <h1>Statistiques Livreur</h1>
         <form id='statistiqueLivreur'  method="POST" action="<?php echo site_url('LivreurController\statistiqueLivreur');?>">
         <input type="hidden" name="id_livreur" value="<?=$current_livreur['id'] ?>"/>    
         <div class="liste">
            <div class="form-input">
                <select name="mois" id="">
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
                <select name="annee" id="">
                   <option value="0">Année</option>
                   <option value="2024">2024</option>
               </select>
                <button type="submit">Valider</button>
            </div>
             </div>
        </form>

         <div class="insights">
            <div class="sales">
               <span class="material-symbols-sharp">account_balance_wallet</span>
               <div class="middle">
                  <div class="left">
                     <h3>Solde reçu</h3>
                     <h1 class="ekaly" id="solde_total"></h1>
                  </div>
               </div>
            </div>
            <!-- END SALES -->
         </div>
         <!-- END INSIGHTS -->
         
        
            <div class="middle">
               <div class="left">
                  <canvas id="myChartmensuelle" width="400" height="200"></canvas>
               </div>
            </div>
      
         <!-- END CHART -->
         
         <div class="recent-orders" id="orders-table">
            <h2>Tableau récapitulatif</h2>
            <table>
               <thead>
                  <tr>
                     <th>date</th>
                     <th>Somme Frais livraison</th>
                     <th>Commission</th>
                  </tr>
               </thead>
               <tbody>
               
               </tbody>
            </table>
         </div>
      </main>
      <!-- END MAIN -->
