<?php
session_start();

// Si l'utilisateur est déjà connecté, rediriger
if (isset($_SESSION['user'])) {
    header('Location: voir_inscriptions_vacances.php');
    exit;
}

// Vérifier les identifiants lors de la soumission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Identifiants valides (à adapter ou à vérifier en BDD)
    $valid_username = 'admin';
    $valid_password = '12345';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['user'] = $username;
        header('Location: voir_inscriptions_vacances.php');
        exit;
    } else {
        $error = "Identifiants invalides !";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Connexion</title>
</head>
<body>
    <h2>🔐 Connexion</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <label>Nom d'utilisateur : <input type="text" name="username" required></label><br>
        <label>Mot de passe : <input type="password" name="password" required></label><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
