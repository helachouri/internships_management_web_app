<?php
namespace Applications\Frontend\Modules\Etudiant;

use \Library\FPDF;
use \Library\LettreRecommandation;
use \Library\Font;


class EtudiantController extends \Library\BackController {

	public function executeInquire(\Library\HTTPRequest $request) {

		if ($this->app->user()->isAuthenticated()){

			if ($request->postExists('email') && $request->postExists('num_tel') && $request->postExists('filiere')) {

				$this->processForm($request);
			}

			$this->page->addVar('title', 'Renseigner vos informations');

			$infos_user = $this->managers->getManagerOf('Etudiant')->lire_infos_utilisateur(empty($_SESSION['id'])?$_COOKIE['id']:$_SESSION['id']);
			$_SESSION['nom'] = $infos_user['nom'];
			$_SESSION['prenom'] = $infos_user['prenom'];
			$_SESSION['ine'] = $infos_user['ine'];
			$_SESSION['email'] = $infos_user['email'];
			$_SESSION['num_tel'] = $infos_user['num_tel'];
			$_SESSION['filiere'] = $infos_user['filiere'];

		}

		else{

			$this->app->httpResponse()->redirectNon_connecte();
		}
	}

	public function processForm(\Library\HTTPRequest $request) {

		$etudiant = new \Library\Entities\Etudiant(array( 'email' => $request->postData('email'),
												  'num_tel' => $request->postData('num_tel'),
												  'filiere' => $request->postData('filiere'),
												  'id' => $_SESSION['id']
												   ) );

		if ($etudiant->isValid()) {

			$this->managers->getManagerOf('Etudiant')->inquireInfos($etudiant);

			// On enregistre les nouveaux informations entrées par l'utilisateur.
			$_SESSION['email'] = $request->postData('email');
			$_SESSION['num_tel'] = $request->postData('num_tel');
			$_SESSION['filiere'] = $request->postData('filiere');

			$this->app->user()->setFlash('Vos informations ont été bien enregistrées');
		}

		else {

			$this->page->addVar('erreurs', $etudiant->erreurs());
		}
	}

