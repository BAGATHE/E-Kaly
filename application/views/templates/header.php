<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/index.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/ajout.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/modif.css">
    <link rel="icon" href="<?php echo base_url()?>assets/images/Logo.png">
   
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
    #principale {
    display: flex;
    justify-content: space-between;
    align-items: flex-start; /* Alignement vertical au début */
}

#principale .ajout {
    order: 1; 
    width: 40%; /* Ajuster la largeur selon vos besoins */
}

#principale #map {
    margin-top:30vh;
    order: 2; 
    width: 60%; /* Ajuster la largeur selon vos besoins */
}
        #map {
            width: 800px;
            height: 400px;
        }
        #selector {
            margin: 10px;
        }
        #map, #repere {
        display: none; /* Masquer par défaut */
        opacity: 0; /* Initialiser l'opacité à 0 */
        transition: opacity 1s ease-in-out; /* Transition pour l'opacité */
         }

         #map.show, #repere.show {
         display: block;
         opacity: 1; /* Opacité à 1 lors de l'affichage */
}
    </style>
    <title>E-Kaly | Admin</title>
</head>

<body>
<div class="container">