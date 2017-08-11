<?php
namespace Applications\Backend\Modules\Connexion;

class ConnexionController extends \Library\BackController {

	public function executeIndex(\Library\HTTPRequest $request) {

		// Cas ou la connexion automatique est activée.
		if (!$this->app->user()->isAuthenticated() && !empty($_COOKIE['id']) && !empty($_COOKIE['cnx_auto'])) {

			$this->app->user()->setAuthenticated(true);

			$infos_user = $this->managers->getManagerOf('Admin')->lire_infos_utilisateur($_COOKIE['id']);

			if (false !== $infos_user) {

				$navigateur = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
				$hash = sha1('yasuo'.$infos_user['login'].'riven'.$infos_user['pass'].'zed'.$navigateur.'ekko');

				if ($_COOKIE['cnx_auto'] == $hash) {

					// On enregistre les informations dans la session
					$_SESSION['id'] = $infos_user['id'];
					$_SESSION['nom'] = $infos_user['nom'];
					$_SESSION['prenom'] = $infos_user['prenom'];
				}

				$this->app->httpResponse()->redirect('/admin/accueil.html');
			}

		}

		// Cas normal.
		elseif (!$this->app->user()->isAuthenticated()) {

			$this->page->addVar('title', 'Connexion | Platforme de gestion des stages');

			if ($request->postExists('login') && $request->postExists('pass')) {

				$login = $request->postData('login');
				$pass = $request->postData('pass');

				$id_user = $this->managers->getManagerOf('Admin')->combinaison_connexion_valide($login,sha1($pass));

				if (false !== $id_user) {

					$this->app->user()->setAuthenticated(true);

					$infos_user = $this->managers->getManagerOf('Admin')->lire_infos_utilisateur($id_user);

					// On enregistre les informations dans la session
					$_SESSION['id'] = $id_user;
					$_SESSION['nom'] = $infos_user['nom'];
					$_SESSION['prenom'] = $infos_user['prenom'];


					if (false != $request->postData('cnx_auto')) {

						$navigateur = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
						$hash_cookie = sha1('yasuo'.$login.'riven'.$pass.'zed'.$navigateur.'ekko');
						setcookie( 'id', $_SESSION['id'], strtotime("+1 year"), '/');
						setcookie('cnx_auto', $hash_cookie, strtotime("+1 year"), '/');
					}

					$this->app->httpResponse()->redirect('/admin/accueil.html');
				}

				else {

					// Suppression des cookies de connexion automatique
					setcookie('id', '');
					setcookie('connexion_auto', '');

					$this->app->user()->setFlash('Le nom de l\'utilisateur ou le mot de passe est incorrect.');
				}
			}
		}

		// Cas ou l'utilisateur est déjà connecté et veux accéder à la page de connexion.
		else {

			$this->page->addVar('title', 'Error');
			$this->app->httpResponse()->redirectDeja_connecte_admin();
		}
	}

	public function executeDeconnexion(\Library\HTTPRequest $request) {

		// Suppression de toutes les variables et destruction de la session
		$_SESSION = array();
		session_destroy();

		// Suppression des cookies de connexion automatique
		setcookie('id', '');
		setcookie('cnx_auto', '');

		$this->app->httpResponse()->redirect('/admin/');
}
}
