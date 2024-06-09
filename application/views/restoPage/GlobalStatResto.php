
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
                        <button class="btn btn-primary" type="submit">voir</button>
                        </form>
                    </div>
            
            
            <div id="containerchart_1">
                <h1 id="stat_annuel">statistique Annuel</h1>
                <canvas id="chartannuel" width="400" height="150"></canvas>
            </div>
            
               
           
            <div id="containerchart_2" >
                <h1 id="stat_mensuel" >statistique Mensuel</h1>
                <canvas id="chartmensuel" width="400" height="150"></canvas> 
            </div>
            
        </main>

    </div>

