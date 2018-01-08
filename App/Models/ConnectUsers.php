<?php 

namespace App\Models;

use PDO;

/**
* ConnectUsers model
**/

class ConnectUsers extends \Core\Model
{
	public static function Connect($pseudo)
    {
        try {
            $db = static::getDB();

            $stmnt = $db->prepare('SELECT id,pseudo, pass 
                FROM member 
                WHERE pseudo = :pseudo');
            $stmnt->execute(array(
                'pseudo' => $pseudo));

            $results = $stmnt->fetch();

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}