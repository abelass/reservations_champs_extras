<?php
/**
 * Utilisations de pipelines par Réservations Champs Extras
 *
 * @plugin     Réservations Champs Extras
 * @copyright  2017
 * @author     Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Reservations_champs_extras\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Permet de modifier le tableau de valeurs envoyé par la fonction charger d’un formulaire CVT
 *
 * @pipeline formulaire_charger
 *
 * @param array $flux
 *        	Données du pipeline
 * @return array Données du pipeline
 */
function reservations_champs_extras_formulaire_charger($flux) {
	$form = $flux['args']['form'];
	if (in_array($form, array('reservation', 'editer_reservation'))) {
		$options_champs_extras = isset($flux['data']['options']['champs_extras']) ?
			$flux['data']['options']['champs_extras'] :
			array();

	}
	return $flux;
}
