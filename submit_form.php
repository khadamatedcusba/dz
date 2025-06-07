<?php
// Connexion à la base de données
$host = 'localhost';
$db = 'social';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}

// Récupération des données
$fullname = $_POST['fullname'];
$workplace = $_POST['workplace'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$children = $_POST['children'];
$notes = $_POST['notes'];

// Insertion dans la base
$sql = "INSERT INTO inscriptions (fullname, workplace, phone, email, children, notes)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssis", $fullname, $workplace, $phone, $email, $children, $notes);

if ($stmt->execute()) {
    echo "تم إرسال الاستمارة بنجاح!";
} else {
    echo "خطأ: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
