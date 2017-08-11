<?php
namespace Library\Models;

use \Library\Entities\OffresStages;

class OffresStagesManager_PDO extends OffresStagesManager {
	
	protected $db;

	public function __construct(\PDO $db) {
		
		$this->db = $db;
	}

	public function add(OffresStages $offre) {
		
		$requete = $this->db->prepare("INSERT INTO offresstages(titre,contenu,contact,type,dateAjout,dateModif) VALUES(:titre,:contenu,:contact,:type,NOW(),NOW())");
		$requete->execute(array('titre' => $offre->titre(),
								'contenu' => $offre->contenu(),
								'contact' => $offre->contact(),
								'mail_contact' => $offre->mail_contact(),
								'num_contact' => $offre->num_contact(),
								'type' => $offre->type()
								));
	}

	public function count() {

		return $this->db->query('SELECT COUNT(*) FROM offresstages')->fetchColumn();
	}

	public function delete($id) {

		$this->db->exec('DELETE FROM offresstages WHERE id = '.(int) $id);
	}

	public function getList($debut = -1, $limite = -1) {

		$sql = 'SELECT id, contact, titre, contenu, type, dateAjout, dateModif FROM offresstages ORDER BY id DESC';
		
		if ($debut != -1 || $limite != -1) {

			$sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
		}

		$requete = $this->db->query($sql);
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\OffresStages');
		$listeOffres = $requete->fetchAll();

		foreach ($listeOffres as $offre) {
			
			$offre->setDateAjout(new \DateTime($offre->dateAjout()));
			$offre->setDateModif(new \DateTime($offre->dateModif()));
		}

		$requete->closeCursor();
		return $listeOffres;
	}

	public function getUnique($id) {
	
		$requete = $this->db->prepare('SELECT id, contact, titre, contenu, type, DATE_FORMAT (dateAjout, \'le %d/%m/%Y à %Hh%i\') AS dateAjout, DATE_FORMAT (dateModif, \'le %d/%m/%Y à %Hh%i\') AS dateModif FROM offresstages WHERE id = :id');
		$requete->bindValue(':id', (int) $id, \PDO::PARAM_INT);
		$requete->execute();
		$requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\Library\Entities\OffresStages');
		
		return $requete->fetch();

		
	}

	public function update(OffresStages $offre) {
	
		$requete = $this->db->prepare('UPDATE offresstages SET contact = :contact, titre = :titre, contenu = :contenu, type = :type, dateModif = NOW() WHERE id = :id');
		$requete->bindValue(':titre', $offre->titre());
		$requete->bindValue(':contact', $offre->contact());
		$requete->bindValue(':contenu', $offre->contenu());
		$requete->bindValue(':type', $offre->type());
		$requete->bindValue(':id', $offre->id(), \PDO::PARAM_INT);
		$requete->execute();
	}

	public function save(OffresStages $offre) { 

		if ($offre->isValid()) {
			
			$offre->isNew() ? $this->add($offre) : $this->update($offre);
		}

		else {

			throw new RuntimeException('L\'offre doit être valide pour être enregistrée');
		}
	}

}