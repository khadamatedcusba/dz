<?php
session_start();
if (!isset($_SESSION['success_message'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <!-- Même en-tête que index.php -->
</head>
<body>
    <!-- Même header/nav que index.php -->
    
    <div class="confirmation-container">
        <h2>تمت العملية بنجاح</h2>
        <p><?php echo htmlspecialchars($_SESSION['success_message']); ?></p>
        <a href="index.php" class="btn">العودة إلى الصفحة الرئيسية</a>
    </div>

    <?php unset($_SESSION['success_message']); ?>
</body>
</html>