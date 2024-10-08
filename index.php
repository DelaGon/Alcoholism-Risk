<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant Data Form</title>
</head>
<body>
    <h2>แบบฟอร์ม</h2>

    <img src="<?php echo "drink.png"; ?>" alt="รูปภาพตัวอย่าง" width="500" height="300">

    <form action="display.php" method="post">
        <label for="AlcoholConsumption">ปริมาณการดื่มเหล้า:</label>
        <select name="AlcoholConsumption">
            <option value="">---เลือก---</option>
            <option value="ไม่ดื่มเหล้า">ไม่ดื่มเหล้า</option>
            <option value="1-2 Drink">1-2 Drink</option>
            <option value="3-4 Drink">3-4 Drink</option>
            <option value="5-6 Drink">5-6 Drink</option>
            <option value="7-9 Drink">7-9 Drink</option>
            <option value="ตั้งแต่ 10 Drink ขึ้นไป">ตั้งแต่ 10 Drink ขึ้นไป</option>
        </select><br>
        <label for="BeerConsumption">ปริมาณการดื่มเบียร์:</label>
        <select name="BeerConsumption">
            <option value="">---เลือก---</option>
            <option value="ไม่ดื่มเบียร์">ไม่ดื่มเบียร์</option>
            <option value="1-2 Drink">1-2 Drink</option>
            <option value="3-4 Drink">3-4 Drink</option>
            <option value="5-6 Drink">5-6 Drink</option>
            <option value="7-9 Drink">7-9 Drink</option>
            <option value="ตั้งแต่ 10 Drink ขึ้นไป">ตั้งแต่ 10 Drink ขึ้นไป</option>
        </select><br>
        <label for="DrinkingFrequency">ความถี่ในการดื่ม:</label>
        <select name="DrinkingFrequency">
            <option value="">---เลือก---</option>
            <option value="ไม่เคยเลย">ไม่เคยเลย</option>
            <option value="น้อยกว่า เดือนละครั้ง">น้อยกว่า เดือนละครั้ง</option>
            <option value="เดือนละครั้ง">เดือนละครั้ง</option>
            <option value="สัปดาห์ละครั้ง">สัปดาห์ละครั้ง</option>
            <option value="ทุกวัน หรือ เกือบทุกวัน">ทุกวัน หรือ เกือบทุกวัน</option>
        </select><br>
        <label for="DrinkingPattern">รูปแบบการดื่ม:</label>
        <select name="DrinkingPattern">
            <option value="">---เลือก---</option>
            <option value="ไม่เคยดื่ม">ไม่เคยดื่ม</option>
            <option value="ดื่มเพื่อสังคม (ดื่มในงานเลี้ยงสังสรรค์หรือกิจกรรมสังคมต่างๆ)">ดื่มเพื่อสังคม (ดื่มในงานเลี้ยงสังสรรค์หรือกิจกรรมสังคมต่างๆ)</option>
            <option value="ดื่มเพื่อคลายเครียด (ดื่มเมื่อรู้สึกเครียดหรือต้องการผ่อนคลาย)">ดื่มเพื่อคลายเครียด (ดื่มเมื่อรู้สึกเครียดหรือต้องการผ่อนคลาย)</option>
            <option value="ดื่มเป็นประจำ (ดื่มแอลกอฮอล์เป็นกิจวัตรประจำวัน)">ดื่มเป็นประจำ (ดื่มแอลกอฮอล์เป็นกิจวัตรประจำวัน)</option>
            <option value="ดื่มมากในบางครั้ง (ดื่มแอลกอฮอล์ในปริมาณมากในช่วงเวลาสั้นๆ)">ดื่มมากในบางครั้ง (ดื่มแอลกอฮอล์ในปริมาณมากในช่วงเวลาสั้นๆ)</option>
            <option value="ดื่มคนเดียว (ดื่มแอลกอฮอล์คนเดียวที่บ้านหรือที่อื่นๆ)">ดื่มคนเดียว (ดื่มแอลกอฮอล์คนเดียวที่บ้านหรือที่อื่นๆ)</option>
        </select><br>
        <label for="DrinkingMotivation">แรงจูงใจในการดื่ม:</label>
        <select name="DrinkingMotivation">
            <option value="">---เลือก---</option>
            <option value="ไม่เคยดื่ม">ไม่เคยดื่ม</option>
            <option value="เพื่อความสนุกสนาน (ดื่มเพื่อสนุกสนานในงานเลี้ยงหรือปาร์ตี้)">เพื่อความสนุกสนาน (ดื่มเพื่อสนุกสนานในงานเลี้ยงหรือปาร์ตี้)</option>
            <option value="เพื่อเข้าสังคม (ดื่มเพื่อเข้ากับกลุ่มเพื่อนหรือเพื่อเป็นที่ยอมรับในสังคม)">เพื่อเข้าสังคม (ดื่มเพื่อเข้ากับกลุ่มเพื่อนหรือเพื่อเป็นที่ยอมรับในสังคม)</option>
            <option value="เพื่อการผ่อนคลาย (ดื่มเพื่อผ่อนคลายหลังจากวันที่เหน็ดเหนื่อย)">เพื่อการผ่อนคลาย (ดื่มเพื่อผ่อนคลายหลังจากวันที่เหน็ดเหนื่อย)</option>
            <option value="เพื่อหลีกหนี (ดื่มเพื่อหลีกหนีจากปัญหาหรือความทุกข์)">เพื่อหลีกหนี (ดื่มเพื่อหลีกหนีจากปัญหาหรือความทุกข์)</option>
        </select><br>
        <label for="FriendsWhoDrink">มีเพื่อนที่ดื่มสุรา:</label>
        <select name="FriendsWhoDrink">
            <option value="">---เลือก---</option>
            <option value="มี">มี</option>
            <option value="ไม่มี">ไม่มี</option>
        </select><br>
        <label for="ChronicDiseases">โรคประจำตัว:</label>
        <select name="ChronicDiseases">
            <option value="">---เลือก---</option>
            <option value="ไม่มี">ไม่มี</option>
            <option value="ภูมิแพ้">ภูมิแพ้</option>
            <option value="G6PD">G6PD</option>
            <option value="หืดหอบ">หืดหอบ</option>
            <option value="เลือดจาง">เลือดจาง</option>
        </select><br>
        <label for="FamilyStress">ความเครียดในครอบครัว:</label>
        <select name="FamilyStress">
            <option value="">---เลือก---</option>
            <option value="ไม่มีความเครียด">ไม่มีความเครียด</option>
            <option value="ความเครียดระดับต่ำ">ความเครียดระดับต่ำ</option>
            <option value="ความเครียดระดับปานกลาง">ความเครียดระดับปานกลาง</option>
            <option value="ความเครียดระดับสูง">ความเครียดระดับสูง</option>
        </select><br>
        <label for="ParentalDrinkingBehavior">พฤติกรรมการดื่มของผู้ปกครอง:</label>
        <select name="ParentalDrinkingBehavior">
            <option value="">---เลือก---</option>
            <option value="ไม่เคยเลย">ไม่เคยเลย</option>
            <option value="เดือนละครั้ง">เดือนละครั้ง</option>
            <option value="2-4 ครั้งต่อเดือน">2-4 ครั้งต่อเดือน</option>
            <option value="2-3 ครั้งต่อสัปดาห์">2-3 ครั้งต่อสัปดาห์</option>
            <option value="4 ครั้งขึ้นไปต่อสัปดาห์">4 ครั้งขึ้นไปต่อสัปดาห์</option>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
