<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php echo site_url('AdmisController/login');?>" method="post">
							<input type="email" name="email" required>
							<input type="password" name="mot_de_pass" max="35" required>
							<input type="submit" value="se connecter">
</form>
</body>
</html>