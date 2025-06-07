<?php
session_start();
if (!isset($_SESSION['error_message'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>خطأ في النظام - اللجنة الولائية للخدمات الاجتماعية</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background: #f3f3f3;
      margin: 0;
      padding: 0;
      color: #333;
    }
    .header {
      background: linear-gradient(rgba(0,123,255,0.85), rgba(0,123,255,0.85)), url('logo.jpg') no-repeat center center;
      background-size: contain;
      color: white;
      padding: 30px 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 160px;
      position: relative;
      border-bottom: 4px solid #0056b3;
    }
    .header h1 {
      font-size: 24px;
      margin: 0;
      text-align: center;
      flex: 1;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.6);
    }
    .logo-left, .logo-right {
      height: 80px;
      width: auto;
    }
    nav {
      background-color: #007bff;
      padding: 10px 0;
      text-align: center;
    }
    nav a {
      color: white;
      text-decoration: none;
      margin: 0 10px;
      font-size: 16px;
      padding: 6px 12px;
    }
    .error-container {
      max-width: 600px;
      margin: 30px auto;
      padding: 25px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      text-align: center;
      border-top: 4px solid #dc3545;
    }
    .error-title {
      color: #dc3545;
      font-size: 24px;
      margin-bottom: 15px;
    }
    .error-message {
      font-size: 16px;
      margin-bottom: 25px;
      line-height: 1.6;
    }
    .action-buttons {
      margin-top: 25px;
    }
    .btn {
      display: inline-block;
      padding: 8px 16px;
      border-radius: 4px;
      text-decoration: none;
      margin: 0 8px;
      font-size: 14px;
    }
    .btn-primary {
      background-color: #007bff;
      color: white;
    }
    .btn-secondary {
      background-color: #6c757d;
      color: white;
    }
    footer {
      background-color: #343a40;
      color: white;
      text-align: center;
      padding: 15px 0;
      font-size: 14px;
      margin-top: 40px;
    }
    .contact-info {
      margin-top: 10px;
      font-size: 13px;
    }
  </style>
</head>
<body>
  <header class="header">
    <img src="logo.jpg" alt="Logo" class="logo-left">
    <h1>اللجنة الولائية للخدمات الاجتماعية لعمال التربية - سيدي بلعباس</h1>
    <img src="logo.jpg" alt="Logo" class="logo-right">
  </header>
  
  <nav>
    <a href="index.php">الرئيسية</a>
    <a href="#">من نحن</a>
    <a href="#">الخدمات</a>
    <a href="#">اتصل بنا</a>
  </nav>

  <div class="error-container">
    <h1 class="error-title">حدث خطأ غير متوقع</h1>
    
    <div class="error-message">
      <?php 
      if (isset($_SESSION['error_message'])) {
          echo htmlspecialchars($_SESSION['error_message'], ENT_QUOTES, 'UTF-8');
      } else {
          echo "حدث خطأ أثناء معالجة طلبكم. يرجى المحاولة مرة أخرى أو الاتصال بالدعم الفني.";
      }
      ?>
    </div>
    
    <div class="action-buttons">
      <a href="index.php" class="btn btn-primary">العودة إلى الصفحة الرئيسية</a>
      <a href="javascript:history.back()" class="btn btn-secondary">العودة إلى الصفحة السابقة</a>
    </div>
  </div>

  <footer>
    <div>جميع الحقوق محفوظة &copy; <?php echo date('Y'); ?> - اللجنة الولائية للخدمات الاجتماعية لعمال التربية - سيدي بلعباس</div>
    <div class="contact-info">
      تابعونا على: <a href="https://www.facebook.com" style="color: #fff;">فيسبوك</a> | 
      البريد الإلكتروني: <a href="mailto:support@example.com" style="color: #fff;">support@example.com</a>
    </div>
  </footer>

  <?php unset($_SESSION['error_message']); ?>
</body>
</html>