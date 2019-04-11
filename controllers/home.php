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

echo '<pre>';
print_r($countryInfos);
echo '</pre>';


// echo '<pre>';
// print_r($countryArray);
// echo '</pre>';



/**
 * Exemple of POST method
 */

// if(!empty($_POST))
// {
//     // enter the data from your POST here
//     $data = [
//         // for a text :
//         'data1' => trim($_POST['input1']),
//         // for a time (care your form!)
//         'data2' => strtotime($_POST['input2']),
//         // for a int
//         'data3' => (int)$_POST['input3'],
//     ];

//     // to include in your database
//     $prepare = $pdo->prepare('
//         INSERT INTO
//             tab1 (column1, column2, column3)
//         VALUES
//             (:data1, :data2, :data3)
//     ');
//     $prepare->execute($data);
//     // you can add more execute here
// }

// // to query some data
// $query = $pdo->query('SELECT * FROM tab1');
// $returnedData = $query->fetchAll();


// include('./views/pages/home.php');