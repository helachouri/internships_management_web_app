<?php
namespace Library\Entities;

class OffresStages extends \Library\Entity {

	protected $titre,
			  $contenu,
			  $contact,
			  $mail_contact,
			  $num_contact,
			  $dateAjout,
			  $dateModif,
			  $type;

	const TITRE_INVALIDE = 1;
	const CONTENU_INVALIDE = 2;
	const CONTACT_INVALIDE = 3;
	const MAIL_CONTACT_INVALIDE = 4;
	const NUM_CONTACT_INVALIDE = 5;
	const TYPE_OUVRIER = "ouvrier";
	const TYPE_TECHNIQUE = "technique";


	public function isValid() {

		return !(empty($this->titre) || empty($this->contenu) || empty($this->contact) || empty($this->mail_contact) || empty($this->num_contact));
	}

	// SETTERS //

	public function setContact($contact) {

		if (!is_string($contact) || empty($contact)) {

			$this->erreurs[] = self::CONTACT_INVALIDE;
		}

		else {
			
			$this->contact = $contact;
		}
	}

	public function setNum_contact($num_contact) {

		if (!is_string($num_contact) || empty($num_contact)) {

			$this->erreurs[] = self::NUM_CONTACT_INVALIDE;
		}

		else {
			
			$this->num_contact = $num_contact;
		}
	}

	public function setMail_contact($mail_contact) {

		if (!is_string($mail_contact) || empty($mail_contact)) {

			$this->erreurs[] = self::MAIL_CONTACT_INVALIDE;
		}

		else {
			
			$this->mail_contact = $mail_contact;
		}
	}

	public function setTitre($titre) {
		
		if (!is_string($titre) || empty($titre)) {

			$this->erreurs[] = self::TITRE_INVALIDE;
		}

		else {

			$this->titre = $titre;
		}
	}

	public function setContenu($contenu) {

		if (!is_string($contenu) || empty($contenu)) {
			
			$this->erreurs[] = self::CONTENU_INVALIDE;
		}

		else {

			$this->contenu = $contenu;
		}
	}

	public function setDateAjout($dateAjout) {

		if (is_string($dateAjout) && preg_match('`le [0-9]{2}/[0-9]{2}/[0-9]{4} à [0-9]{2}h[0-9]{2}`', $dateAjout)) {

			$this->dateAjout = $dateAjout;
		}
	}

	public function setDateModif($dateModif) {

		if (is_string($dateModif) && preg_match('`le [0-9]{2}/[0-9]{2}/[0-9]{4} à [0-9]{2}h[0-9]{2}`', $dateModif)) {

			$this->dateModif = $dateModif;
		}
	}

	public function setType($type) {

		$this->type = $type;
	}

	// GETTERS //

	public function contact() {

		return $this->contact;
	}

	public function titre() {
	
		return $this->titre;
	}

	public function contenu() {

		return $this->contenu;
	}

	public function dateAjout() {

		return $this->dateAjout;
	}

	public function dateModif() {

		return $this->dateModif;
	}

	public function type(){

		return $this->type;
	}
}