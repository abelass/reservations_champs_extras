<?php
/**
 * Fonctions de Réservations Champs Extra.
 *
 * @plugin     Réservations Champs Extras
 * @copyright  2017
 * @author     Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Reservations_champs_extras\Inc
 */

/**
 * Pépare les saisies our l'objet demandé
 *
 * @param string $objet.
 *        l'objet
 *
 * @return array
 *        Les saisies.
 */
function rce_saisies_objet($objet) {
	include_spip('cextras_pipelines');

	$table = table_objet_sql($objet);
	$desc = lister_tables_objets_sql($table);
	$champs_extras = champs_extras_objet($table);
	$saisies = array(
		'saisies' => array(
			'saisie' => 'fieldset',
			'options' => array(
				'nom' => 'specifique',
				'label' => _T($desc['texte_objets'])
			)
		)
	);

	foreach ($champs_extras as $index => $saisie) {
		$saisies['saisies']['saisies'][] = array(
			'saisie' => 'fieldset',
			'options' => array(
				'nom' => 'specifique',
				'label' => $saisie['options']['label']
			),
			'saisies' => array(
				array(
					'saisie' => 'oui_non',
					'options' => array(
						'nom' => $objet . '_' . $saisie['options']['nom'] . '_active',
						'label' => _T('reservations_champs_extras:champs_extras_active_label'),
						'obligatoire' => 'oui',
						'defaut' => 'on'
					)
				),
				array(
					'saisie' => 'oui_non',
					'options' => array(
						'nom' => $objet . '_' . $saisie['options']['nom'] . '_obligatoire',
						'label' => _T('reservations_champs_extras:champs_extras_obligatoire_label'),
						'obligatoire' => 'oui',
						'defaut' => $saisie['options']['obligatoire']
					)
				)
			)
		);
	}

	return $saisies;
}