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

function reservations_champs_extras_recuperer_fond($flux) {
	include_spip('inc/reservations_champs_extras');
	$fond = $flux['args']['fond'];
	$contexte = $flux['data']['contexte'];

	if ($fond == 'inclure/generer_saisies' &&
			isset($contexte['_action']) &&
			isset($contexte['_action'][0]) &&
			$contexte['_action'][0] == 'editer_reservation') {

		$flux['data']['texte'] = recuperer_fond('inc/reservations_champs_extras', $flux['data']['contexte']['saisies']);
	}


	return $flux;
}
