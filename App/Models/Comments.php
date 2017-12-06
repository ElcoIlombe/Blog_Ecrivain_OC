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

    public function addNew()
    {

    }
}
