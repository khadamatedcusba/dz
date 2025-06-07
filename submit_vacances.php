<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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

// Fonctions utilitaires
function post($key) {
    return $_POST[$key] ?? null;
}

function toDate($dateStr) {
    $parts = explode('/', $dateStr);
    return (count($parts) === 3) ? "{$parts[2]}-{$parts[1]}-{$parts[0]}" : null;
}

// Insertion en base de données
// Vérifier si le matricule existe déjà
$check = $pdo->prepare("SELECT COUNT(*) FROM vacances WHERE matricule = :matricule");
$check->execute([':matricule' => post('matricule')]);
$count = $check->fetchColumn();

if ($count > 0) {
    echo "<h3 style='color:red;'>❌  (matricule) خطأ لقد تم تسجيل هذا  الرقم التسلسلي</h3>";
    exit;
}

// Insertion en base de données
$insert = $pdo->prepare("INSERT INTO vacances (
    matricule, email, nom, nom_original, prenom, date_naissance, lieu_naissance, adresse,
    fonction, lieu_travail, telephone, compte_bancaire, categorie,
    periode_enseignement, destination,
    accompagnant1_nom, accompagnant1_naissance, accompagnant1_lien, accompagnant1_notes,
    accompagnant2_nom, accompagnant2_naissance, accompagnant2_lien, accompagnant2_notes,
    accompagnant3_nom, accompagnant3_naissance, accompagnant3_lien, accompagnant3_notes,
    accompagnant4_nom, accompagnant4_naissance, accompagnant4_lien, accompagnant4_notes
) VALUES (
    :matricule, :email, :nom, :nom_original, :prenom, :date_naissance, :lieu_naissance, :adresse,
    :fonction, :lieu_travail, :telephone, :compte_bancaire, :categorie,
    :periode_enseignement, :destination,
    :a1_nom, :a1_naissance, :a1_lien, :a1_notes,
    :a2_nom, :a2_naissance, :a2_lien, :a2_notes,
    :a3_nom, :a3_naissance, :a3_lien, :a3_notes,
    :a4_nom, :a4_naissance, :a4_lien, :a4_notes
)");

$insert->execute([
    ':matricule' => post('matricule'),
    ':email' => post('email'),
    ':nom' => post('nom'),
    ':nom_original' => post('nom_original'),
    ':prenom' => post('prenom'),
    ':date_naissance' => toDate(post('date_naissance')),
    ':lieu_naissance' => post('lieu_naissance'),
    ':adresse' => post('adresse'),
    ':fonction' => post('fonction'),
    ':lieu_travail' => post('lieu_travail'),
    ':telephone' => post('telephone'),
    ':compte_bancaire' => post('compte_bancaire'),
    ':categorie' => post('categorie'),
    ':periode_enseignement' => post('periode_enseignement'),
    ':destination' => post('destination'),
    ':a1_nom' => post('accompagnant1_nom'),
    ':a1_naissance' => toDate(post('accompagnant1_naissance')),
    ':a1_lien' => post('accompagnant1_lien'),
    ':a1_notes' => post('accompagnant1_notes'),
    ':a2_nom' => post('accompagnant2_nom'),
    ':a2_naissance' => toDate(post('accompagnant2_naissance')),
    ':a2_lien' => post('accompagnant2_lien'),
    ':a2_notes' => post('accompagnant2_notes'),
    ':a3_nom' => post('accompagnant3_nom'),
    ':a3_naissance' => toDate(post('accompagnant3_naissance')),
    ':a3_lien' => post('accompagnant3_lien'),
    ':a3_notes' => post('accompagnant3_notes'),
    ':a4_nom' => post('accompagnant4_nom'),
    ':a4_naissance' => toDate(post('accompagnant4_naissance')),
    ':a4_lien' => post('accompagnant4_lien'),
    ':a4_notes' => post('accompagnant4_notes'),
]);

echo "<h3>✅ تم إرسال الطلب بنجاح!</h3>";

// Envoi de l'e-mail de confirmation
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'carteat22@gmail.com';            // 🔁 Remplacez ici
        $mail->Password = 'rxkr gnkx fdyo hlbg';         // 🔁 Remplacez ici
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('carteat22@gmail.com', 'Service RH');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = '📩 تأكيد استلام الطلب';
        $mail->Body    = '
            <div dir="rtl" style="font-family:Tahoma;">
                مرحباً،<br><br>
                تم استلام طلب عطلتكم بنجاح.<br>
                سيتم معالجته في أقرب وقت ممكن.<br><br>
                مع خالص التحيات،<br>
          لجنة الخدمات لعمال التربية ولاية  سيدي بلعباس
</div>
        ';

        $mail->send();
        echo "<p>📧 تم إرسال تأكيد بالبريد الإلكتروني إلى : <strong>$email</strong></p>";
    } catch (Exception $e) {
        echo "<p>❌ تعذر إرسال البريد الإلكتروني: {$mail->ErrorInfo}</p>";
    }
}
?>
