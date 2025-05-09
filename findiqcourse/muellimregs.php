<?php  
$serveradi = "localhost";
$adi = "root";
$sifre = "";
$dbadi = "course";

$conn = new mysqli($serveradi, $adi, $sifre, $dbadi);

$qeydiyyat_ugurlu = false; // Uğur statusu üçün dəyişən

if (isset($_POST['add'])) {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $ataadi = $_POST['ataadi'];
    $fin = $_POST['fin'];
    $nomre = $_POST['nomre'];
    $fenn = $_POST['fenn'];
    $dil = $_POST['dil'];

    $stmt = $conn->prepare("INSERT INTO muellimler (ad,soyad,ataadi,finkod,nomre,tedris,dil) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $ad, $soyad, $ataadi, $fin, $nomre, $fenn, $dil);

    if ($stmt->execute()) {
        $qeydiyyat_ugurlu = true; // Əgər əlavə olunarsa true olur
    }
}
?>
<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Müəllim Qeydiyyatı</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .footer-link {
            text-align: center;
            margin-top: 20px;
        }
        .footer-link a {
            color: #0069d9;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Müəllim Qeydiyyatı</h1>

        <?php if ($qeydiyyat_ugurlu): ?>
            <div class="success-message">Qeydiyyat uğurla tamamlandı!</div>
            <script>
                setTimeout(function() {
                    window.location.href = "index.php"; // Əsas səhifəyə yönləndirir
                }, 3000);
            </script>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="ad" class="form-label">Ad:</label>
                <input id="ad" name="ad" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="soyad" class="form-label">Soyad:</label>
                <input id="soyad" name="soyad" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="ataadi" class="form-label">Ata adı:</label>
                <input id="ataadi" name="ataadi" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fin" class="form-label">Fin kodu:</label>
                <input id="fin" name="fin" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nomre" class="form-label">Əlaqə nömrəsi:</label>
                <input id="nomre" name="nomre" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fenn" class="form-label">Tədris Fənni:</label>
                <input id="fenn" name="fenn" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="dil" class="form-label">Dil:</label>
                <input id="dil" name="dil" type="text" class="form-control" required>
            </div>
            <button type="submit" name="add" class="btn btn-primary w-100">Əlavə et</button>
        </form>

        <div class="footer-link">
            <p><a href="index.php">Əsas Səhifəyə Qayıt</a></p>
        </div>
    </div>
</body>
</html>
