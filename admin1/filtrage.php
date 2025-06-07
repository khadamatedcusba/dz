<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

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

$stmt = $pdo->query("
    SELECT *
    FROM vacances
    WHERE matricule NOT IN (SELECT matricule FROM beneficiaires)
    ORDER BY id DESC
");

$inscriptions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تصفية التسجيلات - السحب</title>
    <style>
        .btn-print, .btn-excel, .btn-pdf {
    padding: 10px 20px;
    font-size: 1.1rem;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    transition: background-color 0.3s;
    color: white;
}

.btn-print { background-color: #0d6efd; }
.btn-excel { background-color: #198754; }
.btn-pdf   { background-color: #dc3545; }

.btn-print:hover { background-color: #0b5ed7; }
.btn-excel:hover { background-color: #157347; }
.btn-pdf:hover   { background-color: #c82333; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        h2 {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            font-size: 1.1rem;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: right;
        }
        th {
            background-color: #e9ecef;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        p {
            text-align: center;
            font-size: 1.2rem;
            color: #555;
        }
    </style>
</head>
<body>
<div style="display: flex; justify-content: center; gap: 15px; margin-bottom: 20px;">
    <button onclick="window.print()" class="btn-print">🖨️ طباعة</button>
    <button onclick="exportToExcel('table-inscriptions')" class="btn-excel">📤 تصدير إلى Excel</button>
    <button onclick="exportToPDF()" class="btn-pdf">📄 تصدير إلى PDF</button>
</div>

<h2>🎯 التسجيلات غير المستفيدة بعد</h2>

<?php if (count($inscriptions) > 0): ?>
    <table id="table-inscriptions">
        <thead>
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
            <?php foreach ($inscriptions as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['matricule']) ?></td>
                    <td><?= htmlspecialchars($row['nom']) ?></td>
                    <td><?= htmlspecialchars($row['prenom']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['date_naissance']) ?></td>
                    <td><?= htmlspecialchars($row['lieu_naissance']) ?></td>
                    <td><?= htmlspecialchars($row['adresse']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>لا توجد تسجيلات مؤهلة حالياً.</p>
<?php endif; ?>
<!-- Export Excel -->
<script>
function exportToExcel(tableID) {
    const table = document.getElementById(tableID);
    const html = table.outerHTML;
    const url = 'data:application/vnd.ms-excel,' + encodeURIComponent(html);

    const a = document.createElement('a');
    a.href = url;
    a.download = 'التسجيلات.xls';
    a.click();
}
</script>

<!-- Export PDF avec jsPDF et html2canvas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
async function exportToPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('p', 'pt', 'a4');
    const table = document.getElementById('table-inscriptions');

    await html2canvas(table, { scale: 2 }).then((canvas) => {
        const imgData = canvas.toDataURL('image/png');
        const imgProps = doc.getImageProperties(imgData);
        const pdfWidth = doc.internal.pageSize.getWidth();
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

        doc.addImage(imgData, 'PNG', 20, 20, pdfWidth - 40, pdfHeight);
        doc.save("التسجيلات.pdf");
    });
}
</script>

</body>
</html>
