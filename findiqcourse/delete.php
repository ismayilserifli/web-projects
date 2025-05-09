<?php
$serveradi = "localhost";
$adi = "root";
$sifre = "";
$dbadi = "course";

$conn = new mysqli($serveradi, $adi, $sifre, $dbadi);
$conn->set_charset("utf8");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $table = $_POST['table'];

    if ($table === 'telebeler') {
        // əvvəlcə məlumatı çək
        $data = $conn->query("SELECT * FROM telebeler WHERE id = $id")->fetch_assoc();

        // arxivə əlavə et
        $stmt = $conn->prepare("INSERT INTO arxiv_telebeler (ad, soyad, ataadi, finkod, nomre, tedris, dil, ayliqmuddet, muellim, ayliqodenis, silinme_tarixi)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssssssssss",
            $data['ad'], $data['soyad'], $data['ataadi'], $data['finkod'], $data['nomre'],
            $data['tedris'], $data['dil'], $data['ayliqmuddet'], $data['muellim'], $data['ayliqodenis']
        );
        $stmt->execute();

        // əsas cədvəldən sil
        $conn->query("DELETE FROM telebeler WHERE id = $id");
        echo "ok";

    } elseif ($table === 'muellimler') {
        $data = $conn->query("SELECT * FROM muellimler WHERE id = $id")->fetch_assoc();

        $stmt = $conn->prepare("INSERT INTO arxiv_muellimler (ad, soyad, ataadi, finkod, nomre, tedris, dil, silinme_tarixi)
                                VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssssss",
            $data['ad'], $data['soyad'], $data['ataadi'], $data['finkod'], $data['nomre'],
            $data['tedris'], $data['dil']
        );
        $stmt->execute();

        $conn->query("DELETE FROM muellimler WHERE id = $id");
        echo "ok";

    } else {
        echo "table not found";
    }
}
?>
