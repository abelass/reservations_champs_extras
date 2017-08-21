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
 * Prépare les saisies pour l'objet auteur.
 *
 * @param array $valeurs.
 *        Les valeurs par défaut du formulaire.
 *
 * @return array
 *        Les valeurs.
 */
function formulaire_configurations_rce_auteurs_dist($valeurs) {
	$saisies = rce_saisies_objet('auteur');
	return array (
		'nom' => _T('reservations_champs_extras:nom_formulaire_configuration_champs_extras_auteurs'),
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
function formulaire_configurations_rce_auteurs_charger_dist($type, $valeurs, $configuration) {
	$champs_extras = saisies_lister_par_nom($valeurs['champs_extras_auteurs']);
	$valeurs['champs_extras_auteurs'] = rce_configuration_charger($champs_extras, $configuration, 'auteur');
	return $valeurs;
}

/**
 * Implémente le vérifications des champs extras auteur dans le formulaire reservation.
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
function formulaire_configurations_rce_auteurs_verifier_dist($type, $valeurs, $configuration) {
	$valeurs = rce_verifier_champs($valeurs, $configuration, 'auteur');
	return $valeurs;
}
