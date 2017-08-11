<?php
namespace Library\Models;

use \Library\Entities\Convention;

class ConventionManager_PDO extends ConventionManager {
	
	protected $db;

	public function __construct(\PDO $db) {
		
		$this->db = $db;
	}

	public function declareInfos(Convention $convention){

		try {
			$requete = $this->db->prepare("INSERT INTO `convention` (`entreprise`, `adresse`, `ville`, `pays`, `fax`, `civilite_par`, `nom_par`, `prenom_par`, `fonction_par`, `tel_par`, `email_par`, `civilite_enc_ext`, `nom_enc_ext`, `prenom_enc_ext`, `fonction_enc_ext`, `tel_enc_ext`, `email_enc_ext`, `idEtudiant`, `intitule`, `date_debut`, `date_fin`) VALUES (:entreprise,:adresse,:ville,:pays,:fax,:civilite_par,:nom_par,:prenom_par,:fonction_par,:tel_par,:email_par,:civilite_enc_ext,:nom_enc_ext,:prenom_enc_ext,:fonction_enc_ext,:tel_enc_ext,:email_enc_ext,:idEtudiant,:intitule,:date_debut,:date_fin);");
		
			$requete->bindValue(':entreprise', $convention->entreprise());
			$requete->bindValue(':adresse', $convention->adresse());
			$requete->bindValue(':ville', $convention->ville());
			$requete->bindValue(':pays', $convention->pays());
			$requete->bindValue(':fax', $convention->fax());
			$requete->bindValue(':civilite_par', $convention->civilite_par());
			$requete->bindValue(':nom_par', $convention->nom_par());
			$requete->bindValue(':prenom_par', $convention->prenom_par());
			$requete->bindValue(':fonction_par', $convention->fonction_par());
			$requete->bindValue(':tel_par', $convention->tel_par());
			$requete->bindValue(':email_par', $convention->email_par());
			$requete->bindValue(':civilite_enc_ext', $convention->civilite_enc_ext());
			$requete->bindValue(':nom_enc_ext', $convention->nom_enc_ext());
			$requete->bindValue(':prenom_enc_ext', $convention->prenom_enc_ext());
			$requete->bindValue(':fonction_enc_ext', $convention->fonction_enc_ext());
			$requete->bindValue(':tel_enc_ext', $convention->tel_enc_ext());
			$requete->bindValue(':email_enc_ext', $convention->email_enc_ext());
			$requete->bindValue(':idEtudiant', $convention->idEtudiant());
			$requete->bindValue(':intitule', $convention->intitule());
			$requete->bindValue(':date_debut', $convention->date_debut());
			$requete->bindValue(':date_fin', $convention->date_fin());
			$requete->execute();

		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function getConvention($idEtudiant){

		$requete = $this->db->prepare('SELECT entreprise,adresse,ville,pays,fax,civilite_par,nom_par,prenom_par,fonction_par,tel_par,email_par,civilite_enc_ext,nom_enc_ext,prenom_enc_ext,fonction_enc_ext,tel_enc_ext,email_enc_ext,idEtudiant,intitule,date_debut,date_fin FROM convention WHERE idEtudiant = :idEtudiant');
		$requete->bindValue(':idEtudiant', (int) $idEtudiant, \PDO::PARAM_INT);
		$requete->execute();
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\Convention');
		
		return $requete->fetch();
	}
}