<?php

include './database/database.php';

/**
 * Routing
 */

define ('URL','http://localhost/template_php/');

 //Get q param
 $q = !empty($_GET['q']) ? $_GET['q'] : 'home';

 //define controller
 $controller = '404';

 if($q == 'home')
{
    $controller = 'home';
} else if ($q == 'about-us')
{
    $controller = 'about';
} else if (preg_match('/^page\/[1-9][0-9]*$/', $q))
{
    $controller = 'page';
}
 

/**
 * prepare your POST here
 */






 //include controller
 include './controllers/'.$controller.'.php';