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

        <h1 style="color:darkcyan;">À propos du Resto:</h1>
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
                            <div id="map" style="margin-top:5vh; margin-bottom: 5vh;"></div>
                            <button type="submit">Save changes</button>
                           </form>
                            
                    </div>
                </div>
            </div>
            
        </main>
         

    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialisation de la carte à Antananarivo, Madagascar
            var map = L.map('map').setView([-18.8792, 47.5079], 13);

            // Ajout de la couche OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
            
      
            var latitude = <?php echo json_encode($profil['latitude']); ?>;
            var longitude = <?php echo json_encode($profil['longitude']); ?>;
       /*
            // Ajouter un marqueur aux coordonnées fournies
            if (latitude && longitude) {
                var marker = L.marker([latitude, longitude]).addTo(map);
                map.setView([latitude, longitude], 15); // Centrer la carte sur le marqueur
            }
            */
            // Définir l'icône personnalisée
            var customIcon = L.icon({
                iconUrl: '<?=base_url()?>/assets/images/restaurant.svg', // Remplacez par le chemin de votre icône
                iconSize: [38, 38], 
            });

            // Ajouter un marqueur aux coordonnées fournies avec l'icône personnalisée
            if (latitude && longitude) {
                var marker = L.marker([latitude, longitude], {icon: customIcon}).addTo(map).bindPopup('<b><?=$profil['nom'] ?></b>');;
                map.setView([latitude, longitude], 15); // Centrer la carte sur le marqueur
            }
             

            // Dictionnaire des quartiers avec leurs coordonnées
            var districts = {
                '1': [-18.9083181,47.5262845],
                '2': [-18.8978735,47.5255695],
                '3': [-18.9242775,47.5287731],
                '4': [-18.9159866,47.5657712],
                '5': [-18.9275742,47.5130896],
                '6': [-18.9292156,47.4981480],
                '7': [-18.8986092,47.5200540],
                '8': [-18.9037134,47.5293499],
                '9': [-18.9174615,47.5313719],
                '10': [-18.89448418947927,47.53698412925651],
                '11': [-18.901680627902227,47.52448532473487],
                '12': [-18.8958717,47.5384325],
                '13': [-18.907098495007926,47.54324913024902],
                '14': [-18.90901682721876,47.530953884124756],
                '15': [-18.912961421892753, 47.52077161787855],
                '16': [-18.9104394,47.5306336],
                '17': [-18.918620207528782,47.524999695225425],
                '18': [-18.9104247,47.5168708],
                '19': [-18.9191141,47.5243646],
                '20': [-18.9097086,47.5288741],
                '21': [-18.90678942925861,47.52314691133188],
                '22': [-18.93085143600485,47.52670472468013],
                '23': [-18.9073725,47.5210871],
                '24': [-18.95954527856256,47.52689838409424],
                '25':[-18.91652310113871,47.518611337278706],
                '26': [-18.91310272102047,47.51723804626308],
                '27':[-18.90621927845529,47.507488166595785],
                '28': [ -18.98646088259979,47.53251561668927],
                '29': [-18.943350235590103, 47.528743743896484],
                '30': [ -18.940184103694182, 47.52213478088379],
                '31': [-18.996786490994886, 47.53537993995851],
                '32': [-18.878676182424343,47.521705627441406],
                '33': [-18.904415749692024,47.51896917237658],
                '34': [-18.8867581,47.5212986],
                '35': [ -18.875038705033933, 47.52220928086657],
                '36': [ -18.87833793598639, 47.50934595328599],
                '37': [-18.876036722911692,47.543463706970215],
                '38': [-18.901065704812094, 47.545494647470306],
                '39': [-18.892644321876908,47.529215812683105],
                '40': [-18.9005783,47.5450308],
                '41': [-18.8889, 47.5983],
                '42': [-18.9032, 47.5546],
                '43': [ -18.876222592072118,47.5250453192824],
                '44': [-18.8711, 47.5401],
                '45': [-18.8635, 47.5300],
                '46': [-18.910285553366148, 47.5248384475708],
                '47': [-18.92484855294493, 47.55489265323119],
                '48': [-18.9115, 47.5378],
                '49': [-18.91424188705639, 47.530543699347966],
                '50': [ -18.918143239683832,  47.53097783327222]
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
                var inputElement = document.getElementById("repere");
                inputElement.classList.add('show');
                if (currentMarker) {
                    map.removeLayer(currentMarker);
                }
                // Ajouter un nouveau marqueur à l'endroit cliqué
                currentMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
            });
        });
    </script>

