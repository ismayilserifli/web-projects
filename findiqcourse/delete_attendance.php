<?php
$serveradi = "localhost";
$adi = "root";
$sifre = "";
$dbadi = "course";

$conn = new mysqli($serveradi, $adi, $sifre, $dbadi);

$telebe_id = isset($_POST['telebe_id']) ? intval($_POST['telebe_id']) : 0;
$date = isset($_POST['date']) ? $_POST['date'] : '';

if ($telebe_id > 0 && !empty($date)) {
    $stmt = $conn->prepare("DELETE FROM attendance WHERE telebe_id = ? AND tarix = ?");
    $stmt->bind_param("is", $telebe_id, $date);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        echo "OK";
    } else {
        http_response_code(400);
        echo "Silmək mümkün olmadı.";
    }
}
?>
