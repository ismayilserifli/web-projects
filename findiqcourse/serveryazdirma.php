<?php  
$serveradi = "localhost";
$adi = "root";
$sifre = "";
$dbadi = "course";

$conn new mysqli($serveradi,$adi,$sifre,$dbadi);

if (isset($_POST['add'])) {
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $ataadi = $_POST['ataadi'];
    $fin = $_POST['fin'];
    $nomre = $_POST['nomre'];
    $fenn = $_POST['fenn'];
    $dil = $_POST['dil'];

    $stmt = $conn->prepare("INSERT INTO users (name, surname) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $surname);
    $stmt->execute();
}
?>