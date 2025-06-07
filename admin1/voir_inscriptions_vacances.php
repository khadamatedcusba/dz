<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
?>

<?php
// Connexion base de données
$host = 'localhost';
$db   = 'social';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Requête pour récupérer les inscriptions
$stmt = $pdo->query("SELECT matricule, nom, prenom, email, date_naissance, lieu_naissance, adresse FROM vacances ORDER BY id DESC");
$inscriptions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<meta charset="UTF-8">
<title>Liste des Inscriptions</title>
<style>
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #ddd; padding: 8px; }
    th { background-color: #f2f2f2; }
</style>
</head>
<body>
<!-- Bouton de filtre stylisé -->
<!-- Bouton centré avec lien vers filtrage.php -->
<div class="d-flex justify-content-center mb-3" style="direction: rtl;">
    <a href="filtrage.php" class="btn btn-primary shadow rounded-pill px-4 py-2 fs-5">
        🔍 تصفية الطلبات
    </a>
</div>

<!-- Titre principal -->
<h2 class="mb-4" style="text-align: right; direction: rtl; font-size: 1.8rem;">
    📋 قائمة التسجيلات
</h2>

<?php if (count($inscriptions) > 0): ?>
    <table class="table table-bordered table-hover shadow-sm" style="direction: rtl; text-align: right; font-size: 1.1rem;">
        <thead class="table-light">
            <tr>
                <th>رقم التسجيل</th>
                <th>اللقب</th>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>تاريخ الميلاد</th>
                <th>مكان الميلاد</th>
                <th>العنوان</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inscriptions as $inscription): ?>
                <tr>
                    <td><?= htmlspecialchars($inscription['matricule']) ?></td>
                    <td><?= htmlspecialchars($inscription['nom']) ?></td>
                    <td><?= htmlspecialchars($inscription['prenom']) ?></td>
                    <td><?= htmlspecialchars($inscription['email']) ?></td>
                    <td><?= htmlspecialchars($inscription['date_naissance']) ?></td>
                    <td><?= htmlspecialchars($inscription['lieu_naissance']) ?></td>
                    <td><?= htmlspecialchars($inscription['adresse']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p style="text-align: right; font-size: 1.1rem;">لا توجد تسجيلات حاليا.</p>
<?php endif; ?>
</body>
</html>
