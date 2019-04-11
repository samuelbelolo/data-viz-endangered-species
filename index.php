<?php
/**
*   Functions 
*/

include('./functions.php');

/**
 * Routing
 */

define('URL','http://localhost/si_back/');
define('token', '9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

//Get q param
$q = !empty($_GET['q']) ? $_GET['q'] : 'home';

//define controller
$controller = '404';

if($q == 'home'){
    $controller = 'home';
}

// Country

$countryNameURL = 'https://apiv3.iucnredlist.org/api/v3/country/list?token='.token;
$countryArray = ApiRequest($countryNameURL, 604800);


foreach ($countryArray->results as $key => $value) {
    // SPIECES
    if (preg_match('/^'.strtolower($value->country).'\/[a-zA-Z ]+$/', $q)) {
        $controller = 'species';
    }
    elseif ($q == strtolower($value->country)) {
        $controller = 'region';
    }
}




//include controller
include ('./controllers/'.$controller.'.php');