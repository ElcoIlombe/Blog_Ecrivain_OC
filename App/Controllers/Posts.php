<?php

namespace App\Controllers;

use Core\View;

use App\Models\Post;

use App\Models\Comments;
/**
 * Posts controller
 *
 * PHP version 5.4
 */
class Posts extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $posts= Post::getAll();
        View::renderTemplate('Posts/index.html', 
            [
                'posts' => $posts
            ]);
    }

    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNewAction()
    {
        $post = Post::getOne();
        $comments = Comments::thisComment();
        View::renderTemplate('Posts/post.html', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
    /**
     * Show the edit page
     *
     * @return void
     */
    public function editAction()
    {
        echo 'Hello from the edit action in the Posts controller!';
        echo '<p>Route parameters: <pre>' .
             htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}
