<?php 

namespace App\Controllers\Admin;
use Core\View;
/**
 * User admin controller
 *
 * PHP version 5.4
 */
class Users extends \Core\Controller
{
	/**
	*Before filter
	*
	*@return void
	*/
	protected function before()
	{
		// Make sure an admin user is logget in for exemple
		// return false;
	}

	/**
	*Show the index page
	*
	*@return void
	*/ 

	public function indexAction()
	{
		View::renderTemplate('Admin/index.html', [
            'name' => 'Jonathan',
            'colours' => ['red', 'green', 'blue']
        ]);
	}
}