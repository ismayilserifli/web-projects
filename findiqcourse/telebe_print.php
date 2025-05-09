<?php
$serveradi = "localhost";
$adi = "root";
$sifre = "";
$dbadi = "course";

$conn = new mysqli($serveradi, $adi, $sifre, $dbadi);

$telebe_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$telebe = [];
if ($telebe_id > 0) {
    $result = $conn->query("SELECT * FROM telebeler WHERE id = $telebe_id");
    $telebe = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <title><?php echo $telebe['ad'] . " " . $telebe['soyad']; ?> - Çap səhifəsi</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }
    </style>
    <script>
    window.onload = function() {
        window.print();
    }
    </script>
</head>
<body>

<h1>Telebe Məlumatları</h1>
<p><strong>Ad:</strong> <?php echo $telebe['ad']; ?></p>
<p><strong>Soyad:</strong> <?php echo $telebe['soyad']; ?></p>
<p><strong>Ata adı:</strong> <?php echo $telebe['ataadi']; ?></p>
<p><strong>Finkod:</strong> <?php echo $telebe['finkod']; ?></p>
<p><strong>Nomre:</strong> <?php echo $telebe['nomre']; ?></p>
<p><strong>Tədris:</strong> <?php echo $telebe['tedris']; ?></p>
<p><strong>Dil:</strong> <?php echo $telebe['dil']; ?></p>
<p><strong>Aylıq ödəniş:</strong> <?php echo $telebe['ayliqodenis']; ?> AZN</p>
<p><strong>Qeydiyyat müddəti:</strong> <?php echo $telebe['ayliqmuddet']; ?> ay</p>
<p><strong>Qeydiyyat tarixi:</strong> <?php echo date('d.m.Y', strtotime($telebe['ayliqmuddet'])); ?></p>
<p><strong>Günlər:</strong> <?php echo $telebe['gunler']; ?> günlər</p>

</body>
</html>
