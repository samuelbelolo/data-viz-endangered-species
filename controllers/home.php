<?php

$title = 'My Website';

/**
* API 
*/
$countryNameURL = 'https://apiv3.iucnredlist.org/api/v3/country/list?token='.token;
$countryArray = ApiRequest($countryNameURL, 604800);

$countryInfos = array(
    'names' => array(),
    'count' => array()
);
foreach ($countryArray->results as $key => $value) {
    // Add Isocode and Country Name to array
    $countryInfos['names'][$value->country] = $value->isocode;

    // Get count of species by country
    $speciesByCountryURL = 'https://apiv3.iucnredlist.org/api/v3/country/getspecies/'.$value->isocode.'?token='.token;
    $speciesByCountryResult = ApiRequest($speciesByCountryURL, 604800);

    // Add Count to isocode
    $countryInfos['count'][$value->isocode] = $speciesByCountryResult->count;
}

// echo '<pre>';
// print_r($countryInfos['names']);
// echo '</pre>';


// echo '<pre>';
// print_r($countryArray);
// echo '</pre>';


include('./views/pages/home.php');