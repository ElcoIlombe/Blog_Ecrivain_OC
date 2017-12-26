<?php 

namespace App\Models;

use PDO;

/**
*Post model
*/

class Post extends \Core\Model
{
	/**
	* Get all the posts as an associative array
	*
	*@return array
	*/

	public static function getAll()
    {
        try {
            $db = static::getDB();

            $req = $db->query('SELECT id, title, content FROM posts
                                ORDER BY creation_date');
            $results = $req->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    /**
    * Get all the posts as an associative array
    * 
    *
    *@return array if the index of the table > 0
    */
    public static function getOne()
    {
    	try 
    	{
    		$db = static::getDB();
    		$stmt = $db->prepare('SELECT id, title, content FROM posts WHERE id = ?');
	    	$stmt->execute(array($_GET['id']));
	    	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	} catch (PDOException $e) {
            echo $e->getMessage();
        }
         if(sizeof($results) > 0){
         	return $results[0];
         }
         else {
         	return null;
         }
    	

    }
    /**
    * Get the 5 last posts as an associative array
    *
    *@return array
    */

    public static function getLast()
    {
        try {
            $db = static::getDB();

            $req = $db->query('SELECT id, title, content FROM posts
                                ORDER BY creation_date DESC LIMIT 5');
            $results = $req->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}