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
include_spip('inc/reservations_champs_extras');

function formulaire_configurations_rce_reservations_dist($valeurs) {

	$saisies = rce_saisies_objet('reservation');

	return array (
		'nom' => _T('reservations_champs_extras:nom_formulaire_configuration_champs_extras_reservations'),
		'saisies' => $saisies,
	);
}

function formulaire_configurations_rce_reservations_charger_dist($type, $valeurs, $configuration) {
	$champs_extras = saisies_lister_par_nom($valeurs['champs_extras_reservations']);
	$valeurs['champs_extras_reservations'] = rce_configuration_charger($type, $champs_extras, $configuration, 'reservation');
	return $valeurs;
}
