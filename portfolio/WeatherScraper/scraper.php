<?php

include('simple_html_dom.php');

$city = $_GET['city'];

$city = str_replace(" ", "", $city);

// Create DOM from URL or file
$html = file_get_html('https://www.weather-forecast.com/locations/'.$city.'/forecasts/latest');

// echo $html->find('title', 0)->plaintext;

$targetData = $html->find('p class="b-forecast__table-description-content"',1)->plaintext;

echo $targetData;

?>