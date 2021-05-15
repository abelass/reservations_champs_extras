<?php
/**
 * Utilisations de pipelines par Réservations Champs Extras
 *
 * @plugin     Réservations Champs Extras
 * @copyright  2017  - 2021
 * @author     Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Reservations_champs_extras\Pipelines
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Permet de compléter ou modifier le résultat de la compilation d’un squelette donné..
 *
 * @pipeline recuperer_fond
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
 */
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
		$flux['data']['contexte']['saisies'] = $contexte['champs_extras_reservations'];
		$flux['data']['contexte']['reloaded'] = 'reservations_champs_extras';
		$flux['data']['texte'] = recuperer_fond('inclure/generer_saisies', $flux['data']['contexte']);
	}

	return $flux;
}

/**
 * Permet d'intervenir sur la liste des saisies de champs extras concernant un objet donné.
 *
 * @pipeline declarer_champs_extras
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
 */
function reservations_champs_extras_declarer_champs_extras ($saisies_tables) {
	if (_request('exec') &&
			$id_reservation = _request('id_reservation') AND
			$id_reservation_formulaire = sql_getfetsel('id_reservation_formulaire','spip_reservations','id_reservation=' . $id_reservation)) {
			include_spip('inc/reservations_champs_extras');
			$sql = sql_select('type,configuration,titre',
					'spip_reservation_formulaire_configurations_liens AS liens, spip_reservation_formulaire_configurations AS confs',
					'liens.id_reservation_formulaire_configuration = confs.id_reservation_formulaire_configuration AND objet=' . sql_quote('reservation_formulaire') . ' AND id_objet=' . $id_reservation_formulaire);

			while ($data = sql_fetch($sql)) {
				$type = $data['type'];
				if ($type =='rce_reservations') {
					$configuration = json_decode($data['configuration'], true);
				}
			}

		$saisies_tables['spip_reservations'] = rce_configuration_charger(
				$saisies_tables['spip_reservations'],
				$configuration,
				'reservation');
	}

	return $saisies_tables;
}
