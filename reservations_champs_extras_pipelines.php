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
	$fond = $flux['args']['fond'];
	$contexte = $flux['data']['contexte'];


	if ($fond == 'inclure/generer_saisies' &&
			isset($contexte['_action']) &&
			isset($contexte['_action'][0]) &&
			isset($contexte['champs_extras_reservations']) &&
			$contexte['_action'][0] == 'editer_reservation' &&
			!isset($contexte['reloaded']) AND
			include_spip('inc/reservations_champs_extras') &&
			tester_champs_extras_objet($contexte['champs_extras_reservations'], $contexte['saisies'])) {
				print 'ok';


		$flux['data']['contexte']['saisies'] = $contexte['champs_extras_reservations'];
		$flux['data']['contexte']['reloaded'] = 'reservations_champs_extras';
		$flux['data']['texte'] = recuperer_fond('inclure/generer_saisies', $flux['data']['contexte']);
	}


	return $flux;
}
