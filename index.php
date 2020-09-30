<?php

require_once 'autoload.php';

use Core\Session;




/* example for get key session  */

$sessionGet = new Session();
session_start();
$_SESSION['name'] = 'abdalla';
echo $sessionGet->get('name');



/* example for set key and value in session */

$sessionSet = new Session();
$sessionSet->set('age','27');

echo '<pre>';
print_r($_SESSION);
echo '</pre>';



/* example for check key in session */

$sessionHas = new Session();
var_dump($sessionHas->has('test'));



/* example for remove key in session */

$sessionRemove = new Session();
var_dump($sessionRemove->remove('test'));



/* example session destroy */

//$sessionDestroy = new Session();
//$sessionDestroy->destroy();
//print_r($_SESSION);



/* example session flash */

//$sessionFlash = new Session();
//$sessionFlash->flash('name');

