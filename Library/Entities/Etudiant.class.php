<?php
namespace Library\Entities;

class Etudiant extends \Library\Entity {

	protected $login,
			  $pass,
			  $nom,
			  $prenom,
			  $email,
			  $num_tel,
			  $ine,
			  $filiere;

	const EMAIL_INVALIDE = 1;
	const NUM_TEL_INVALIDE = 2;
	const EMAIL_INVALIDE2 = 3;

	public function isValid(){

		return !(empty($this->email) || empty($this->num_tel));
	}

	// SETTERS //

	public function setEmail($email) {

		if (!is_string($email) || empty($email) || !preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}$#', $email)) {
			$this->erreurs[] = self::EMAIL_INVALIDE;
		}
		else {
			$this->email = $email;
		}
	}

	public function setNum_tel($num_tel) {

		if (!is_string($num_tel) || empty($num_tel) || !preg_match('#^0[6,7]([ ]{1}[0-9]{2}){4}$#', $num_tel)) {
			$this->erreurs[] = self::NUM_TEL_INVALIDE;
		}
		else {
			$this->num_tel = $num_tel;
		}
	}

	public function setIne($ine) {

		if (!is_string($ine) || empty($ine) || !preg_match("#^[1-3]{1}$#", $ine)) {
			$this->erreurs[] = self::INE_INVALIDE;
		}
		else {
			$this->ine = $ine;
		}
	}

	public function setFiliere($filiere) {

		$this->filiere = $filiere;
	}

	// GETTERS //

	public function login() {

		return $this->login;
	}

	public function pass() {

		return $this->pass;
	}

	public function nom() {

		return $this->nom;
	}

	public function prenom() {

		return $this->prenom;
	}

	public function email() {

		return $this->email;
	}

	public function num_tel() {

		return $this->num_tel;
	}

	public function ine() {

		return $this->ine;
	}

	public function filiere() {

		return $this->filiere;
	}

}
