<?php
namespace Library\Models;

abstract class EtudiantManager extends \Library\Manager {

	abstract public function inquireInfos(\Library\Entities\Etudiant $etudiant);

	abstract public function getEtudiant($id); // Renvoie les infos sur un etudiant.

	abstract public function getInes($ine); // Renvoie la listes des INEs selon l'année.

	abstract public function getFiliere($filiere); // Renvoie la listes des INEs selon la filière.

}