	public function executeConnexion(\Library\HTTPRequest $request) {

		// Cas ou la connexion automatique est activée.
		if (!$this->app->user()->isAuthenticated() && !empty($_COOKIE['id']) && !empty($_COOKIE['cnx_auto'])) {

			$this->app->user()->setAuthenticated(true);

			$infos_user = $this->managers->getManagerOf('Etudiant')->lire_infos_utilisateur($_COOKIE['id']);

			if (false !== $infos_user) {

				$navigateur = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
				$hash = sha1('yasuo'.$infos_user['login'].'riven'.$infos_user['pass'].'zed'.$navigateur.'ekko');

				if ($_COOKIE['cnx_auto'] == $hash) {

					// On enregistre les informations dans la session
					$_SESSION['id'] = $infos_user['id'];
					$_SESSION['nom'] = $infos_user['nom'];
					$_SESSION['prenom'] = $infos_user['prenom'];
					$_SESSION['ine'] = $infos_user['ine'];
					$_SESSION['email'] = $infos_user['email'];
					$_SESSION['num_tel'] = $infos_user['num_tel'];
					$_SESSION['filiere'] = $infos_user['filiere'];

				}

				$this->app->httpResponse()->redirect('/accueil.html');
			}

		}

		// Cas normal.
		elseif (!$this->app->user()->isAuthenticated()) {

			$this->page->addVar('title', 'Connexion | Platforme de gestion des stages');

			if ($request->postExists('login') && $request->postExists('pass')) {

				$login = $request->postData('login');
				$pass = $request->postData('pass');

				$id_user = $this->managers->getManagerOf('Etudiant')->combinaison_connexion_valide($login,sha1($pass));

				if (false !== $id_user) {

					$this->app->user()->setAuthenticated(true);

					$infos_user = $this->managers->getManagerOf('Etudiant')->lire_infos_utilisateur($id_user);

					// On enregistre les informations dans la session
					$_SESSION['id'] = $id_user;
					$_SESSION['nom'] = $infos_user['nom'];
					$_SESSION['prenom'] = $infos_user['prenom'];
					$_SESSION['ine'] = $infos_user['ine'];
					$_SESSION['email'] = $infos_user['email'];
					$_SESSION['num_tel'] = $infos_user['num_tel'];
					$_SESSION['filiere'] = $infos_user['filiere'];

					if (false != $request->postData('cnx_auto')) {

						$navigateur = (!empty($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
						$hash_cookie = sha1('yasuo'.$login.'riven'.$pass.'zed'.$navigateur.'ekko');
						setcookie( 'id', $_SESSION['id'], strtotime("+1 year"), '/');
						setcookie('cnx_auto', $hash_cookie, strtotime("+1 year"), '/');
					}

					$this->app->httpResponse()->redirect('/accueil.html');
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
			$this->app->httpResponse()->redirectDeja_connecte();
		}
	}

	public function executeDeconnexion(\Library\HTTPRequest $request) {

		// Suppression de toutes les variables et destruction de la session
		$_SESSION = array();
		session_destroy();

		// Suppression des cookies de connexion automatique
		setcookie('id', '');
		setcookie('cnx_auto', '');

		$this->app->httpResponse()->redirect('/');
	}

	public function executeGenerate(\Library\HTTPRequest $request){

		$type = ($_SESSION['ine']=='1') ? "Ouvrier" : "Technique";
		$annee = ($_SESSION['ine']=='1') ? "première" : "deuxième";
		$nom = strtoupper($_SESSION['nom']);
		$prenom = $_SESSION['prenom'];
		$duree = ($_SESSION['ine']=='1') ? "semaines ou plus" : "à 8 semaines";

		$pdf = new LettreRecommandation();
		$pdf->AddPage();
		$pdf->SetFont('Times','',12);
		$pdf->SetXY(24.6,94.3);
		$pdf->Cell(0,0,'Monsieur le Directeur,',0,0);
		$pdf->SetXY(24.6,100.3);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Nous vous remercions par la présente de bien vouloir accorder un Stage ".$type." à notre élève ingénieur de ".$annee." année, Mr./Mlle. ".strtoupper($nom)." ".$prenom.". En accueillant notre élève-stagiaire au sein de votre entreprise, vous auriez contribué à une meilleure préparation pour son insertion dans la vie professionnelle."),0,'J');
		$pdf->ln(5);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Les stages ".$type."s"." intégrés à la structure pédagogique du cycle INE permettent à l’élève ingénieur de se familiariser avec les conditions de travail et observer le fonctionnement de l’entreprise. En plus, grâce à vos appréciations de capacités et des compétences de notre élève, nous pourrions améliorer notre action pédagogique en rapprochant notre formation aux exigences du marché de travail."),0,'J');
		$pdf->ln(5);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"A l’issue de ce stage, l’élève ingénieur est tenu d’élaborer un rapport dans lequel il présentera les résultats de son travail. Une copie du dit rapport sera remise à l’INPT et une autre à votre entreprise."),0,'J');
		$pdf->ln(5);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"Ce Stage ".$type." est d’une durée de 4 ".$duree.". (Entre le 15 juillet et le 05 septembre de chaque année). Nous vous confirmons que notre élève stagiaire est couvert par l’assurance de l’INPT contre les accidents pouvant survenir au cours de ce stage et ce dans la limite de garantie de son assuranceprise."),0,'J');
		$pdf->ln(5);
		$pdf->SetX(24.6);
		$pdf->MultiCell(160,5,iconv('UTF-8', 'windows-1252',"En vous remerciant de votre coopération, nous vous prions d’agréer, Monsieur le directeur, l’expression de nos salutations les meilleures."),0,'J');
		$pdf->Output();
	}
}
