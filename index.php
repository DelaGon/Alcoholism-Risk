<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant Data Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>ระบบวิเคราะห์ความเสี่ยงโรคติดสุรา ของ นักเรียนชั้นมัธยมศึกษาตอนปลาย</h2>
    <h1>“รู้ทันความเสี่ยง:
    ตรวจสอบสุขภาพของคุณเกี่ยวกับการดื่มสุรา”<br>
เข้าร่วมการวิเคราะห์ความเสี่ยงโรคติดสุรา เพื่อให้คุณทราบเกี่ยวกับสุขภาพของตนเอง
และลดความเสี่ยงในการติดสุรา
<br><br><br>
การทำแบบประเมินนี้ เป็นการคัดกรองขั้นตอนแรก ในการให้คำแนะนำ เพื่อลดความเสี่ยงจากการดื่มสุรา </h1>
    
    <form action="display.php" method="post">
    <label for="alcohol_consumption">1.ปริมาณการดื่มเหล้าต่อวัน</label>
    <img src="icon.png" alt="ไอคอนรูปภาพ" class="icon" id="alcoholIcon">
<select name="alcohol_consumption" required>
    <option value="">---เลือก---</option>
    <option value="ไม่ดื่มเหล้า">ไม่ดื่มเหล้า</option>
    <option value="1-2 Drink"> เหล้าแดง 2 ฝาใหญ่ หรือ เหล้าขาว 1 แก้วช็อต</option>
    <option value="3-4 Drink"> เหล้าแดง 1-2 แก้วช็อต หรือ เหล้าขาว 2 แก้วช็อต</option>
    <option value="5-6 Drink"> เหล้าแดง 3-4 แก้วช็อต หรือ ครึ่งแบน หรือ เหล้าขาว 4 แก้วช็อต</option>
    <option value="7-9 Drink"> เหล้าแดง 5-6 แก้วช็อต หรือ เหล้าขาว 6 แก้วช็อต</option>
    <option value="ตั้งแต่ 10 Drink ขึ้นไป">ตั้งแต่เหล้าแดงและเหล้าขาว 7 แก้วช็อตขึ้นไป  หรือ 1 แบน/ขวด</option>
</select>
<div id="alcoholPopup" class="popup" style="display:none;">
    <span class="close">&times;</span>
    <img src="<?php echo 'spirits.png'; ?>" alt="รูปภาพตัวอย่าง" class="popup-content">
</div>
<br>
        <label for="alcohol_drinking_frequency">2.ความถี่ในการดื่ม (จำนวนครั้งต่อเดือน)</label>
        <select name="alcohol_drinking_frequency" required>
            <option value="">---เลือก---</option>
            <option value="ไม่เคยเลย">ไม่เคยเลย</option>
            <option value="น้อยกว่า เดือนละครั้ง">น้อย (น้อยกว่า 1 ครั้งต่อเดือน)</option>
            <option value="เดือนละครั้ง">ปานกลาง (1-4 ครั้งต่อเดือน)</option>
            <option value="สัปดาห์ละครั้ง">มาก (5-6 ครั้งต่อเดือน ) </option>
            <option value="ทุกวัน หรือ เกือบทุกวัน">มากที่สุด (ตั้งแต่ 7 ครั้งต่อเดือนขึ้นไป) </option>
        </select><br>
        
        <label for="regret_due_to_alcohol">3.การดื่มมีผลกระทบด้านลบต่อจิตใจของตนเองบ่อยแค่ไหน (จำนวนครั้งต่อเดือน) </label>
        <select name="regret_due_to_alcohol" required>
            <option value="">---เลือก---</option>
            <option value="ไม่เคยเลย">ไม่มีผลต่อจิตใจ</option>
            <option value="น้อยกว่า เดือนละครั้ง">แทบไม่มีผลต่อจิตใจ (เดือนละ 1 ครั้ง หรือ น้อยกว่า)</option>
            <option value="เดือนละครั้ง">มีผลต่อจิตใจ บางครั้ง (2-4 ครั้งต่อเดือน)</option>
            <option value="สัปดาห์ละครั้ง">มีผลต่อจิตใจ บ่อยครั้ง (5-6 ครั้งต่อเดือน)</option>
            <option value="ทุกวัน หรือ เกือบทุกวัน">มีผลต่อจิตใจ ทุกครั้ง (ตั้งแต่ 7 ครั้งต่อเดือนขึ้นไป)</option>
        </select><br>
        <label for="neglected_due_to_alcohol">4.การดื่มมีผลกระทบต่อกิจวัตรประจำวันของตนเองบ่อยแค่ไหน (จำนวนครั้งต่อเดือน)</label>  
        <select name="neglected_due_to_alcohol" required>
            <option value="">---เลือก---</option>
            <option value="ไม่เคยเลย">ไม่มีผลกระทบ</option>
            <option value="น้อยกว่า เดือนละครั้ง">แทบไม่มีผลกระทบ (เดือนละ 1 ครั้ง หรือ น้อยกว่า)</option>
            <option value="เดือนละครั้ง">มีผลกระทบ บางครั้ง (2-4 ครั้งต่อเดือน)</option>
            <option value="สัปดาห์ละครั้ง">มีผลกระทบ บ่อยครั้ง (5-6 ครั้งต่อเดือน)</option>
            <option value="ทุกวัน หรือ เกือบทุกวัน">มีผลกระทบ ทุกครั้ง (ตั้งแต่ 7 ครั้งต่อเดือนขึ้นไป)</option>
        </select><br>
        
        <label for="unable_to_stop_drinking">5.ดื่มเกินกว่าที่ตั้งใจไว้บ่อยแค่ไหน (จำนวนครั้งต่อเดือน)</label>
        <select name="unable_to_stop_drinking" required>
            <option value="">---เลือก---</option>
            <option value="ไม่เคยเลย">ไม่เคยดื่มเกินกว่าที่ตั้งใจไว้</option>
            <option value="น้อยกว่า เดือนละครั้ง">ดื่มเกินกว่าที่ตั้งใจไว้ บางครั้ง (เดือนละ 1 ครั้ง หรือ น้อยกว่า)</option>
            <option value="เดือนละครั้ง">ดื่มเกินกว่าที่ตั้งใจไว้ บ่อยครั้ง (2-4 ครั้งต่อเดือน)</option>
            <option value="สัปดาห์ละครั้ง">ดื่มเกินกว่าที่ตั้งใจไว้ เกือบทุกครั้ง (5-6 ครั้งต่อเดือน)</option>
            <option value="ทุกวัน หรือ เกือบทุกวัน">ดื่มเกินกว่าที่ตั้งใจไว้ ทุกครั้ง (ตั้งแต่ 7 ครั้งต่อเดือนขึ้นไป)</option>
        </select>
        <div id="dontPopup" class="popup" style="display:none;">
    <span class="close">&times;</span>
    <img src="<?php echo 'dont.png'; ?>" alt="รูปภาพตัวอย่าง" class="popup-content">
