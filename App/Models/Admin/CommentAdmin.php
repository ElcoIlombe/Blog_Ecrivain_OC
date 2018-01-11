<?php 
 namespace App\Models\Admin;

 use PDO; 

 /*
 *CommentManager Admin
 */

 class CommentAdmin extends \Core\Model{

 	public static function getLastReported()
    {
        try {
            $db = static::getDB();

            $req = $db->query('
            	SELECT * FROM comments WHERE report = 1
                ORDER BY id DESC LIMIT 5 ');
            $results = $req->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function ApproveReported()
    {
        try {
            $db = static::getDB();

            $stmnt = $db->prepare('
                UPDATE comments SET report = 0 WHERE id = ?');
            $stmnt->execute(array($_GET['id']));

            $results = $stmnt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function DeleteReported()
    {
        try {
            $db = static::getDB();

            $stmnt = $db->prepare('
                DELETE FROM comments WHERE id = ?');
            $stmnt->execute(array($_GET['id']));

            $results = $stmnt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


 }