<?php
namespace Library;

class HTTPResponse extends ApplicationComponent {

	protected $page;

	public function addHeader($header) {

		header($header);
	}

	public function redirect($location) {

		header('Location: '.$location);
		exit;
	}

	public function redirect404() {

		$this->page = new Page($this->app);
		$this->page->setContentFile(__DIR__.'/../Errors/404.html');
		$this->addHeader('HTTP/1.0 404 Not Found');
		$this->page->addVar('title', 'Error 404');
		$this->send();
	}

	public function redirectNon_connecte(){

		$this->page = new Page($this->app);
		$this->page->setContentFile(__DIR__.'/../Errors/non_connecte.html');
		$this->page->addVar('title', 'Error');
		$this->send();
	}
	public function redirectNon_connecte_admin(){

		$this->page = new Page($this->app);
		$this->page->setContentFile(__DIR__.'/../Errors/non_connecte_admin.html');
		$this->page->addVar('title', 'Error');
		$this->send();
	}

	public function redirectDeja_connecte(){

		$this->page = new Page($this->app);
		$this->page->setContentFile(__DIR__.'/../Errors/deja_connecte.html');
		$this->page->addVar('title', 'Error');
		$this->send();
	}
	public function redirectDeja_connecte_admin(){

		$this->page = new Page($this->app);
		$this->page->setContentFile(__DIR__.'/../Errors/deja_connecte_admin.html');
		$this->page->addVar('title', 'Error');
		$this->send();
	}

	public function send() {

		exit($this->page->getGeneratedPage());
	}

	public function setPage(Page $page) {
	
		$this->page = $page;
	}
	
	
	public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true) {

		// Changement par rapport à la fonction setcookie() : le dernier argument est par défaut à true.
		setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
	}

}