<?php 
/**
 * Post Manager
 *
 * PHP version 5.4
 */
class PostManager extends Manager
{
	/* Get all the post in the database
	*
	* @return query
	*/
	public function getAllPosts()
	{

		$req = parent::$db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'le %d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date_fr DESC');
		return $req;
	}
	/* Get last post in the database
	*
	* @return query
	*/
	public function getLastPosts()
	{
		$req = parent::$db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'le %d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date_fr DESC LIMIT 3');
		return $req;
	}
	/* Get one post by id in the database
	*
	* @return query
	*/
	public function getOnePost($url)
	{
		$req = parent::$db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'le %d/%m/%Y à %Hh%imin%ss\') WHERE id=?');
		$req->execute(array($url));

		return $req;
	}
}