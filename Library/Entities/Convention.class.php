<?php
namespace Library\Entities;

class Convention extends \Library\Entity {

	protected 
			  $idEtudiant,
			  // infos concernant l'entreprise.
			  $entreprise,
			  $adresse,
			  $ville,
			  $pays,
			  $fax,
			  // infos concerenant le parrain.
			  $civilite_par,
			  $nom_par,
			  $prenom_par,
			  $fonction_par,
			  $tel_par,
			  $email_par,
			  // infos concernant l'encadrant externe.
			  $civilite_enc_ext,
			  $nom_enc_ext,
			  $prenom_enc_ext,
			  $fonction_enc_ext,
			  $tel_enc_ext,
			  $email_enc_ext,
			  // infos sur le stage.
			  $intitule,
			  $date_debut,
			  $date_fin;

	// infos concernant l'entreprise.
	const ENTREPRISE_INVALIDE = 1;
	const ADRESSE_INVALIDE = 2;
	const VILLE_INVALIDE = 3;
	const PAYS_INVALIDE = 4;
	const FAX_INVALIDE = 5;
	// infos concerenant le parrain.
	const NOM_PAR_INVALIDE = 6;
	const PRENOM_PAR_INVALIDE = 7;
	const FONCTION_PAR_INVALIDE = 8;
	const TEL_PAR_INVALIDE = 9;
	const EMAIL_PAR_INVALIDE = 10;
	// infos concernant l'encadrant externe.
	const NOM_ENC_EXT_INVALIDE = 11;
	const PRENOM_ENC_EXT_INVALIDE = 12;
	const FONCTION_ENC_EXT_INVALIDE = 13;
	const TEL_ENC_EXT_INVALIDE = 14;
	const EMAIL_ENC_EXT_INVALIDE = 15;
	// infos sur le stage.
	const INTITULE_INVALIDE = 16;
	const DATE_DEBUT_INVALIDE = 17;
	const DATE_FIN_INVALIDE = 18;

	public function isValid(){

		return !(empty($this->intitule) || empty($this->date_debut) || empty($this->date_fin) || empty($this->entreprise) || empty($this->nom_enc_ext) || empty($this->prenom_enc_ext));
	}


	// SETTERS //
	public function setIdEtudiant($idEtudiant){
		$this->idEtudiant = $idEtudiant;
	}

