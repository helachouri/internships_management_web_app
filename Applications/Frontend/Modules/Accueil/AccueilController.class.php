<?php
namespace Applications\Frontend\Modules\Accueil;

class AccueilController extends \Library\BackController {

	public function executeIndex(\Library\HTTPRequest $request) {

		if ($this->app->user()->isAuthenticated()){

			$this->page->addVar('title', 'Accueil | Platforme de gestion des stages');
		}

		else{

			$this->app->httpResponse()->redirectNon_connecte();
		}
	}
}
