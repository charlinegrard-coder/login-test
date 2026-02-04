<?php
session_start();
require 'connexion_bdd.php'; // ton PDO

if (empty($_POST['pseudo']) || empty($_POST['password'])) {
    die("Champs manquants");
}

$pseudo = trim($_POST['pseudo']);
$password = $_POST['password'];


if (empty($_POST['pseudo']) || empty($_POST['password'])) {
    die("Champs manquants");
}

$pseudo = trim($_POST['pseudo']);
$password = $_POST['password'];

$sql = "SELECT * FROM membre WHERE pseudo = :pseudo";
$stmt = $pdo->prepare($sql);
$stmt->execute(['pseudo' => $pseudo]);
$membre = $stmt->fetch();


if ($membre && password_verify($password, $membre['password'])) {

    $_SESSION['id_membre'] = $membre['id_membre'];
    $_SESSION['pseudo'] = $membre['pseudo'];
    $_SESSION['statut'] = $membre['statut'];

    // Redirection selon le statut
    if ($membre['statut'] === 'admin') {
        header('Location: admin/index.php');
    } elseif ($membre['statut'] === 'moderateur') {
        header('Location: moderation/index.php');
    } else {
        header('Location: index.php');
    }
    exit;

} else {
    echo "Pseudo ou mot de passe incorrect";
}

<?php
session_start();

if (!isset($_SESSION['id_membre'])) {
    header('Location: login.php');
    exit;
}