	// infos concernant l'entreprise.
	public function setEntreprise($entreprise) {
		if (!is_string($entreprise) || empty($entreprise)) {
			$this->erreurs[] = self::ENTREPRISE_INVALIDE;
		}
		else {
			$this->entreprise = $entreprise;
		}
	}
	public function setVille($ville) {
		if (!is_string($ville) || empty($ville)) {
			$this->erreurs[] = self::VILLE_INVALIDE;
		}
		else {
			$this->ville = $ville;
		}
	}
	public function setPays($pays) {
		if (!is_string($pays) || empty($pays)) {
			$this->erreurs[] = self::PAYS_INVALIDE;
		}
		else {
			$this->pays = $pays;
		}
	}
	public function setFax($fax) {
		if (!is_string($fax) || empty($fax)) {
			$this->erreurs[] = self::FAX_INVALIDE;
		}
		else {
			$this->fax = $fax;
		}
	}
	// infos concerenant le parrain.
	public function setCivilite_par($civilite_par) {
		$this->civilite_par = $civilite_par;
	}
	public function setNom_par($nom_par) {
		if (!is_string($nom_par) || empty($nom_par)) {
			$this->erreurs[] = self::NOM_PAR_INVALIDE;
		}
		else {
			$this->nom_par = $nom_par;
		}
	}
	public function setPrenom_par($prenom_par) {
		if (!is_string($prenom_par) || empty($prenom_par)) {
			$this->erreurs[] = self::PRENOM_PAR_INVALIDE;
		}
		else {
			$this->prenom_par = $prenom_par;
		}
	}
	public function setFonction_par($fonction_par) {
		if (!is_string($fonction_par) || empty($fonction_par)) {
			$this->erreurs[] = self::FONCTION_PAR_INVALIDE;
		}
		else {
			$this->fonction_par = $fonction_par;
		}
	}
	public function setTel_par($tel_par) {
		if (!is_string($tel_par) || empty($tel_par) || !preg_match('#^06([ ]{1}[0-9]{2}){4}$#', $tel_par)) {
			$this->erreurs[] = self::TEL_PAR_INVALIDE;
		}
		else {
			$this->tel_par = $tel_par;
		}
	}
	public function setMail_par($email_par) {
		if (!is_string($email_par) || empty($email_par) || !preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}$#', $email_par)) {
			$this->erreurs[] = self::EMAIL_PAR_INVALIDE;
		}
		else {
			$this->email_par = $email_par;
		}
	}
	// infos concerenant l'encadrant externe.
	public function setCivilite_enc_ext($civilite_enc_ext) {
		$this->civilite_enc_ext = $civilite_enc_ext;
	}
	public function setNom_enc_ext($nom_enc_ext) {
		if (!is_string($nom_enc_ext) || empty($nom_enc_ext)) {
			$this->erreurs[] = self::NOM_ENC_EXT_INVALIDE;
		}
		else {
			$this->nom_enc_ext = $nom_enc_ext;
		}
	}
	public function setPrenom_enc_ext($prenom_enc_ext) {
		if (!is_string($prenom_enc_ext) || empty($prenom_enc_ext)) {
			$this->erreurs[] = self::PRENOM_ENC_EXT_INVALIDE;
		}
		else {
			$this->prenom_enc_ext = $prenom_enc_ext;
		}
	}
	public function setFonction_enc_ext($fonction_enc_ext) {
		if (!is_string($fonction_enc_ext) || empty($fonction_enc_ext)) {
			$this->erreurs[] = self::FONCTION_ENC_EXT_INVALIDE;
		}
		else {
			$this->fonction_enc_ext = $fonction_enc_ext;
		}
	}
	public function setTel_enc_ext($tel_enc_ext) {
		if (!is_string($tel_enc_ext) || empty($tel_enc_ext) || !preg_match('#^06([ ]{1}[0-9]{2}){4}$#', $tel_enc_ext)) {
			$this->erreurs[] = self::TEL_ENC_EXT_INVALIDE;
		}
		else {
			$this->tel_enc_ext = $tel_enc_ext;
		}
	}
	public function setMail_enc_ext($email_enc_ext) {
		if (!is_string($email_enc_ext) || empty($email_enc_ext) || !preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}$#', $email_enc_ext)) {
			$this->erreurs[] = self::EMAIL_ENC_EXT_INVALIDE;
		}
		else {
			$this->email_enc_ext = $email_enc_ext;
		}
	}
	// infos sur le stage.
	public function setIntitule($intitule) {
		if (!is_string($intitule) || empty($intitule)) {
			$this->erreurs[] = self::INTITULE_INVALIDE;
		}
		else {
			$this->intitule = $intitule;
		}
	}
	public function setDate_debut($date_debut) {
		$this->date_debut = $date_debut;	
	}
	public function setDate_fin($date_fin) {
		$this->date_fin = $date_fin;	
	}

	// GETTERS //

	// infos concernant l'entreprise.
	public function entreprise(){

		return $this->entreprise;
	}
	public function adresse(){

		return $this->adresse;
	}
	public function ville(){

		return $this->ville;
	}
	public function pays(){

		return $this->pays;
	}
	public function fax(){

		return $this->fax;
	}
	// infos concernant le parrain.
	public function civilite_par(){

		return $this->civilite_par;
	}
	public function nom_par(){

		return $this->nom_par;
	}
	public function prenom_par(){

		return $this->prenom_par;
	}
	public function fonction_par(){

		return $this->fonction_par;
	}
	public function tel_par(){

		return $this->tel_par;
	}
	public function email_par(){

		return $this->email_par;
	}
	// infos concernant l'encadrant externe.
	public function civilite_enc_ext(){

		return $this->civilite_enc_ext;
	}
	public function nom_enc_ext(){

		return $this->nom_enc_ext;
	}
	public function prenom_enc_ext(){

		return $this->prenom_enc_ext;
	}
	public function fonction_enc_ext(){

		return $this->fonction_enc_ext;
	}
	public function tel_enc_ext(){

		return $this->tel_enc_ext;
	}
	public function email_enc_ext(){

		return $this->email_enc_ext;
	}
	public function idEtudiant(){

		return $this->idEtudiant;
	}

	// infos sur le stage.
	public function intitule(){

		return $this->intitule;
	}
	public function date_debut(){

		return $this->date_debut;
	}
	public function date_fin(){

		return $this->date_fin;
	}

}