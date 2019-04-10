<?php


/**
 * Routing
 */

define('URL','http://localhost/template_php/');
define('token', '9bb4facb6d23f48efbf424bb05c0c1ef1cf6f468393bc745d42179ac4aca5fee');

//Get q param
$q = !empty($_GET['q']) ? $_GET['q'] : 'home';

//define controller
$controller = '404';

// if($q == 'home'){
//     $controller = 'home';
// }

// REGION

$regionArray = array(
    'northern_africa',
    'eastern_africa',
    'persian_gulf',
    'europe',
    'southern_africa',
    'mediterranean',
    'western_africa',
    'central_africa',
    'global',
    'gulf_of_mexico',
    'africa',
    'northeastern_africa'
);
foreach ($regionArray as $key => $value) {
    if ($q == $value) {
        $controller = 'region';

    }
}


//include controller
include ('./controllers/'.$controller.'.php');