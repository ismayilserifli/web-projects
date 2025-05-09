<?php
// update.php

$serveradi = "localhost";
$adi = "root";
$sifre = "";
$dbadi = "course";

$conn = new mysqli($serveradi, $adi, $sifre, $dbadi);
$conn->set_charset("utf8");

// POST-dan gələn məlumatları götürürük
$id = $_POST['id'] ?? null;
$field = $_POST['field'] ?? null;
$value = $_POST['value'] ?? null;
$table = $_POST['table'] ?? null;

if ($id && $field && $value && $table) {
    // SQL Injection təhlükəsinə qarşı sadə qoruma (sən istəsən buranı daha da gücləndirə bilərik)
    $id = intval($id);
    $field = $conn->real_escape_string($field);
    $value = $conn->real_escape_string($value);
    $table = $conn->real_escape_string($table);

    // UPDATE sorğusu
    $sql = "UPDATE `$table` SET `$field`='$value' WHERE `id`=$id";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid";
}
?>