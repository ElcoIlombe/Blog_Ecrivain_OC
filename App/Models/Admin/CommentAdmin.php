<?php 
 namespace App\Models\Admin;

 use PDO; 

 /*
 *CommentManager Admin
 */

 class CommentAdmin extends \Core\Model{

 	public static function toManage($post_id, $author, $comment, $date) {

 		try{
 			$db = static::getDB();
	 		$stmnt = $db->prepare('
	 			INSERT INTO tomanage_comments (post_id, author,comment, comment_date) 
	 			VALUES (:post_id,:author, :comment, :comment_date)');
	 		$stmnt->execute(array(
	 			'post_id' => $post_id, 
	 			'author' => $author,
	 			'comment' => $comment,
	 			'comment_date' => $date
 		));
 		}
 		
 		catch(PDOException $e)
 		{
 			echo $e->getMessage();
 		}
 	}

 	public static function getLastReported()
    {
        try {
            $db = static::getDB();

            $req = $db->query('
            	SELECT * FROM tomanage_comments 
                ORDER BY id DESC LIMIT 5 ');
            $results = $req->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function approveComment($id) {
        try 
        {
            $db = static::getDB();
            $stmnt = $db->prepare('
                DELETE FROM tomanage_comments 
                WHERE id = ?'
            );
            $stmnt->execute(array($id));
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
        public static function deleteComment($id) {
        $db = static::getDB();
        $stmnt = $db->prepare('
            DELETE FROM posts 
            WHERE id = ?'
        );
        $stmnt->execute(array($id));
    }
 }