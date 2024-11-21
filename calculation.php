<?php
// ข้อมูลการเชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alcohol_risk_behavior";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// คำนวณสำหรับแอททริบิวต์ที่เป็น Ordinal
function calculateOrdinalSimilarity($value1, $value2, $min, $max) {
    $difference = abs($value1 - $value2);
    $range = $max - $min;
    return 1 - ($difference / $range);
}

// คำนวณสำหรับแอททริบิวต์ที่เป็น Nominal
if (!function_exists('calculateCategoricalSimilarity')) {
    function calculateCategoricalSimilarity($attr1, $attr2) {
        return ($attr1 == $attr2) ? 1 : 0;
    }
}

// ฟังก์ชั่นสำหรับการคำนวณและดึงข้อมูลจากฐานข้อมูล
function getSimilarityResults($postData) {
    global $conn;

    $alcohol_consumption = $postData['alcohol_consumption'];
    $alcohol_drinking_frequency = $postData['alcohol_drinking_frequency'];
    $regret_due_to_alcohol = $postData['regret_due_to_alcohol'];
    $neglected_due_to_alcohol = $postData['neglected_due_to_alcohol'];
    $unable_to_stop_drinking = $postData['unable_to_stop_drinking'];
    $injury_due_to_alcohol = $postData['injury_due_to_alcohol'];
    $school_stress = $postData['school_stress'];
    $doctor_or_family_advised_quit = $postData['doctor_or_family_advised_quit'];
    $parent_status = $postData['parent_status'];

    // ค่าน้ำหนัก
    $weights = array(
        "alcohol_consumption" => 47.44,
        "alcohol_drinking_frequency" => 43.08,
        "regret_due_to_alcohol" => 38.63,
        "neglected_due_to_alcohol" => 37.10,
        "unable_to_stop_drinking" => 29.70,
        "injury_due_to_alcohol" => 12.05,
        "school_stress" => 8.54,
        "doctor_or_family_advised_quit" => 4.13,
        "parent_status" => 3.84
    );

    // แปลงค่าแอททริบิวต์ที่เป็น Ordinal ให้เป็นตัวเลข
    $ordinalMapping = array(
        "regret_due_to_alcohol" => array(
            "ไม่เคยเลย" => 1,
            "น้อยกว่า เดือนละครั้ง" => 2,
            "เดือนละครั้ง" => 3,
            "สัปดาห์ละครั้ง" => 4,
            "ทุกวัน หรือ เกือบทุกวัน" => 5
        ),
        "neglected_due_to_alcohol" => array(
            "ไม่เคยเลย" => 1,
            "น้อยกว่า เดือนละครั้ง" => 2,
            "เดือนละครั้ง" => 3,
            "สัปดาห์ละครั้ง" => 4,
            "ทุกวัน หรือ เกือบทุกวัน" => 5
        ),
        "alcohol_drinking_frequency" => array(
            "ไม่เคยเลย" => 1,
            "น้อยกว่า เดือนละครั้ง" => 2,
            "เดือนละครั้ง" => 3,
            "สัปดาห์ละครั้ง" => 4,
            "ทุกวัน หรือ เกือบทุกวัน" => 5
        ),
        "unable_to_stop_drinking" => array(
            "ไม่เคยเลย" => 1,
            "น้อยกว่า เดือนละครั้ง" => 2,
            "เดือนละครั้ง" => 3,
            "สัปดาห์ละครั้ง" => 4,
            "ทุกวัน หรือ เกือบทุกวัน" => 5
        ),
        "alcohol_consumption" => array(
            "ไม่ดื่มเหล้า" => 1,
            "1-2 Drink" => 2,
            "3-4 Drink" => 3,
            "5-6 Drink" => 4,
            "7-9 Drink" => 5,
            "ตั้งแต่ 10 Drink ขึ้นไป" => 6
        ),
        "school_stress" => array(
            "ไม่มีความเครียด" => 1,
            "ความเครียดระดับต่ำ" => 2,
            "ความเครียดระดับปานกลาง" => 3,
            "ความเครียดระดับสูง" => 4
        ),
    );

    // SQL สำหรับการดึงข้อมูล
    $sql = "SELECT * FROM risk_behavior_data WHERE regret_due_to_alcohol = '$regret_due_to_alcohol'";

    // ดึงข้อมูลจากฐานข้อมูล
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $matchedRows = array();

        while($row = mysqli_fetch_assoc($result)) {
            $similarityScore = 0;

            // คำนวณความคล้ายกันสำหรับแอททริบิวต์ต่าง ๆ
            $regret_due_to_alcoholSim = calculateOrdinalSimilarity(
                $ordinalMapping["regret_due_to_alcohol"][$regret_due_to_alcohol],
                $ordinalMapping["regret_due_to_alcohol"][$row["regret_due_to_alcohol"]],
                1, 5
            );

            $neglected_due_to_alcoholSim = calculateOrdinalSimilarity(
                $ordinalMapping["neglected_due_to_alcohol"][$neglected_due_to_alcohol],
                $ordinalMapping["neglected_due_to_alcohol"][$row["neglected_due_to_alcohol"]],
                1, 5
            );

            $alcohol_drinking_frequencySim = calculateOrdinalSimilarity(
                $ordinalMapping["alcohol_drinking_frequency"][$alcohol_drinking_frequency],
                $ordinalMapping["alcohol_drinking_frequency"][$row["alcohol_drinking_frequency"]],
                1, 5
            );

            $unable_to_stop_drinkingSim = calculateOrdinalSimilarity(
                $ordinalMapping["unable_to_stop_drinking"][$unable_to_stop_drinking],
                $ordinalMapping["unable_to_stop_drinking"][$row["unable_to_stop_drinking"]],
                1, 5
            );

            $alcohol_consumptionSim = calculateOrdinalSimilarity(
                $ordinalMapping["alcohol_consumption"][$alcohol_consumption],
                $ordinalMapping["alcohol_consumption"][$row["alcohol_consumption"]],
                1, 6
            );

            $school_stressSim = calculateOrdinalSimilarity(
                $ordinalMapping["school_stress"][$school_stress],
                $ordinalMapping["school_stress"][$row["school_stress"]],
                1, 4
            );

            $injury_due_to_alcoholSim = calculateCategoricalSimilarity($injury_due_to_alcohol, $row["injury_due_to_alcohol"]);
            $doctor_or_family_advised_quitSim = calculateCategoricalSimilarity($doctor_or_family_advised_quit, $row["doctor_or_family_advised_quit"]);
            $parent_statusSim = calculateCategoricalSimilarity($parent_status, $row["parent_status"]);

            // รวมค่าความคล้ายกันของแต่ละแอททริบิวต์
            $similarityScore += $weights["regret_due_to_alcohol"] * $regret_due_to_alcoholSim;
            $similarityScore += $weights["neglected_due_to_alcohol"] * $neglected_due_to_alcoholSim;
            $similarityScore += $weights["alcohol_drinking_frequency"] * $alcohol_drinking_frequencySim;
            $similarityScore += $weights["unable_to_stop_drinking"] * $unable_to_stop_drinkingSim;
            $similarityScore += $weights["alcohol_consumption"] * $alcohol_consumptionSim;
            $similarityScore += $weights["school_stress"] * $school_stressSim;

            $similarityScore += $weights["injury_due_to_alcohol"] * $injury_due_to_alcoholSim;
            $similarityScore += $weights["doctor_or_family_advised_quit"] * $doctor_or_family_advised_quitSim;
            $similarityScore += $weights["parent_status"] * $parent_statusSim;

            $totalWeight = array_sum($weights);
            $overallSimilarity = round(($similarityScore / $totalWeight) * 100, 2);
            $row['OverallSimilarity'] = $overallSimilarity;
            $matchedRows[] = $row;
        }

        usort($matchedRows, function($a, $b) {
            return $b['OverallSimilarity'] <=> $a['OverallSimilarity'];
        });

        return $matchedRows;
    }

    return null;
}

//mysqli_close($conn);
?>
