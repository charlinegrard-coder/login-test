 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>

<h1>Connexion</h1>

<form action="login_traitement.php" method="POST">
    <label>
        Pseudo :
        <input type="text" name="pseudo" required minlength="6" maxlength="70">
    </label><br><br>

    <label>
        Mot de passe :
        <input type="password" name="password" required minlength="8" maxlength="15">
    </label><br><br>

    <button type="submit">Se connecter</button>
</form>

</body>
</html>
<?php
session_start();

if (!isset($_SESSION['id_membre'])) {
    header('Location: login.php');
    exit;
}
