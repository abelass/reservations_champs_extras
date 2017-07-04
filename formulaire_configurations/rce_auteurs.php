<?php

/**
 * Définition d'une configuration pour Téservation Formulaires
 *
 * @plugin     Réservations Champs Extras
 * @copyright  2017
 * @author     Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Reservations_champs_extras\Formulaire_configuration
 */

function formulaire_configurations_rce_auteurs_dist($valeurs) {
	include_spip('cextras_pipelines');
	$champs_extras = champs_extras_objet(table_objet_sql('auteur'));

	include_spip('inc/iextras');
	$saisies = iextras_champs_extras_definis( table_objet_sql('auteur') );

	return array (
		'nom' => _T('reservations_champs_extras:nom_formulaire_configuration_champs_extras_auteurs'),
		'saisies' => array (
			array (
				'saisie' => 'oui_non',
				'options' => array (
					'nom' => 'champs_extras_auteurs_active',
					'label' => _T('reservations_champs_extras:champs_extras_auteurs_active_label'),
					'obligatoire' => 'oui'
				),
			),
			$saisies,
		),
		'champs_extras' => $saisies,
	);

}