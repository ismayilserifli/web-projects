<?php
$serveradi = "localhost";
$adi = "root";
$sifre = "";
$dbadi = "course";

$conn = new mysqli($serveradi, $adi, $sifre, $dbadi);
$conn->set_charset("utf8");

// Müəllimləri al
$muellimQuery = $conn->query("SELECT * FROM arxiv_muellimler ORDER BY silinme_tarixi DESC");

// Tələbələri al
$telebeQuery = $conn->query("SELECT * FROM arxiv_telebeler ORDER BY silinme_tarixi DESC");
?>

<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <title>Arxiv</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f9f9f9;
            padding: 0px;
            margin:0px;
        }
        h2 {
            color: while;
            margin-top: 40px;
            border-bottom: 2px solid #004080;
            padding-bottom: 5px;
        }
        .box {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
        }
        .label {
            font-weight: bold;
            display: inline-block;
            width: 140px;
        }
        .header {
            background-color: #004080;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h2 {
            margin: 0;
        }
        .nav-buttons a {
            text-decoration: none;
            background-color: white;
            color: #004080;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
            margin-left: 10px;
        }
        .nav-buttons a:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>

<div class="header">
    <h2>Arxiv Panel</h2>
    <div class="nav-buttons">
        <a href="index.php">Əsas Səhifə</a>
        <a href="Adminpanel.php">Admin Panel</a>
    </div>
</div>

<h2>📁 Arxivə Atılmış Müəllimlər</h2>
<?php if ($muellimQuery->num_rows > 0): ?>
    <?php while($row = $muellimQuery->fetch_assoc()): ?>
        <div class="box">
            <div><span class="label">Ad Soyad:</span> <?php echo $row['ad'] . " " . $row['soyad']; ?></div>
            <div><span class="label">Ata adı:</span> <?php echo $row['ataadi']; ?></div>
            <div><span class="label">Finkod:</span> <?php echo $row['finkod']; ?></div>
            <div><span class="label">Nömrə:</span> <?php echo $row['nomre']; ?></div>
            <div><span class="label">Tədris:</span> <?php echo $row['tedris']; ?></div>
            <div><span class="label">Dil:</span> <?php echo $row['dil']; ?></div>
            <div><span class="label">Silinmə tarixi:</span> <?php echo $row['silinme_tarixi']; ?></div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>Heç bir müəllim arxivə atılmayıb.</p>
<?php endif; ?>

<h2>📚 Arxivə Atılmış Tələbələr</h2>
<?php if ($telebeQuery->num_rows > 0): ?>
    <?php while($row = $telebeQuery->fetch_assoc()): ?>
        <div class="box">
            <div><span class="label">Ad Soyad:</span> <?php echo $row['ad'] . " " . $row['soyad']; ?></div>
            <div><span class="label">Ata adı:</span> <?php echo $row['ataadi']; ?></div>
            <div><span class="label">Finkod:</span> <?php echo $row['finkod']; ?></div>
            <div><span class="label">Nömrə:</span> <?php echo $row['nomre']; ?></div>
            <div><span class="label">Tədris:</span> <?php echo $row['tedris']; ?></div>
            <div><span class="label">Dil:</span> <?php echo $row['dil']; ?></div>
            <div><span class="label">Müddət:</span> <?php echo $row['ayliqmuddet']; ?> ay</div>
            <div><span class="label">Ödəniş:</span> <?php echo $row['ayliqodenis']; ?> AZN</div>
            <div><span class="label">Müəllim adı:</span> <?php echo $row['muellim']; ?></div>
            <div><span class="label">Silinmə tarixi:</span> <?php echo $row['silinme_tarixi']; ?></div>
        </div>
    <?php endwhile; ?>
<?php else: ?>
    <p>Heç bir tələbə arxivə atılmayıb.</p>
<?php endif; ?>

</body>
</html>
