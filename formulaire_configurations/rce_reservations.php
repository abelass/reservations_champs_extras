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

/**
 * Prépare les saisies pour l'objet reservation.
 *
 * @param array $valeurs.
 *        Les valeurs par défaut du formulaire.
 *
 * @return array
 *        Les valeurs.
 */
function formulaire_configurations_rce_reservations_dist($valeurs) {
	$saisies = rce_saisies_objet('reservation');

	return array (
		'nom' => _T('reservations_champs_extras:nom_formulaire_configuration_champs_extras_reservations'),
		'saisies' => $saisies,
	);
}

/**
 * Charge la configuration dans les formulaires.
 *
 * @param string $type
 *        Le type de configuration.
 * @param array $valeurs
 *        Les valeurs par défaut du formulaire.
 * @param array $configuration
					La définition 'a appliquer'.
 *
 * @return array
 *        Les valeurs par défaut du formulaire.
 */
function formulaire_configurations_rce_reservations_charger_dist($type, $valeurs, $configuration) {
	$champs_extras = saisies_lister_par_nom($valeurs['champs_extras_reservations']);
	$valeurs['champs_extras_reservations'] = rce_configuration_charger($champs_extras, $configuration, 'reservation');
	return $valeurs;
}

/**
 * Implémente le vérifications des champs extras reservation dans le formulaire reservation et éditer reservation.
 *
 * @param string $type
 *        Le type de configuration.
 * @param array $valeurs
 *        Les valeurs par défaut du formulaire.
 * @param array $configuration
La définition 'a appliquer'.
 *
 * @return array
 *        Les valeurs par défaut du formulaire.
 */
function formulaire_configurations_rce_reservations_verifier_dist($type, $valeurs, $configuration) {
	$valeurs = rce_verifier_champs($valeurs, $configuration, 'reservation');
	return $valeurs;
}
