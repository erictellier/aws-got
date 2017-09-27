<?php
require_once "layout/header.php";

$regions = ["The Westerlands", "Dorne", "The North", "The Reach", "The Vale", "The Riverlands", "The Crownlands", "The Stormlands", "The Neck", "Iron Islands", "Beyond the Wall", "None"];
$region = $regions[array_rand($regions)];

$remaining_houses = true;
$page = 1;
$houses = array();

while($remaining_houses){
	$result_houses_json = file_get_contents('https://www.anapioficeandfire.com/api/houses?region='. urlencode($region) .'&pageSize=50&page=' . $page);
	$result_houses = json_decode($result_houses_json, true);
	if ($result_houses) {
		$houses = array_merge($houses, $result_houses);
		$page++;
	}else{
		$remaining_houses = false;
	}
}

echo "<h1>Houses from ". $region ."</h1>";

foreach ($houses as $house) {
	//if (!empty($house['words'])) {
	echo $house["name"] . "<br>";
	//}
}


require_once "layout/footer.php";