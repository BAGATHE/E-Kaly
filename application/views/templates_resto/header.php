<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='<?php echo base_url()?>/assets/font/font.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/ajout.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/resto.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/plat.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/modif.css">
    <link rel="icon" href="<?php echo base_url()?>assets/images/Logo.png">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <title>E-Kaly | Restaurant</title>

    <style>
     #containerchart_1{
        width: 65vw;
        height: 60vh;
        margin:auto;
     }
    #containerchart_2{
        width: 65vw;
        height: 60vh;
        margin:auto;
    }
    #containerPiechart{
        width: 50vw;
        height: 50vh;
        margin:auto;
        margin-bottom:10vh;
    }
     #stat_annuel, #stat_mensuel, #top_5{
        text-align:center;
     }
    #map {
            height: 30vh; /* Définissez la hauteur souhaitée pour votre carte */
            width: 51vw;   /* Assurez-vous que la carte occupe toute la largeur disponible */
    }

    </style>
</head>
<input type="hidden" value="<?=site_url('RestoController/getTodayOrders')?>" id="url_controller">
<input type="hidden" value="<?=site_url('RestoController/DetailCommandeByid')?>" id="detailCommandeUrl">
<body>