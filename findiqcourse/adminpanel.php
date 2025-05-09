<?php
$serveradi = "localhost";
$adi = "root";
$sifre = "";
$dbadi = "course";

$conn = new mysqli($serveradi, $adi, $sifre, $dbadi);
$conn->set_charset("utf8");

// Müəllimləri al
$sql = "SELECT * FROM muellimler";
$result = $conn->query($sql);

$muellimler = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $muellimler[] = $row;
    }
}

// Tələbələri al
$sql1 = "SELECT * FROM telebeler";
$result1 = $conn->query($sql1);

$telebeler = [];
if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
        $telebeler[] = $row;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f5f8ff;
            margin: 0;
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
        .container {
            padding: 30px;
        }
        .section-title {
            font-size: 22px;
            margin-top: 30px;
            margin-bottom: 15px;
            border-bottom: 2px solid #004080;
            display: inline-block;
            padding-bottom: 5px;
            color: #004080;
        }
        .box {
            background: white;
            border-radius: 8px;
            margin-bottom: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
        }
        .box-header {
            padding: 15px;
            font-weight: bold;
            cursor: pointer;
            background-color: #e8f0fe;
        }
        .box-content {
            padding: 15px;
            display: none;
            animation: fadeIn 0.3s ease-in-out;
        }
        .label {
            font-weight: bold;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .editable:hover .edit-icon {
            display: inline;
        }
        .edit-icon {
                display: none;
                color: gray;
                margin-left: 5px;
                cursor: pointer;
        }
    </style>
    <script>
        function toggleBox(id) {
            var content = document.getElementById(id);
            if (content.style.display === "none" || content.style.display === "") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    </script>
</head>
<body>

<div class="header">
    <h2>Admin Panel</h2>
    <div class="nav-buttons">
        <a href="index.php">Əsas Səhifə</a>
        <a href="sifredeyis.php">Şifrəni Dəyiş</a>
        <a href="arxiv.php">Arxiv</a>
    </div>
</div>

<div class="container">


    <!-- Müəllimlər -->
    <div class="section-title">👨‍🏫 Müəllimlər</div>
    <?php foreach($muellimler as $index => $muellim): ?>
        <div class="box">
            <div class="box-header" onclick="toggleBox('muellim<?php echo $index; ?>')">
                <?php echo htmlspecialchars($muellim['ad'] . ' ' . $muellim['soyad']); ?>
            </div>
            <div class="box-content" id="muellim<?php echo $index; ?>">
                <div>
                    <span class="label">Adı:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $muellim['id']; ?>', 'ad', 'muellimler')">
                        <?php echo htmlspecialchars($muellim['ad']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Soyadı:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $muellim['id']; ?>', 'soyad', 'muellimler')">
                        <?php echo htmlspecialchars($muellim['soyad']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Ata adı:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $muellim['id']; ?>', 'ataadi', 'muellimler')">
                        <?php echo htmlspecialchars($muellim['ataadi']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Finkod:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $muellim['id']; ?>', 'finkod', 'muellimler')">
                        <?php echo htmlspecialchars($muellim['finkod']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Nömrə:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $muellim['id']; ?>', 'nomre', 'muellimler')">
                        <?php echo htmlspecialchars($muellim['nomre']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Tədris:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $muellim['id']; ?>', 'tedris', 'muellimler')">
                        <?php echo htmlspecialchars($muellim['tedris']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Dil:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $muellim['id']; ?>', 'dil', 'muellimler')">
                        <?php echo htmlspecialchars($muellim['dil']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <button onclick="deleteItem('<?php echo $muellim['id']; ?>', 'muellimler')" style="margin-top: 20px; padding: 10px 15px; background: red; color: white; border: none; border-radius: 5px; cursor: pointer;">
                    🗑️ Sil
                </button>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Tələbələr -->
    <div class="section-title">📘 Tələbələr</div>
    <?php foreach($telebeler as $index => $telebe): ?>
        <div class="box">
            <div class="box-header" onclick="toggleBox('telebe<?php echo $index; ?>')">
                <?php echo htmlspecialchars($telebe['ad'] . ' ' . $telebe['soyad']); ?>
            </div>
            <div class="box-content" id="telebe<?php echo $index; ?>">
                <div>
                    <span class="label">Adı:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $telebe['id']; ?>', 'ad', 'telebeler')">
                        <?php echo htmlspecialchars($telebe['ad']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Soyadı:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $telebe['id']; ?>', 'soyad', 'telebeler')">
                        <?php echo htmlspecialchars($telebe['soyad']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Ata adı:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $telebe['id']; ?>', 'ataadi', 'telebeler')">
                        <?php echo htmlspecialchars($telebe['ataadi']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Finkod:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $telebe['id']; ?>', 'finkod', 'telebeler')">
                        <?php echo htmlspecialchars($telebe['finkod']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Nömrə:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $telebe['id']; ?>', 'nomre', 'telebeler')">
                        <?php echo htmlspecialchars($telebe['nomre']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Tədris:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $telebe['id']; ?>', 'tedris', 'telebeler')">
                        <?php echo htmlspecialchars($telebe['tedris']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Dİl:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $telebe['id']; ?>', 'dil', 'telebeler')">
                        <?php echo htmlspecialchars($telebe['dil']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Aylıq müddət:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $telebe['id']; ?>', 'ayliqmuddet', 'telebeler')">
                        <?php echo htmlspecialchars($telebe['ayliqmuddet']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Aylıq ödəniş:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $telebe['id']; ?>', 'ayliqodenis', 'telebeler')">
                        <?php echo htmlspecialchars($telebe['ayliqodenis']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Müəllim:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $telebe['id']; ?>', 'muellim', 'telebeler')">
                        <?php echo htmlspecialchars($telebe['muellim']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <div>
                    <span class="label">Günlər:</span> 
                    <span class="editable" onclick="makeEditable(this, '<?php echo $telebe['id']; ?>', 'gunler', 'telebeler')">
                        <?php echo htmlspecialchars($telebe['gunler']); ?>
                    </span>
                    <span class="edit-icon">✏️</span>
                </div>
                <button onclick="deleteItem('<?php echo $telebe['id']; ?>', 'telebeler')" style="margin-top: 20px; padding: 10px 15px; background: red; color: white; border: none; border-radius: 5px; cursor: pointer;">
                    🗑️ Sil
                </button>
            </div>
        </div>
    <?php endforeach; ?>
    
    <script>
        function deleteItem(id, table) {
            if (confirm("Silinsin? Bu əməliyyatı geri qaytarmaq mümkün deyil!")) {
                const formData = new FormData();
                formData.append("id", id);
                formData.append("table", table);

                fetch("delete.php", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === "ok") {
                        alert("Uğurla silindi!");
                        location.reload();
                    } else {
                        alert("Silinmə zamanı xəta baş verdi.");
                    }
                });
            }
        }

    function makeEditable(element, id, field, table) {
    var oldValue = element.innerText;
    var input = document.createElement("input");
    input.type = "text";
    input.value = oldValue;
    input.style.width = "10%";

    element.innerHTML = '';
    element.appendChild(input);
    input.focus();

    input.onblur = function() {
        var newValue = this.value;
        if (newValue !== oldValue) {
            var formData = new FormData();
            formData.append('id', id);
            formData.append('field', field);
            formData.append('value', newValue);
            formData.append('table', table);

            fetch('update.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "success") {
                    element.innerText = newValue;
                } else {
                    element.innerText = oldValue;
                    alert("Xəta baş verdi!");
                }
            })
            .catch(error => {
                element.innerText = oldValue;
                alert("Xəta baş verdi!");
            });
        } else {
            element.innerText = oldValue;
        }
    };
}
    </script>
</body>
</html>
