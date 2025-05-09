<?php
$serveradi = "localhost";
$adi = "root";
$sifre = "";
$dbadi = "course";

$conn = new mysqli($serveradi, $adi, $sifre, $dbadi);

if (isset($_POST['telebe_id']) && isset($_POST['dates'])) {
    $telebe_id = intval($_POST['telebe_id']);
    $dates = json_decode($_POST['dates'], true);

    // 1. Əvvəlcə həmin tələbəyə aid köhnə tarixləri sil
    foreach ($dates as $tarix) {
        $check = $conn->query("SELECT id FROM attendance WHERE telebe_id = $telebe_id AND tarix = '$tarix'");
        if ($check->num_rows == 0) {
            // Əgər yoxdursa, əlavə et
            $stmt = $conn->prepare("INSERT INTO attendance (telebe_id, tarix) VALUES (?, ?)");
            $stmt->bind_param("is", $telebe_id, $tarix);
            $stmt->execute();
        }
    }
}
?>
