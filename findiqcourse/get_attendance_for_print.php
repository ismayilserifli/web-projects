<?php
$serveradi = "localhost";
$adi = "root";
$sifre = "";
$dbadi = "course";

$conn = new mysqli($serveradi, $adi, $sifre, $dbadi);

$telebe_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$dates = [];

if ($telebe_id > 0) {
    $result = $conn->query("SELECT date FROM attendance WHERE telebe_id = $telebe_id");
    while($row = $result->fetch_assoc()) {
        $dates[] = $row['date'];
    }
}

header('Content-Type: application/json');
echo json_encode($dates);
?>
