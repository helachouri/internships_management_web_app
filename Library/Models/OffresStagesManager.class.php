<?php
namespace Library\Models;

abstract class OffresStagesManager extends \Library\Manager {

	
	abstract public function add(\Library\Entities\OffresStages $offre);
	

	abstract public function count(); // Renvoie le nombre d'offres total.
	
	
	abstract public function delete($id);


	abstract public function getList($debut = -1, $limite = -1); /* Retourne un array d'offres demandées chaque 
																	entrée est une instance de OffresStages. */

	
	abstract public function getUnique($id); // Retourne une offre précise.
	
	
	abstract public function save(\Library\Entities\OffresStages $offre); // Permet d'enregistrer une offre.

	
	abstract public function update(\Library\Entities\OffresStages $offre); // Permet de modifier une offre.
}