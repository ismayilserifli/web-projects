<?php
session_start();

$mevcut_sifre = trim(file_get_contents("sifre.txt")); // Mövcud şifrə fayldan oxunur
$mesaj = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sifre = $_POST["sifre"];
    $yenisifre = $_POST["yenisifre"];
    $yenisifre2 = $_POST["yenisifre2"];

    // Əvvəlki şifrə doğrudursa
    if ($sifre === $mevcut_sifre) {
        // Yeni şifrələr eyni olmalıdır
        if ($yenisifre === $yenisifre2) {
            file_put_contents("sifre.txt", $yenisifre);
            $mesaj = "✅ Şifrə uğurla dəyişdirildi!";
        } else {
            $mesaj = "❌ Yeni şifrələr uyğun gəlmir!";
        }
    } else {
        $mesaj = "❌ Köhnə şifrə yanlışdır!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Şifrə Dəyiş</title>
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
        .alert-custom {
            margin-bottom: 20px;
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
        <h3 class="mb-4 text-center">Şifrəni Dəyiş</h3>

        <?php if (!empty($mesaj)): ?>
            <div class="alert alert-info alert-custom">
                <?php echo $mesaj; ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="sifre" class="form-label">Köhnə Şifrə:</label>
                <input id="sifre" name="sifre" type="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="yenisifre" class="form-label">Yeni Şifrə:</label>
                <input id="yenisifre" name="yenisifre" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="yenisifre2" class="form-label">Yeni Şifrə (təkrar):</label>
                <input id="yenisifre2" name="yenisifre2" type="text" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Şifrəni Dəyiş</button>
            <div class="footer-link">
                <p><a href="adminpanel.php">Əsas Səhifəyə Qayıt</a></p>
            </div>
        </form>
    </div>
</body>
</html>
