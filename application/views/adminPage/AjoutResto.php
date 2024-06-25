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
    #map {
            height: 30vh; /* Définissez la hauteur souhaitée pour votre carte */
            width: 35vw;   /* Assurez-vous que la carte occupe toute la largeur disponible */
    }

</style>
<!-- Main Content -->
 <main style="display: -webkit-inline-box;">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header" style="color:black;">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img style=""  class="img-account-profile rounded-circle mb-2" src="<?=base_url()?>/assets/images/Logo.png" alt="">
                        <!-- Profile picture upload button-->
<form method="POST" enctype="multipart/form-data"  action="<?php echo site_url('AdmisController/createResto');?>">
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
                                <input class="form-control" name="nom_resto" id="inputUsername" type="text" placeholder="Le nom de Votre Resto" value="">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Telephone</label>
                                    <input class="form-control" id="inputLocation" name="telephone" type="number" placeholder="Pour vous contacter" value="">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Description</label>
                                    <input class="form-control" id="inputOrgName" name="description" type="text" placeholder="A propos de votre Restaurant" value="">
                                </div>
                                <div class="col-md-6">
                                    Heure d'Ouverture: <input class="form-control-lg" type="time" name="ouverture" id="ouverture" value="">
                                    Heure de Fermeture: <input class="form-control-lg" type="time" name="fermeture" id="fermeture" value="">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="adresse">Adresse</label>
                                    <select class="form-select" name="adresse" id="Adresse">
                                        <option value="0">choisir une adresse</option>
                                        <?php foreach ($adresses as $adresse) { 
                                            if($adresse['id']==$profil['adresse']){echo "<option value='".$adresse['id']."' selected>".$adresse['nom']."</option>"; } ?>
                                            <option value="<?= $adresse['id']?>"> <?=$adresse['nom'] ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="repere">Repere</label>
                                    <input class="form-control" name="repere" id="repere" type="text" placeholder="Pour aider a localiser votre Restaurant" value="">
                                </div>
                                 <div class="col-md-6">
                                    Latitude: <input class="form-control-lg" type="text" name="latitude" id="latitude" value="" readonly>
                                    Longitude: <input class="form-control-lg" type="text" name="longitude" id="longitude" value="" readonly>
                                </div>
                            </div>
                             <div id="map" style="margin-top:5vh; margin-bottom: 5vh;"></div>
                            <button type="submit">Save changes</button>
                           </form>
                            
                    </div>
                </div>
            </div>
            
        </main>
     

<script src="<?=base_url()?>assets/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/jquery/jquery-3.7.1.js"></script>
        <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialisation de la carte à Antananarivo, Madagascar
            var map = L.map('map').setView([-18.8792, 47.5079], 13);

            // Ajout de la couche OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
         
            // Dictionnaire des quartiers avec leurs coordonnées
            var districts = {
                '1': [-18.9083181, 47.5262845],
                '2': [-18.8978735, 47.5255695],
                '3': [-18.9242775, 47.5287731],
                '4': [-18.9159866, 47.5657712],
                '5': [-18.9275742, 47.5130896],
                '6': [-18.9292156, 47.4981480],
                '7': [-18.8986092, 47.5200540],
                '8': [-18.9037134, 47.5293499],
                '9': [-18.9174615, 47.5313719],
                '10': [-18.9007471, 47.5173715],
                '11': [-18.9123208, 47.5365130],
                '12': [-18.8958717, 47.5384325],
                '13': [-18.9021321, 47.5246027],
                '14': [-18.9021313, 47.5352782],
                '15': [-18.91000000, 47.52650000],
                '16': [-18.9104394, 47.5306336],
                '17': [-18.9107383, 47.5210239],
                '18': [-18.9104247, 47.5168708],
                '19': [-18.9191141, 47.5243646],
                '20': [-18.9097086, 47.5288741],
                '21': [-18.8918640, 47.5355036],
                '22': [-18.9123265, 47.5119034],
                '23': [-18.9073725, 47.5210871],
                '24': [-18.9325956, 47.5274904],
                '26': [-18.9578923, 47.5281890],
                '28': [-18.9127038, 47.5163415],
                '29': [-18.9034637, 47.5123933],
                '30': [-18.9792134, 47.5335333],
                '31': [-18.9426447, 47.5240731],
                '32': [-18.9362863, 47.5245648],
                '33': [-18.9977702, 47.5342483],
                '34': [-18.8867581, 47.5212986],
                '35': [-18.9030772, 47.5217396],
                '36': [-18.9182962, 47.5449553],
                '37': [-18.8756504, 47.5251073],
                '38': [-18.8846077, 47.5099316],
                '39': [-18.8767941, 47.5468778],
                '40': [-18.9005783, 47.5450308],
                '41': [-18.8889, 47.5983],
                '42': [-18.9032, 47.5546],
                '43': [-18.8870, 47.5427],
                '44': [-18.8711, 47.5401],
                '45': [-18.8635, 47.5300],
                '46': [-18.9125, 47.5281],
                '47': [-18.8983, 47.5270],
                '48': [-18.9115, 47.5378],
                '49': [-18.9127, 47.5298],
                '50': [-18.9172, 47.5304]
            };

            var currentMarker = null;

            // Gestionnaire de l'événement de changement de sélection
            document.getElementById('Adresse').addEventListener('change', function(event) {
                var selectedDistrict = event.target.value;
                if (selectedDistrict && districts[selectedDistrict]) {
                    var coordinates = districts[selectedDistrict];
                    map.setView(coordinates, 15); // Ajustez le niveau de zoom si nécessaire
                }
            });

            map.on('click', function(e) {
                if (currentMarker) {
                    map.removeLayer(currentMarker);
                }
                // Ajouter un nouveau marqueur à l'endroit cliqué
                currentMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
                $("#latitude").val(e.latlng.lat);
                $("#longitude").val(e.latlng.lng);
            });
        });
    </script>
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
 