<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการค้นหา</title>
    <link rel="stylesheet" href="styledisplay.css"> <!-- แก้ไขชื่อไฟล์ css ตรงนี้ -->
</head>

<body>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ดึงข้อมูลผลลัพธ์จาก calculation.php
    require 'calculation.php';

    $matchedRows = getSimilarityResults($_POST);

    if ($matchedRows) {
        echo "<div class='container'>";
        echo "<h3>บันทึกข้อมูลที่ตรงกัน 3 รายการแรก:</h3>";
        for ($i = 0; $i < min(3, count($matchedRows)); $i++) {
            $row = $matchedRows[$i];
            // เพิ่ม class ตามระดับความเสี่ยง
            $riskClass = ''; // เริ่มต้นเป็นค่าว่าง เพื่อที่จะ ใส่สีแยกระดับ

            if ($row['Risklevel'] == 'ความเสี่ยงต่ำ') {
                $riskClass = 'low-risk';
            } elseif ($row['Risklevel'] == 'ความเสี่ยงปานกลาง') {
                $riskClass = 'moderate-risk';
            } elseif ($row['Risklevel'] == 'ความเสี่ยงสูง') {
                $riskClass = 'high-risk';
            } elseif ($row['Risklevel'] == 'ความเสี่ยงสูงมาก') {
                $riskClass = 'very-high-risk';
            }elseif ($row['Risklevel'] == 'ไม่มีความเสี่ยง') {
                $riskClass = 'no-risk';
            }

            echo "<div class='result $riskClass'>"; // ใส่คลาสที่สร้างจากระดับความเสี่ยง
            echo "<div class='rank'>อันดับ : " . ($i + 1) . "</div>";
            echo "<div class='similarity'>ความคล้ายคลึงโดยรวม: " . $row['OverallSimilarity'] . " %</div>";
            echo "<div class='risk-level'>ระดับความเสี่ยง: " . $row["Risklevel"] . "</div>";
            
            echo "<div class='advice'>";
            if ($row['Risklevel'] == 'ความเสี่ยงต่ำ') {
                echo "<strong>คำแนะนำ:</strong> พัฒนาความรู้เกี่ยวกับการดื่มสุราอย่างมีสติ คำนึงถึงผลกระทบทั้งทางร่างกายและจิตใจ
                หลีกเลี่ยงสถานการณ์ที่อาจทำให้ต้องดื่มสุรา เช่น งานเลี้ยงที่มีการดื่ม
                สื่อสารกับเพื่อนเกี่ยวกับการเลือกไม่ดื่มหรือดื่มอย่างมีสติ";
            } elseif ($row['Risklevel'] == 'ความเสี่ยงปานกลาง') {
                echo "<strong>คำแนะนำ:</strong> สังเกตและบันทึกพฤติกรรมการดื่ม เพื่อให้เห็นแนวโน้มที่อาจเกิดขึ้น
                หาความรู้เกี่ยวกับวิธีการลดหรือหยุดการดื่ม เช่น การตั้งเป้าหมายหรือขีดจำกัด
                หากรู้สึกมีความกดดันจากเพื่อน ให้พิจารณาความสัมพันธ์และสื่อสารความรู้สึกกับคนใกล้ชิด";
            } elseif ($row['Risklevel'] == 'ความเสี่ยงสูง') {
                echo "<strong>คำแนะนำ:</strong> แนะนำให้ปรึกษาผู้เชี่ยวชาญ เช่น นักจิตวิทยาหรือที่ปรึกษา เพื่อพูดคุยเกี่ยวกับความรู้สึกและพฤติกรรมการดื่ม
                สร้างแผนการเปลี่ยนแปลงพฤติกรรม โดยการลดปริมาณการดื่มหรือหยุดการดื่มอย่างถาวร
                มีส่วนร่วมในกลุ่มสนับสนุนหรือกิจกรรมที่ส่งเสริมสุขภาพจิต ของชุมชน ";
            } elseif ($row['Risklevel'] == 'ความเสี่ยงสูงมาก') {
                echo "<strong>คำแนะนำ:</strong> แนะนำให้เข้ารับการบำบัดหรือการรักษาจากผู้เชี่ยวชาญทันที
                สร้างเครือข่ายการสนับสนุนจากครอบครัวและเพื่อน เพื่อลดแรงกดดันและเพิ่มกำลังใจในการเปลี่ยนแปลงพฤติกรรม.";
            } elseif ($row['Risklevel'] == 'ไม่มีความเสี่ยง') {
                echo "<strong>คำแนะนำ:</strong> สร้างความตระหนักรู้เกี่ยวกับผลกระทบของการดื่มสุราให้กับตนเองและเพื่อนฝูง
                ส่งเสริมกิจกรรมที่ไม่เกี่ยวข้องกับการดื่ม เช่น การเข้าร่วมกิจกรรมกีฬา งานอาสาสมัคร หรือชมรมต่าง ๆ
                สนับสนุนให้ใช้เวลาว่างให้เกิดประโยชน์ เช่น การอ่านหนังสือ การเรียนรู้ทักษะใหม่ ๆ";
            }
            echo "</div>"; // ปิด div class advice
            
            echo "</div>"; // ปิด div class result
        }
        
        echo "</div>"; // ปิด div class container
    } else {
        echo "<div class='no-result'>ไม่พบข้อมูลที่ตรงกันค่ะ.</div>";
    }
    
}
?>


</body>

</html>