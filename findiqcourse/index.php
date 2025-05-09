<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <title>FindIQ - Tələbə Paneli</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #e5e8f1;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .header {
            background-color: #0052cc;
            color: white;
            padding: 30px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header h2 {
            margin: 0;
            font-size: 28px;
        }

        .nav-buttons {
            display: flex;
            gap: 20px;
        }

        .nav-buttons a {
            text-decoration: none;
            background-color: #ffffff;
            color: #0052cc;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: bold;
            transition: 0.3s ease-in-out;
            font-size: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .nav-buttons a:hover {
            background-color: #b3d1ff;
            color: #0041b3;
            transform: scale(1.05);
        }

        .container {
            padding: 40px;
            max-width: 1200px;
            margin: auto;
        }

        .info-box {
            background: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .info-box:hover {
            background-color: #f1f1f1;
            transform: translateY(-8px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .info-box img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .students {
            display: none;
            margin-left: 30px;
            flex-direction: column;
        }

        .students a {
            text-decoration: none;
            color: #333;
            background: #f2f8ff;
            padding: 12px 20px;
            margin-top: 10px;
            border-radius: 6px;
            transition: 0.2s ease;
            font-size: 16px;
        }

        .students a:hover {
            background-color: #d0e7ff;
            color: #0052cc;
            transform: scale(1.05);
        }

    </style>
</head>
<body>

<div class="header">
    <h2>FindIQ Kurs Məlumat Sistemi</h2>
    <div class="nav-buttons">
        <a href="muellimregs.php">👩‍🏫 Müəllim Qeydiyyatı</a>
        <a href="teleberegs.php">👨‍🎓 Tələbə Qeydiyyatı</a>
        <a href="adminregs.php">👤Admin Panel</a>
    </div>
</div>

<div class="container">
    <?php
    $serveradi = "localhost";
    $adi = "root";
    $sifre = "";
    $dbadi = "course";

    $conn = new mysqli($serveradi, $adi, $sifre, $dbadi);
    $sql = "SELECT * FROM telebeler ORDER BY muellim";
    $result = $conn->query($sql);

    $muellimler = [];

    while($row = $result->fetch_assoc()) {
        $muellim = $row['muellim'];
        $telebeId = $row['id'];
        $telebeAdSoyad = $row['ad'] . " " . $row['soyad'];

        if (!isset($muellimler[$muellim])) {
            $muellimler[$muellim] = [];
        }

        $muellimler[$muellim][] = ['id' => $telebeId, 'adsoyad' => $telebeAdSoyad];
    }

    foreach($muellimler as $muellim => $telebeler): ?>
        <div class="info-box" onclick="toggle('<?php echo md5($muellim); ?>')">
            👨‍🏫 <?php echo htmlspecialchars($muellim); ?> Müəllim
        </div>
        <div id="s_<?php echo md5($muellim); ?>" class="students">
            <?php foreach($telebeler as $telebe): ?>
                <a href="student_view.php?id=<?php echo $telebe['id']; ?>">
                    📘 <?php echo htmlspecialchars($telebe['adsoyad']); ?>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>

<script>
function toggle(id) {
    const el = document.getElementById('s_' + id);
    el.style.display = el.style.display === 'flex' ? 'none' : 'flex';
}
</script>

</body>
</html>
