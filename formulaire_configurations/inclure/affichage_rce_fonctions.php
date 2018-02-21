<?php
/**
 * Fonctions pour affichage_rce.html
 *
 * @plugin     Réservations Champs Extras
 * @copyright  2017
 * @author     Rainer Müller
 * @licence    GNU/GPL
 * @package    SPIP\Reservations_champs_extras\Formulaire configurations
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

include_spip('inc/reservations_formulaires');
include_spip('inc/cextras');

/**
 * Attribue le label à un champ
 *
 * @param  string $objet objet spip.
 *
 * @return array       Données du pipeline
 */
function rce_noms_champs($objet) {

	$saisies = cextras_obtenir_saisies_champs_extras($objet);
	$champs = array();
	foreach ($saisies AS $champ => $donnees) {
		$champs[$donnees['options']['nom']] = extraire_multi($donnees['options']['label']);
	}

	return $champs;
}