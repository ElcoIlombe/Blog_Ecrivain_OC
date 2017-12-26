<?php
namespace App\Models\Admin;

use PDO;

/**
*PostAdmin Model
*/


class PostAdmin extends \Core\Model
{
	/**
	* 
	*
	*@return array
	*/
	public static function deletePost($id) {
		$db = static::getDB();
		$stmnt = $db->prepare('
			DELETE FROM posts 
			WHERE id = ?'
		);
		$stmnt->execute(array($id));
	}

	public static function updatePost($id, $content, $title) {
		$db = static::getDB();
		$stmnt = $db->prepare('
			UPDATE posts 
			SET title = ?, content = ?
			WHERE ID = ?'
		);
		$stmnt->execute(array($title, $content, $id));
	}
}