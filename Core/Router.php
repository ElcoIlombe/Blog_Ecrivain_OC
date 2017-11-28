<?php 
/* 
* Router
*/

class Router
{
	/**
	* Associative arraay of routes (the routing table)
	*@var array
	*/
	protected $routes = [];

	/**
	* Add a route to the routing table
	*
	*@param string $route -> The route URL
	*@param array $param -> Parameters (controller,acion,etc)
	* 
	*@return void
	*/
	public function add($route,$param)
	{
		$this->routes[$route] = $param;
	}

	/* Get all the routes from the routing table
	* 
	*@return array
	*/
	public function getRoutes()
	{
		return $this->routes;
	}

}