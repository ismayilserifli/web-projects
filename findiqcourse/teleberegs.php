<?php  
$serveradi = "localhost";
$adi = "root";
$sifre = "";
$dbadi = "course";

$conn = new mysqli($serveradi, $adi, $sifre, $dbadi);

$qeydiyyat_ugurlu = false;

if ($conn->connect_error) {
    die("Bağlantı xətası: " . $conn->connect_error);
}

// Müəllimlər cədvəlindən ad və soyadı götür
$muellimler_query = "SELECT id, ad, soyad FROM muellimler";
$muellimler_result = $conn->query($muellimler_query);


if (isset($_POST['add'])) {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $ataadi = $_POST['ataadi'];
    $fin = $_POST['fin'];
    $nomre = $_POST['nomre'];
    $fenn = $_POST['fenn'];
    $dil = $_POST['dil'];
    $muddet = $_POST['muddet'];
    $muellim = $_POST['muellim'];
    $odenis = $_POST['odenis'];
    $gunler = [];
    for ($i = 1; $i <= 7; $i++) {
        if (isset($_POST['gun' . $i])) {
            $gunler[] = $i;
        }
    }
$gunler = implode(",", $gunler);

    $stmt = $conn->prepare("INSERT INTO telebeler (ad, soyad, ataadi, finkod, nomre, tedris, dil, ayliqmuddet, ayliqodenis, muellim, gunler) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssssss", $ad, $soyad, $ataadi, $fin, $nomre, $fenn, $dil, $muddet, $odenis, $muellim, $gunler);

    if ($stmt->execute()) {
        $qeydiyyat_ugurlu = true; // Əgər əlavə olunarsa true olur
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tələbə Qeydiyyatı</title>
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
        <h1>Tələbə Qeydiyyatı:</h1>

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
                <label>Ad:</label>
                <input name="ad" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Soyad:</label>
                <input name="soyad" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Ata adı:</label>
                <input name="ataadi" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Fin kodu:</label>
                <input name="fin" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Əlaqə nömrəsi:</label>
                <input name="nomre" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Tədris Fənni:</label>
                <input name="fenn" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Dil:</label>
                <input name="dil" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Aylıq müddət:</label>
                <input name="muddet" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Müəllim:</label>
                <select name="muellim" class="form-control" required>
                    <option value="">Müəllim seçin</option>
                    <?php  
                    if ($muellimler_result->num_rows > 0) {
                        while ($row = $muellimler_result->fetch_assoc()) {
                            echo "<option value='" . $row['ad'] . "'>" . $row['ad'] . " " . $row['soyad'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Müəllim tapılmadı</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Aylıq ödəniş:</label>
                <input name="odenis" type="text" class="form-control" required>
            </div>
           <div class="mb-3">
            <label>Dərs günləri:</label><br>
                <?php for ($i = 1; $i <= 7; $i++): ?>
                    <label for="gun<?php echo $i; ?>"><?php echo $i; ?></label>
                    <input type="checkbox" id="gun<?php echo $i; ?>" name="gun<?php echo $i; ?>" value="1">
                <?php endfor; ?>
            </div>
            <button type="submit" name="add" class="btn btn-primary w-100">Əlavə et</button>
            <div class="footer-link">
            <p><a href="index.php">Əsas Səhifəyə Qayıt</a></p>
        </div>
        </form>
    </div>
</body>
</html>
