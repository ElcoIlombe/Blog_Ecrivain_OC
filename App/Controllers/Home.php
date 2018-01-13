<?php

namespace App\Controllers;
use \Core\View;
use App\Models\Post;

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
        $posts = Post::getLast();
        View::renderTemplate('Home/index.html', [
            'name' => 'Jonathan',
            'posts' => $posts,
        ]);
    }
}

