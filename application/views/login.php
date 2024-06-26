<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/login.css">
    <title>E-Kaly Connexion</title>
</head>
<body>
    <div class="container">
        <div class="welcome">
            <img src="<?=base_url()?>assets/img/E-Kaly.png">
            <div class="text">
                <p>Noana lava...</p><p>Ndao</p>
                <h1>E-Kaly</h1>
            </div>
        </div>
        <div class="form-container" id="register-container">
            <form id="inscription_client" action="<?php echo site_url('AuthentificationController/create');?>" method="POST" >
                <h1>Inscription.</h1>
                <div class="input-group">
                    <input type="text" name="nom" class="input">
                    <label class="label">Nom</label>
                </div>
                <div class="input-group">
                    <input type="text" name="prenom" class="input">
                    <label class="label">Prenom</label>
                </div>
                <div class="input-group">
                    <input type="email" name="email" class="input">
                    <label class="label">Email</label>
                </div>
                <div class="input-group">
                    <input type="text" name="telephone" class="input">
                    <label class="label">Telephone</label>
                </div>
                <div class="input-group">
                    <input type="password" name="mot_de_pass" class="input">
                    <label class="label">Mot de passe</label>
                </div>
                <button type="submit">S'inscrir</button>
            </form>
            <p>ou</p>
            <label id="login">Connexion</label>
        </div>
        <div class="form-container" id="login-container">
            <form action="<?php echo site_url('AuthentificationController/checkUserLogin');?>" method="post">
                <h1>Connexion.</h1>
                <div class="input-group">
                    <input type="email" name="email" class="input" required>
                    <label class="label">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="mot_de_pass" max="35" required class="input">
                    <label class="label">Mot de passe</label>
                </div>
                <button type="submit">Se connecter</button>
            </form>
            <p>ou</p>
            <label id="register">Inscription</label>
            <p style="color:red"><?php if(isset($error)) echo $error;?></p>
        </div>
    </div>
</body>
<script src="<?=base_url()?>assets/js/login.js"></script>
<script src="<?=base_url()?>assets/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/jquery/jquery-3.7.1.js"></script>
<script>
 $(document).ready(function() {
    $('#inscription_client').submit(function(event){
        event.preventDefault();
        var form = $(this);
        var url = form.attr('action');
         var formData = $(this).serialize();
    $.ajax({
        type: 'POST',
        url: url,
        data:formData ,
        success: function(response) {
          alert("success");
          window.location.href="<?php site_url("EntryPoint/index2")?>";
        },
        error: function(error) {
            console.log(error);
            alert('Erreur lors de la récupération de la note');
        }
    })

    });


    });
</script>
</html>