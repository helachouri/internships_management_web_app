<?php
namespace Applications\Backend\Modules\Etudiant;

class EtudiantController extends \Library\BackController {

	const INE1 = '1';
	const INE2 = '2';
	const INE3 = '3';


	public function executeIndex(\Library\HTTPRequest $request) {

		$this->page->addVar('title', 'Gestion des profils des étudiants');
		$manager = $this->managers->getManagerOf('Etudiant');
		$this->page->addVar('ine1', $manager->getInes('1'));
		$this->page->addVar('ine2', $manager->getInes('2'));
	}

	public function executeShow(\Library\HTTPRequest $request) {

		$etudiant = $this->managers->getManagerOf('Etudiant')->getEtudiant($request->getData('id'));

		if (empty($etudiant)) {
		
			$this->app->httpResponse()->redirect404_admin();
		}

		$this->page->addVar('etudiant', $etudiant);
		$this->page->addVar('title', $etudiant->nom()." ".$etudiant->prenom());


		if ($request->postExists('email')) {
			$this->processForm($request);
		}

		else {

			$this->page->addVar('etudiant', $this->managers->getManagerOf('Etudiant')->getEtudiant($request->getData('id')));
		}

	}


	public function processForm(\Library\HTTPRequest $request) {

		$etudiant = new \Library\Entities\Etudiant(array( 'email' => $request->postData('email'),
												  'num_tel' => $request->postData('num_tel'),
												  'filiere' => $request->postData('filiere'),
												  'id' => $request->postData('id')
												   ) );

		if ($etudiant->isValid()) {
		
			$this->managers->getManagerOf('Etudiant')->inquireInfos($etudiant);

			$this->app->user()->setFlash('Les informations ont été bien modifiées');

			$this->app->httpResponse()->redirect('/admin/gestionEtudiant/etudiant-'.$etudiant['id'].'.html');
		}

		else {
			
			$this->page->addVar('erreurs', $etudiant->erreurs());
		}	
	}

	public function executeMailing(\Library\HTTPRequest $request) {

		$to = "";
		$subject = "My subject";
		$txt = "Hello world!";
		$headers = "From: webmaster@example.com" . "\r\n" .
		"CC: somebodyelse@example.com";

		mail($to,$subject,$txt,$headers);
	}

	public function executeMailing2(\Library\HTTPRequest $request) {

		$to = "";
		$subject = "My subject";
		$txt = "Hello world!";
		$headers = "From: webmaster@example.com" . "\r\n" .
		"CC: somebodyelse@example.com";

		mail($to,$subject,$txt,$headers);
	}
}
