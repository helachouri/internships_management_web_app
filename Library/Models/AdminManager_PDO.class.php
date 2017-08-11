<?php
namespace Library\Models;

use \Library\Entities\Etudiant;

class AdminManager_PDO extends AdminManager {

	protected $db;

	public function __construct(\PDO $db) {

		$this->db = $db;
	}

	public function lire_infos_utilisateur($id) {

		$requete = $this->db->prepare("SELECT login, pass, nom, prenom FROM admins WHERE id = :id");
		$requete->bindValue(':id', $id);
		$requete->execute();

		if ($result = $requete->fetch(\PDO::FETCH_ASSOC)) {

			$requete->closeCursor();
			return $result;
		}
		return false;
	}

	public function combinaison_connexion_valide($login, $pass) {

		$requete = $this->db->prepare("SELECT id FROM admins WHERE login = :login AND pass = :pass");
		$requete->bindValue(':login', $login);
		$requete->bindValue(':pass', $pass);
		$requete->execute();

		if ($result = $requete->fetch(\PDO::FETCH_ASSOC)) {

			$requete->closeCursor();
			return $result['id'];
		}
		return false;
	}
}
