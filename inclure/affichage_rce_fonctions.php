<?php
if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

include_spip('inc/reservations_formulaires');
include_spip('inc/cextras');

function rce_noms_champs($type, $configuration) {

	$saisies = cextras_obtenir_saisies_champs_extras($type);

	if (!is_array($configuration)) {
		$configuration = json_decode($configuration, true);
	}

	$pattern = array('|' . $type . '_|','|_active|', '|_obligatoire|');
	$champs = array();
	foreach (array_keys($configuration) AS $champ_config) {
		$champ_extra = preg_replace($pattern, '', $champ_config);

		$champs[$champ_extra] = $saisies[$champ_extra]['options']['label'];
	}
	unset($champs['traitement']);

	return $champs;
}