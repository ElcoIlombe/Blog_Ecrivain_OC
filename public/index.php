<?php 

/** Front Controller
*
*/

//echo 'Requested URL = "'.$_SERVER['QUERY_STRING'].'"';

require "../Core/Router.php";

$router = new Router();

//echo get_class($router);
// Add the routes
$router->add('', ['controller'=>'Home', 'action' =>'index']);
$router->add('posts', ['controller'=>'Posts', 'action' =>'index']);
$router->add('posts', ['controller'=>'Posts', 'action' =>'new']);

//Display the routing table 
echo '<pre>';
var_dump($router->getRoutes());
echo '</pre>';