</div>
        <br>
        <label for="injury_due_to_alcohol">6.มีผลเสียหายที่เกิดขึ้นจากการดื่มหรือไม่ (ในช่วง 1 ปีที่ผ่านมา)</label>
        <select name="injury_due_to_alcohol" required>
            <option value="">---เลือก---</option>
            <option value="ไม่เคยเลย">ไม่มี</option>
            <option value="เคย แต่ไม่ได้เกิดขึ้นในปีที่แล้ว">มี (นานกว่า 1 ปีที่ผ่านมา)</option>
            <option value="เคยเกิดขึ้นในช่วงหนึ่งปีที่แล้ว">มี (1 ปีที่ผ่านมา)</option>
        </select><br>
        <label for="school_stress">7.ความเครียดจากโรงเรียน:</label>
        <img src="icon.png" alt="ไอคอนรูปภาพ" class="icon" id="school_stressIcon">
        <select name="school_stress" required>
            <option value="">---เลือก---</option>
            <option value="ไม่มีความเครียด">ไม่มีความเครียด</option>
            <option value="ความเครียดระดับต่ำ">ความเครียดระดับต่ำ</option>
            <option value="ความเครียดระดับปานกลาง">ความเครียดระดับปานกลาง</option>
            <option value="ความเครียดระดับสูง">ความเครียดระดับสูง</option>
        </select>
        
        <div id="school_stressPopup" class="popup" style="display:none;">
        <span class="close">&times;</span>
        <img src="<?php echo 'school_stress.png'; ?>" alt="รูปภาพตัวอย่าง" class="popup-content">
        </div>

        <br>
        <label for="doctor_or_family_advised_quit"> 8.เคยมีคนใกล้ตัวเป็นห่วงเกี่ยวกับการดื่มหรือไม่ (ในช่วง 1 ปีที่ผ่านมา)</label>
        <select name="doctor_or_family_advised_quit" required>
            <option value="">---เลือก---</option>
            <option value="ไม่เคยเลย">ไม่เคย</option>
            <option value="เคย แต่ไม่ได้เกิดขึ้นในปีที่แล้ว">เคย (นานกว่า 1 ปีที่ผ่านมา)</option>2
            <option value="เคยเกิดขึ้นในช่วงหนึ่งปีที่แล้ว">เคย  (1 ปีที่ผ่านมา)</option>
        </select><br>

        <label for="parent_status">9.สถานภาพของบิดา-มารดา </label>
        <select name="parent_status" required>
            <option value="">---เลือก---</option>
            <option value="สมรส">สมรส (อาศัยอยู่ด้วยกัน) </option>
            <option value="หย่าร้าง">หย่าร้าง</option>
            <option value="แยกกันอยู่">สมรถ (แยกกันอยู่)</option>
            <option value="ไม่ทราบ ติดต่อไม่ได้">ไม่ทราบ</option>
        </select><br>
        <input type="submit" value="ส่ง">
        <script src="script.js"></script>
    </form>
    
</body>
</html>