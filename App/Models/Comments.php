<?php 

namespace App\Models;

use PDO;

/**
*Comments model
*/

class Comments extends \Core\Model
{
	public static function thisComment()
    {
        try {
            $db = static::getDB();
            
                $stmt = $db->prepare('SELECT id, post_id, author, comment, comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
            $stmt->execute(array($_GET['id']));
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);   
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $results;
    }

    public static function addNew($author,$comment,$post_id)
    {
    	
    	try {
    		$db = static::getDB();
    	    	$stmt = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES (:post_id,:author, :comment, NOW())');
    	    	$stmt->execute(array(
    	    		'post_id' => $post_id,
    	    		'author' => $author,
    	    		'comment' => $comment
    	    	));
    	    }catch (PDOException $e) {
            echo $e->getMessage();
        	}


    }

    public static function reportComment()
    {
        try {
            $db = static::getDB();
            
                $stmt = $db->prepare('SELECT id, post_id, author, comment, comment_date FROM comments WHERE id = ? ORDER BY comment_date DESC');
            $stmt->execute(array($_GET['id']));
            $results = $stmt->fetch();   
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $results;
    }
}
