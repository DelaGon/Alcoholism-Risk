<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการค้นหา</title>
    <link rel="stylesheet" href="style.css">  <!-- แก้ไขชื่อไฟล์ css ตรงนี้ -->
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ดึงข้อมูลผลลัพธ์จาก calculation.php
    require 'calculation.php';

    $matchedRows = getSimilarityResults($_POST);

    if ($matchedRows) {
        echo "<h3>Top 3 Matched Records:</h3>";
        for ($i = 0; $i < min(3, count($matchedRows)); $i++) {
            $row = $matchedRows[$i];
            echo "Rank " . ($i + 1) . ": Overall Similarity: " . $row['OverallSimilarity'] . " %<br>";
            echo " - Risk Level: " . $row["Risklevel"] . "<br><br>";
        }
    } else {
        echo "No matching records found.";
    }
}
?>

</body>
</html>
