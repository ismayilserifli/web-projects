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
    <title><?php echo $telebe['ad'] . " " . $telebe['soyad']; ?> - Məlumat və Davamiyyət</title>
    <style>
       #attendanceList .attendance-columns {
            column-count: 5;
            column-gap: 4px;
        }

        #attendanceList .attendance-columns p {
            break-inside: avoid;
            margin: 0 0 6px 0;
            border:1px solid #f1f1f1;
            padding:5px 0;
        }
        body {
            margin: 0;
            font-family: Arial;
            background-color: #f5f8fa;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .left {
            width: 35%;
            background: white;
            padding: 30px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .left h2 {
            margin-top: 0;
            color: #333;
        }
        .left p {
            margin: 15px 0;
            font-size: 16px;
        }
        .right {
            width: 65%;
            padding: 30px;
        }
        .calendar-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
        }
        .calendar-grid div {
            background: #e4e4e4;
            padding: 15px;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
        }
        .calendar-grid .present {
            background-color: green;
            color: white;
        }
        .arrow {
            cursor: pointer;
            font-size: 20px;
        }
        .back-link {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .pdf{
            margin:0;
            display: inline-block;
        }
        #printButton {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
          }

          /* Çap zamanı bu stildə olanları gizlət */
          @media print {
            #printButton {
              display: none;
            }
            @page {
                margin: 0;
              }
            .back-link{
                display: none;
            }
          }
    </style>
</head>
<body>

<div class="container">
    <div class="left">
        <h2><?php echo $telebe['ad'] . " " . $telebe['soyad']; ?></h2>
        <p><strong>Ata adı:</strong> <?php echo $telebe['ataadi']; ?></p>
        <p><strong>Finkod:</strong> <?php echo $telebe['finkod']; ?></p>
        <p><strong>Nömrə:</strong> <?php echo $telebe['nomre']; ?></p>
        <p><strong>Tədris:</strong> <?php echo $telebe['tedris']; ?></p>
        <p><strong>Dil:</strong> <?php echo $telebe['dil']; ?></p>
        <p><strong>Aylıq ödəniş:</strong> <?php echo $telebe['ayliqodenis']; ?> AZN</p>
        <p><strong>Qeydiyyat müddəti:</strong> <?php echo $telebe['ayliqmuddet']; ?> ay</p>
        <p><strong>Qeydiyyat tarixi:</strong> <?php echo date('d.m.Y', strtotime($telebe['ayliqmuddet'])); ?></p>
        <p><strong>Gələcəyi günlər:</strong> <?php echo $telebe['gunler']; ?>günler</p>


        <a class="back-link" href="index.php">← Geri qayıt</a>
    </div>
    <div class="right">
        <div class="calendar-header">
            <span class="arrow" onclick="changeMonth(-1)">←</span>
            <h3 id="monthYearText"></h3>
            <span class="arrow" onclick="changeMonth(1)">→</span>
        </div>
        <div id="calendarGrid" class="calendar-grid"></div>
        <button onclick="submitAttendance()" style="margin-top: 20px; padding: 10px 15px; background: green; color: white; border: none; border-radius: 5px; cursor: pointer;">
            ✅ Təsdiq et
        </button>
    </div>
    <div class="pdf">
        <button id="printButton" onclick="fetchAndPrint()" style="right: 20px; bottom:50px; padding: 10px 5px; background:#f0f3f4 ; color: black; border:2px solid #d0d3d4; border-radius: 5px; cursor: pointer; position: absolute;">Çap et</button>
    </div>
</div>
<div id="attendanceList" style="margin-top:20px;"></div>


<script>
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
let telebeId = <?php echo $telebe_id; ?>;
let attendanceData = [];      // Artıq bazadakılar
let selectedDates = [];       // Yeni seçilənlər

// 1. Təqvimi göstər
function renderCalendar() {
    const calendarGrid = document.getElementById("calendarGrid");
    const monthName = ["Yanvar","Fevral","Mart","Aprel","May","İyun","İyul","Avqust","Sentyabr","Oktyabr","Noyabr","Dekabr"];
    document.getElementById("monthYearText").innerText = `${monthName[currentMonth]} ${currentYear}`;

    calendarGrid.innerHTML = "";

    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    for (let day = 1; day <= daysInMonth; day++) {
        const dayStr = String(day).padStart(2, '0');
        const monthStr = String(currentMonth + 1).padStart(2, '0');
        const dateKey = `${currentYear}-${monthStr}-${dayStr}`;

        const div = document.createElement("div");
        div.innerText = day;

        if (attendanceData.includes(dateKey)) {
            div.classList.add("present");
        }
        if (selectedDates.includes(dateKey)) {
            div.classList.add("present");
        }

        div.onclick = () => toggleAttendance(dateKey);
        calendarGrid.appendChild(div);
    }
}


// 2. Günə klik etdikdə yadda saxla
function toggleAttendance(date) {
    if (attendanceData.includes(date)) {
        // Əgər artıq bazada varsa, silmək istəyir
        if (confirm(`${date} tarixini silmək istəyirsiniz?`)) {
            fetch('delete_attendance.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: `telebe_id=${telebeId}&date=${date}`
            }).then(res => {
                if (res.ok) {
                    attendanceData = attendanceData.filter(d => d !== date);
                    renderCalendar();
                } else {
                    alert('Silinmə zamanı xəta baş verdi.');
                }
            });
        }
    } else if (selectedDates.includes(date)) {
        // Əgər yeni seçilənlər siyahısındadırsa, ləğv et
        selectedDates = selectedDates.filter(d => d !== date);
        renderCalendar();
    } else {
        // Əks halda yeni seçim kimi əlavə et
        selectedDates.push(date);
        renderCalendar();
    }
}

// 3. Təsdiq et düyməsi
function submitAttendance() {
    if (selectedDates.length === 0) {
        alert("Zəhmət olmasa heç olmasa bir tarix seçin.");
        return;
    }

    fetch('add_attendance.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: `telebe_id=${telebeId}&dates=${JSON.stringify(selectedDates)}`
    }).then(res => {
        alert("Uğurla yadda saxlanıldı!");
        selectedDates = [];
        fetchAttendance();
    });
}

// 4. Bazadakı gələn günləri al
function fetchAttendance() {
    fetch(`get_attendance.php?id=${telebeId}`)
        .then(res => res.json())
        .then(data => {
            attendanceData = data;
            renderCalendar();
        });
}


// Ay dəyişdikdə
function changeMonth(step) {
    currentMonth += step;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    } else if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    renderCalendar();
}
function fetchAndPrint() {
    fetch(`get_attendance.php?id=${telebeId}`)
        .then(res => res.json())
        .then(data => {
            const calendarArea = document.querySelector('.right');
            calendarArea.innerHTML = ''; // Sağ tərəfi təmizlə

            const attendanceList = document.createElement('div');
            attendanceList.id = 'attendanceList';
            attendanceList.innerHTML = `
                <div style="font-weight:bold; font-size:18px; margin-bottom:10px;">Davamiyyət:</div>
                <div class="attendance-columns">
                    ${data.map(date => `<p>${date}</p>`).join('')}
                </div>
            `;
            calendarArea.appendChild(attendanceList);

            window.print(); // Çap et

            // Çapdan sonra səhifəni yenilə
            location.reload();
        });
}



// İlk dəfə göstər
renderCalendar();
fetchAttendance();
</script>


</body>
</html>
