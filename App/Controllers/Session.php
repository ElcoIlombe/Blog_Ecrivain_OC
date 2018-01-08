<?php 

namespace App\Controllers;

use Core\View;
use App\Models\ConnectUsers;

/**
 * Session Controller
 *
 * PHP version 5.4
 */

class Session extends \Core\Controller
{
		public function signinAction()
		{
					if(isset($_POST['pass'])&& isset($_POST['pseudo']))
					{
						if($_POST['pass'] !== '' && $_POST['pseudo'] !== '')
						{
							$pseudo = $_POST['pseudo'];
							$Connect = ConnectUsers::Connect($pseudo);
							if(password_verify($_POST['pass'], $Connect['pass']))
								{
									session_start();
									$_SESSION['id'] = $Connect['id'];
									$_SESSION['pseudo'] = $Connect['pseudo'];
									$_SESSION['active'] = 'active';
									header('Location: /admin/users/index');

								}
							else 
								{
									echo 'Nom de compte ou mot de passe incorrect';
								}
						}	
					}
					
		}
		public function signinpageAction(){
			session_start();
			if(isset($_SESSION['active']))
				{
					header('Location: /admin/users/index');
				}
				else
				{
					View::renderTemplate('Admin/signin.html');
				}
		}
		public function signoutAction()
				{
					session_start();
					$_SESSION = array();
					session_destroy();
					header('location: /index');		
				}
}

