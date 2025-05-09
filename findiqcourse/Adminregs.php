<?php  
if($_POST){
    $sifre = $_POST["sifre"];
    $dogru_sifre = trim(file_get_contents("./sifre.txt")); // Fayldan oxuyur

    if ($sifre === $dogru_sifre) {
        header("Location: adminpanel.php");
        exit;
    } else {
        $error = "Şifrə yanlışdır!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
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
        <?php if (!empty($error)): ?>
            <div class="success-message" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form method="POST">
            <div class="mb-3">
                <label for="sifre" class="form-label">Şifrəni daxil edin:</label>
                <input id="sifre" name="sifre" type="text" class="form-control" required>
            </div>
            <button type="submit" name="add" class="btn btn-primary w-100">Giriş edin</button>
            <div class="footer-link">
                <p><a href="index.php">Əsas Səhifəyə Qayıt</a></p>
            </div>
        </form>
    </div>
</body>
</html>
