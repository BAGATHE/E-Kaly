     
    </div>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialisation de la carte à Antananarivo, Madagascar
        var map = L.map('map').setView([-18.8792, 47.5079], 13);

        // Ajout de la couche OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Dictionnaire des quartiers avec leurs coordonnées
        var districts = {
            '20': [-18.9033, 47.5182],
            '1': [-18.9137, 47.5252],
            '32':[-18.98609417455635,47.532829187957816]
            // Ajoutez d'autres quartiers avec leurs coordonnées
        };
        var currentMarker = null;
        // Gestionnaire de l'événement de changement de sélection
        document.getElementById('optionsAdresse').addEventListener('change', function(event) {
            var selectedDistrict = event.target.value;
            if (selectedDistrict && districts[selectedDistrict]) {
                var coordinates = districts[selectedDistrict];
                map.setView(coordinates, 15); // Ajustez le niveau de zoom si nécessaire
            }
            var mapElement = document.getElementById("map");
            mapElement.classList.add('show');
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
    </script>
<script src="<?=base_url()?>assets/js/orders.js"></script>
<script src="<?=base_url()?>assets/js/index.js"></script>
<script src="<?=base_url()?>assets/js/Chart.min.js"></script>
<!--<script src="<?=base_url()?>assets/js/chart.js"></script>-->
<script src="<?=base_url()?>assets/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/jquery/jquery-3.7.1.js"></script>
<script src="<?=base_url()?>assets/js/revenu.js"></script>
</body>

</html>