<?php
/**
 * Définition d'une configuration pour Réservation Formulaires
 *
 * @plugin     Réservations Champs Extras
 * @copyright  2017
 * @author     Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Reservations_champs_extras\Formulaire_configuration
 */

function formulaire_configurations_rce_reservations_dist($valeurs) {
	include_spip('inc/reservations_champs_extras');

	$saisies = rce_saisies_objet('reservation');

	return array (
		'nom' => _T('reservations_champs_extras:nom_formulaire_configuration_champs_extras_reservations'),
		'saisies' => $saisies,
	);

}