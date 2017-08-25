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
	//print $fond;
	if ($fond == 'inclure/generer_saisies' &&
			isset($contexte['_action']) &&
			isset($contexte['_action'][0]) &&
			$contexte['_action'][0] == 'editer_reservation') {
				print '<pre>';
				//print_r($contexte);
				print '</pre>';
				$champs_extras = $contexte['saisies'];

		//$contexte['saisies'] = rce_configuration_charger($champs_extras, $configuration, $objet);

	}

	return $flux;
}
