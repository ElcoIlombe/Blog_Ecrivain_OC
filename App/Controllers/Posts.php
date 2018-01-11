<?php

namespace App\Controllers;

use Core\View;

use App\Models\Post;

use App\Models\Comments;

use App\Models\Admin\CommentManager;
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
        View::renderTemplate('Posts/index.html.twig', 
            [
                'posts' => $posts,
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
        View::renderTemplate('Posts/post.html.twig', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }
    /**
     * Show the comment per post
     *
     * @return void
     */
    public function commentAction()
    {
        $author = $_POST['author'];
        $comment = $_POST['comment'];
        $post_id = $_POST['post_id'];
        Comments::addNew($author,$comment, $post_id);
        header('Location: /posts/addnew?id='.$post_id);

    }

    public function ShowAction()
    {
        $posts = Post::getLast();
        var_dump($posts);
        View::renderTemplate('Admin/index.html', [
            'posts' => $posts,
        ]);
    }

    public function reportAction()
    {
        $post_id = $_GET['post-id'];
        $report = Comments::report();
        header('Location: /posts/addnew?id='.$post_id);
    }

}
