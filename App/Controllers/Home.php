<?php

namespace App\Controllers;
use \Core\View;
/**
 * Home controller
 *
 * PHP version 5.4
 */
class Home extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        
        // return false;
    }

    /**
     * After filter
     *
     * @return void
     */
    protected function after()
    {
        
    }

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        

        View::renderTemplate('Home/index.html', [
            'name' => 'Jonathan',
            'colours' => ['red', 'green', 'blue']
        ]);
    }
}
