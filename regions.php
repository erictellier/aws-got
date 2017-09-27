<?php

$regions = array();
for($i = 1; $i <= 9; $i++){
	$houses = file_get_contents('https://www.anapioficeandfire.com/api/houses?pageSize=50&page=' . $i);
	$houses = json_decode($houses, true);
	foreach ($houses as $house) {
		if (!in_array($house['region'], $regions)) {
			$regions[] = $house['region'];
		}
	}
}

var_dump($regions);