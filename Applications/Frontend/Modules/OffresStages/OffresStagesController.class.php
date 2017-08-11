<?php
namespace Applications\Frontend\Modules\OffresStages;

class OffresStagesController extends \Library\BackController {

	public function executeIndex(\Library\HTTPRequest $request) {

		// On ajoute une définition pour le titre.
		$this->page->addVar('title', 'Offres de stages');

		// On récupère le manager des OffresStages.
		$manager = $this->managers->getManagerOf('OffresStages');

		// On ajoute la variable $listeOffres à la vue.
		$this->page->addVar('listeOffres', $manager->getList());
	}

	public function executeShow(\Library\HTTPRequest $request) {

		$offre = $this->managers->getManagerOf('OffresStages')->getUnique($request->getData('id'));

		if (empty($offre)) {

			$this->app->httpResponse()->redirect404();
		}

		$this->page->addVar('title', $offre->titre());
		$this->page->addVar('offre', $offre);
	}
}
