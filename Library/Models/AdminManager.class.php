<?php
namespace Library\Models;

abstract class AdminManager extends \Library\Manager {

	abstract public function lire_infos_utilisateur($id);

	abstract public function combinaison_connexion_valide($login, $pass);

}
