<?php
// ข้อมูลการเชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alcoholstudy";

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

    $drinkingFrequency = $postData['DrinkingFrequency'];
    $beerConsumption = $postData['BeerConsumption'];

    // ค่าน้ำหนัก
    $weights = array(
        "DrinkingFrequency" => 41.86,
        "BeerConsumption" => 35.97,
        "AlcoholConsumption" => 28.49,
        "DrinkingMotivation" => 26.55,
        "DrinkingPattern" => 26.27,
        "FriendsWhoDrink" => 5.61
    );

    // แปลงค่าแอททริบิวต์ที่เป็น Ordinal ให้เป็นตัวเลข
    $ordinalMapping = array(
        "DrinkingFrequency" => array(
            "ไม่เคยเลย" => 1,
            "น้อยกว่า เดือนละครั้ง" => 2,
            "เดือนละครั้ง" => 3,
            "สัปดาห์ละครั้ง" => 4,
            "ทุกวัน หรือ เกือบทุกวัน" => 5
        ),
        "BeerConsumption" => array(
            "ไม่ดื่มเบียร์" => 1,
            "1-2 Drink" => 2,
            "3-4 Drink" => 3,
            "5-6 Drink" => 4,
            "7-9 Drink" => 5,
            "ตั้งแต่ 10 Drink ขึ้นไป" => 6
        ),
        "AlcoholConsumption" => array(
            "ไม่ดื่มเหล้า" => 1,
            "1-2 Drink" => 2,
            "3-4 Drink" => 3,
            "5-6 Drink" => 4,
            "7-9 Drink" => 5,
            "ตั้งแต่ 10 Drink ขึ้นไป" => 6
        ),
    );

    // SQL สำหรับการดึงข้อมูล
    $sql = "SELECT * FROM participantdata WHERE DrinkingFrequency = '$drinkingFrequency'";

    // ดึงข้อมูลจากฐานข้อมูล
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $matchedRows = array();

        while($row = mysqli_fetch_assoc($result)) {
            $similarityScore = 0;

            // คำนวณความคล้ายกันสำหรับแอททริบิวต์ต่าง ๆ
            $drinkingFrequencySim = calculateOrdinalSimilarity(
                $ordinalMapping["DrinkingFrequency"][$drinkingFrequency],
                $ordinalMapping["DrinkingFrequency"][$row["DrinkingFrequency"]],
                1, 5
            );

            $beerConsumptionSim = calculateOrdinalSimilarity(
                $ordinalMapping["BeerConsumption"][$beerConsumption],
                $ordinalMapping["BeerConsumption"][$row["BeerConsumption"]],
                1, 6
            );

            $alcoholConsumptionSim = calculateOrdinalSimilarity(
                $ordinalMapping["AlcoholConsumption"][$postData["AlcoholConsumption"]],
                $ordinalMapping["AlcoholConsumption"][$row["AlcoholConsumption"]],
                1, 6
            );

            $drinkingMotivationSim = calculateCategoricalSimilarity($postData['DrinkingMotivation'], $row["DrinkingMotivation"]);
            $drinkingPatternSim = calculateCategoricalSimilarity($postData['DrinkingPattern'], $row["DrinkingPattern"]);
            $friendsWhoDrinkSim = calculateCategoricalSimilarity($postData['FriendsWhoDrink'], $row["FriendsWhoDrink"]);

            // รวมค่าความคล้ายกันของแต่ละแอททริบิวต์
            $similarityScore += $weights["DrinkingFrequency"] * $drinkingFrequencySim;
            $similarityScore += $weights["BeerConsumption"] * $beerConsumptionSim;
            $similarityScore += $weights["AlcoholConsumption"] * $alcoholConsumptionSim;
            $similarityScore += $weights["DrinkingMotivation"] * $drinkingMotivationSim;
            $similarityScore += $weights["DrinkingPattern"] * $drinkingPatternSim;
            $similarityScore += $weights["FriendsWhoDrink"] * $friendsWhoDrinkSim;

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
