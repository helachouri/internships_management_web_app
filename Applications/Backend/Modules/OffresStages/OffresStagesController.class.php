<?php
namespace Applications\Backend\Modules\OffresStages;

class OffresStagesController extends \Library\BackController {

	public function executeIndex(\Library\HTTPRequest $request) {

		$this->page->addVar('title', 'Gestion des Offres de stages');
		$manager = $this->managers->getManagerOf('OffresStages');
		$this->page->addVar('listeOffres', $manager->getList());
		$this->page->addVar('nombreOffres', $manager->count());
	}

	public function executeInsert(\Library\HTTPRequest $request) {

		if ($request->postExists('contenu')) {

			$this->processForm($request);
		}

		$this->page->addVar('title', 'Ajout d\'une offre');
	}

	public function processForm(\Library\HTTPRequest $request) {

		$offre = new \Library\Entities\OffresStages(array( 'contact' => $request->postData('contact'),
												  'titre' => $request->postData('titre'),
												  'contenu' => $request->postData('contenu'),
												  'mail_contact' => $request->postData('mail_contact'),
												  'num_contact' => $request->postData('num_contact'),
												  'type'=> $request->postData('type') ) );

		// L'identifiant de l'offre est transmis si on veut la modifier.
		if ($request->postExists('id')) {
	
			$offre->setId($request->postData('id'));
		}

		if ($offre->isValid()) {
		
			$this->managers->getManagerOf('OffresStages')->save($offre);
			$this->app->user()->setFlash($offre->isNew() ? 'L\'offre a bien été ajoutée !' : 'L\'offre a bien été modifiée !');
		}

		else {
			
			$this->page->addVar('erreurs', $offre->erreurs());
		}

		$this->page->addVar('offre', $offre);
	}

	public function executeUpdate(\Library\HTTPRequest $request) {

		if ($request->postExists('contenu')) {
			$this->processForm($request);
		}

		else {

			$this->page->addVar('offre', $this->managers->getManagerOf('OffresStages')->getUnique($request->getData('id')));
		}

		$this->page->addVar('title', 'Modification d\'une offre');
	}

	public function executeDelete(\Library\HTTPRequest $request) {

		$this->managers->getManagerOf('OffresStages')->delete($request->getData('id'));
		$this->app->user()->setFlash('L\'offre a bien été supprimée !');
		$this->app->httpResponse()->redirect('/admin/gestionOffres');
	}

	public function executeShow(\Library\HTTPRequest $request) {

		$offre = $this->managers->getManagerOf('OffresStages')->getUnique($request->getData('id'));

		if (empty($offre)) {

			$this->app->httpResponse()->redirect404_admin();
		}

		$this->page->addVar('title', $offre->titre());
		$this->page->addVar('offre', $offre);
	}
}