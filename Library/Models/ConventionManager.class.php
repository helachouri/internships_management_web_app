<?php
namespace Library\Models;

abstract class ConventionManager extends \Library\Manager {

	abstract public function declareInfos(\Library\Entities\Convention $convention);

	//abstract public function modifyInfos(\Library\Entities\Convention $convention); // uniquement pour le DARE.

	abstract public function getConvention($id_etudiant); // Renvoie la convention  d'un etudiant.

}