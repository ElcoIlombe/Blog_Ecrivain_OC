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
	*Show the index page
	*
	*@return void
	*/ 

	public function indexAction()
	{
		session_start();
		$posts = Post::getLast();
		$reports = CommentAdmin::
		getLastReported();
		View::renderTemplate('Admin/index.html', [
            'name' => $_SESSION['pseudo'],
            'posts' => $posts,
            'reports' => $reports
        ]);
	}
	
	public function deletePostAction() {
		session_start();
		$id = $_GET['id'];
		$posts = Post::getLast();
		PostAdmin::deletePost($id);
		header('Location: /admin/users/index');
	}
	public function updatePostAction() {
		if(isset($_POST['content']) || isset($_POST['title']))
		{
			session_start();
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

	public function addPostAction(){session_start();
		if(isset($_POST['content']) && isset($_POST['title']))
		{

			if($_POST['content'] !== '' && $_POST['title'] !== '')
		
			{
				$author_id = $_SESSION['id'];
				var_dump($author_id);
				$title = $_POST['title'];
				$content = $_POST['content'];
				PostAdmin::addPost($author_id,$title, $content);
			}
		}
		
		View::renderTemplate('Admin/addnew.html', [
            'name' => 'Jonathan'
        ]);
	}
	public function approveCommentAction() {
		session_start();
		CommentAdmin::ApproveReported();
		header("Location: /admin/users/index");
	}

	public function deleteCommentAction() {
		session_start();
		CommentAdmin::DeleteReported();
		header("Location: /admin/users/index");
	}

}