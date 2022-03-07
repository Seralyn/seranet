<?php

include('simple_html_dom.php');

$city = $_GET['city'];

$city = str_replace(" ", "", $city);

// Create DOM from URL or file
$html = file_get_html('https://www.weather-forecast.com/locations/'.$city.'/forecasts/latest');

// Attempting Error handling
// if(file_exists($html)) {
//     $file = fopen($html, "r");
// } else {
//     die("Error: Try entering a correct city name.");
// }


// echo $html->find('title', 0)->plaintext;

$targetData = $html->find('p class="b-forecast__table-description-content"',1)->plaintext;



echo $targetData;

?>