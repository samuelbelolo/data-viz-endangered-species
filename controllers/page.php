<?php

$matches = [];
preg_match('/^page\/([0-9]+)$/', $q, $matches);

$id = count($matches) > 1 ? $matches[1] : 0;

$title = 'page '.$id;


 /**
 * API
 */
 if ($id == 1){

// Get city and use Paris as default
$city = !empty($_GET['city']) ? $_GET['city'] : 'Paris';

// Create URL
$url = 'https://api.openweathermap.org/data/2.5/weather?';
$url .= http_build_query([
    'q' => $city,
    'appid' => '602bb40a21035dbbcc7d6002d769a81f',
    'units' => 'metric',
]);

// Cache info
$cacheKey = md5($url);
$cachePath = '../cache/'.$cacheKey;
$cacheUsed = false;

// Cache available
if(file_exists($cachePath) && time() - filemtime($cachePath) < 60)
{
    $result = file_get_contents($cachePath);
    $cacheUsed = true;
}

// Cache not available
else
{
    // Make request to API
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    $result = curl_exec($curl);
    curl_close($curl);

    // Save API in cache
    file_put_contents($cachePath, $result);
}

// Decode JSON
$result = json_decode($result);

// Create static map URL
if(!empty($result) && $result->cod === 200)
{
    $staticMapUrl = 'https://maps.googleapis.com/maps/api/staticmap?';
    $staticMapUrl .= http_build_query([
        'center' => $result->coord->lat.','.$result->coord->lon,
        'markers' => $result->coord->lat.','.$result->coord->lon,
        'zoom' => 10,
        'size' => '300x300',
        'key' => 'AIzaSyB6u8RLqSXjwSCunqI-U9Mzz0s-JYNKWrc',
    ]);
}
        
 }




include './views/pages/page.php'; ?>