<?php
$serveradi = "localhost";
$adi = "root";
$sifre = "";
$dbadi = "course";

$conn = new mysqli($serveradi, $adi, $sifre, $dbadi);
$telebe_id = intval($_GET['id']);
$data = [];

$result = $conn->query("SELECT tarix FROM attendance WHERE telebe_id = $telebe_id");
while ($row = $result->fetch_assoc()) {
    $data[] = $row['tarix'];
}
echo json_encode($data);
?>
