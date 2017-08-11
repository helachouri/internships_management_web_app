<?php
namespace Library\Models;

use \Library\Entities\Etudiant;

class EtudiantManager_PDO extends EtudiantManager {
	
	protected $db;

	public function __construct(\PDO $db) {
		
		$this->db = $db;
	}
	
	public function inquireInfos(Etudiant $etudiant){
	
		$requete = $this->db->prepare('UPDATE etudiant SET email = :email, num_tel = :num_tel, filiere = :filiere WHERE id = :id');
		$requete->bindValue(':email', $etudiant->email());
		$requete->bindValue(':num_tel', $etudiant->num_tel());
		$requete->bindValue(':filiere', $etudiant->filiere());
		$requete->bindValue(':id', $etudiant->id(), \PDO::PARAM_INT);
		$requete->execute();
	}

	public function getEtudiant($id) {
	
		$requete = $this->db->prepare('SELECT id, nom, prenom, email, num_tel, ine, filiere FROM etudiant WHERE id = :id');
		$requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
		$requete->execute();
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Etudiant');
		
		return $requete->fetch();

		
	}

	public function getInes($ine) {
	
		$requete = $this->db->prepare('SELECT id, nom, prenom, email, num_tel, ine, filiere FROM etudiant WHERE ine = :ine ORDER BY nom');
		$requete->bindValue(':ine', $ine, \PDO::PARAM_INT);
		$requete->execute();
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Etudiant');
		
		return $listeEtudiant = $requete->fetchAll();

		
	}

	public function getFiliere($filiere) {
	
		$requete = $this->db->prepare('SELECT id, nom, prenom, email, num_tel, ine, filiere FROM etudiant WHERE filiere = filiere ORDER BY nom');
		$requete->bindValue(':filiere', $filiere, \PDO::PARAM_INT);
		$requete->execute();
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Etudiant');
		
		return $listeEtudiant = $requete->fetchAll();

		
	}

	public function combinaison_connexion_valide($login, $pass) {
		
		$requete = $this->db->prepare("SELECT id FROM etudiant WHERE login = :login AND pass = :pass");
		$requete->bindValue(':login', $login);
		$requete->bindValue(':pass', $pass);
		$requete->execute();
		
		if ($result = $requete->fetch(\PDO::FETCH_ASSOC)) {
			
			$requete->closeCursor();
			return $result['id'];
		}
		return false;
	}

	public function lire_infos_utilisateur($id) {

		$requete = $this->db->prepare("SELECT login, pass, nom, prenom, ine, email, filiere, num_tel FROM etudiant WHERE id = :id");
		$requete->bindValue(':id', $id);
		$requete->execute();
		
		if ($result = $requete->fetch(\PDO::FETCH_ASSOC)) {

			$requete->closeCursor();
			return $result;
		}
		return false;
	}

}
