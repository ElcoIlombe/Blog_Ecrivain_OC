<?php 

namespace App\Controllers\Admin;
use Core\View;
use App\Models\Post;
use App\Models\Admin\PostAdmin;
use App\Models\Admin\CommentAdmin;
use App\Models\Comments;

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
		//return false;
	}

	/**
	*Show the index page
	*
	*@return void
	*/ 

	public function indexAction()
	{
		$posts = Post::getLast();
		$reports = CommentAdmin::getLastReported();
		View::renderTemplate('Admin/index.html', [
            'name' => 'Jonathan',
            'posts' => $posts,
            'reports' => $reports
        ]);
	}

	public function deletePostAction() {
		$id = $_GET['id'];
		$posts = Post::getLast();
		PostAdmin::deletePost($id);
		View::renderTemplate('Admin/index.html', [
            'name' => 'Jonathan',
        ]);
	}
	public function updatePostAction() {
		if(isset($_POST['content']) || isset($_POST['title']))
		{
			$title = $_POST['title'];
			$content = $_POST['content'];
			$id = $_GET['id'];
			PostAdmin::updatePost($id,$content,$title);
		}
		$post = Post::getOne();
		View::renderTemplate('Admin/update.html', [
            'name' => 'Jonathan',
            'post' => $post
        ]);
	}

	public function addPostAction(){
		if(isset($_POST['content']) || isset($_POST['title']))
		{
			$title = $_POST['title'];
			$content = $_POST['content'];
			PostAdmin::addPost($title, $content);
		}
		View::renderTemplate('Admin/addnew.html', [
            'name' => 'Jonathan',
        ]);
	}

}