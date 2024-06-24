<style>
    .img-account-profile {
        height: 10rem;
    }
    .rounded-circle {
        border-radius: 50% !important;
    }
    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }
    .card .card-header {
        font-weight: 500;
    }
    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }
    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }
    .form-control, .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    button{
        margin-top:20px;
        width: 100%;
        border:none;
        color:white;
        background-color:#1cb45b;
        margin:auto;
        padding: 0.5rem 1rem;
        border-radius:5px;
    }
    button:hover{
        background-color:#12753b;
    }


    .col-xl-4{
        display: flex;
        float:left;
    }

    .right_content{
        border-radius: 2px;
        width: 100%;
        float:right;
    }

    .card-detail{
        width: 60%;
        margin-left:30px;
    }

</style>

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
                <img src="<?php echo base_url()?>assets/images/<?= $profil['image']?>">
            </a>
        </nav>

        <!-- End of Navbar -->

        <h1 style="color:darkcyan;">A propos du Resto:</h1>
        <main style="display: -webkit-inline-box;">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header" style="color:black;">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img style="margin-left:10%;"  class="img-account-profile rounded-circle mb-2" src="<?php echo base_url()?>assets/images/<?= $profil['image']?>" alt="">
                        <!-- Profile picture upload button-->
<form action="<?= site_url('RestoController/updateProfil'); ?>" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id_resto" value="<?=$profil['id']?>">
                        <input type="file" class="custom-file-input" name="profile_image" id="profile_image" aria-describedby="profile_image">
                    </div>
                </div>
            </div>

            <div class="card-detail">
                <!-- Account details card-->
                <div class="right_content">
                <div class="card-header" style="background-color:grey; color:black;">Account Details</div>
                    <div class="card-body">


                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Nom du resto</label>
                                <input class="form-control" name="nom_resto" id="inputUsername" type="text" placeholder="Le nom de Votre Resto" value="<?= $profil['nom'] ?>">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Telephone</label>
                                    <input class="form-control" id="inputLocation" name="telephone" type="number" placeholder="Pour vous contacter" value="<?=$profil['telephone']?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Description</label>
                                    <input class="form-control" id="inputOrgName" name="description" type="text" placeholder="A propos de votre Restaurant" value="<?=$profil['description']?>">
                                </div>
                                <div class="col-md-6">
                                    Heure d'Ouverture: <input class="form-control-lg" type="time" name="ouverture" id="ouverture" value="<?=$profil['heure_ouverture']?>">
                                    Heure de Fermeture: <input class="form-control-lg" type="time" name="fermeture" id="fermeture" value="<?=$profil['heure_fermeture']?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="adresse">Adresse</label>
                                    <select class="form-select" name="adresse" id="Adresse">
                                        <?php foreach ($adresses as $adresse) { 
                                            if($adresse['id']==$profil['adresse']){echo "<option value='".$adresse['id']."' selected>".$adresse['nom']."</option>"; } ?>
                                            <option value="<?= $adresse['id']?>"> <?=$adresse['nom'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="repere">Repere</label>
                                    <input class="form-control" name="repere" id="repere" type="text" placeholder="Pour aider a localiser votre Restaurant" value="<?=$profil['repere']?>">
                                </div>
                            </div>
                            <button type="submit">Save changes</button>
</form>
                    </div>
                </div>
            </div>
            
        </main>

    </div>
