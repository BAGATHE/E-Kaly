var map;
var restaurantMarker;
var destinationMarker;

function initMap(restaurant, destination) {
    var center = {
        lat: (restaurant.latitude + destination.latitude) / 2,
        lng: (restaurant.longitude + destination.longitude) / 2
    };

    map = new google.maps.Map(document.getElementById('map'), {
        center: center,
        zoom: 12,
        mapTypeId: 'roadmap'
    });

    restaurantMarker = new google.maps.Marker({
        position: { lat: restaurant.latitude, lng: restaurant.longitude },
        map: map,
        title: restaurant.name,
        icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
    });

    var restaurantInfo = `<b>${restaurant.name}</b><br>${restaurant.address}`;
    var restaurantInfoWindow = new google.maps.InfoWindow({
        content: restaurantInfo
    });
    restaurantMarker.addListener('mouseover', function () {
        restaurantInfoWindow.open(map, restaurantMarker);
    });
    restaurantMarker.addListener('mouseout', function () {
        restaurantInfoWindow.close();
    });
    destinationMarker = new google.maps.Marker({
        position: { lat: destination.latitude, lng: destination.longitude },
        map: map,
        title: 'Destination',
        icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
    });

    var destinationInfo = `<b>Destination</b><br>${destination.address}<br>${destination.repere}`;
    var destinationInfoWindow = new google.maps.InfoWindow({
        content: destinationInfo
    });
    destinationMarker.addListener('mouseover', function () {
        destinationInfoWindow.open(map, destinationMarker);
    });
    destinationMarker.addListener('mouseout', function () {
        destinationInfoWindow.close();
    });
}

function showPopup(id_commande) {
    // Remplace ceci par une requête AJAX pour obtenir les données de latitude et longitude
    var restaurant = {
        name: "Le Gourmet",
        address: "123 Rue de la Gastronomie, Antananarivo",
        latitude: -18.8792,
        longitude: 47.5079
    };
    var destination = {
        address: "456 Avenue de la Livraison, Antananarivo",
        repere : "pres du mpivarotra mangahazo",
        latitude: -18.8892,
        longitude: 47.5179
    };

    initMap(restaurant, destination);

    document.getElementById('popup').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}