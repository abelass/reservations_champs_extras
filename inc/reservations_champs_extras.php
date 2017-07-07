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
 * Pépare les saisies pour l'objet demandé
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
			),
			'saisies' => array(
				array(
					'saisie' => 'hidden',
					'options' => array(
						'nom' => 'traitement',
						'valeur_forcee' => 'options',
					),
				),
			),
		),
	);

	foreach ($champs_extras as $index => $saisie) {
		$nom = $saisie['options']['nom'];
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
						'nom' => $objet . '_' . $nom. '_active',
						'label' => _T('reservations_champs_extras:champs_extras_active_label'),
						'defaut' => 'on',
						'valeur_non' => 'off',
					)
				),
				array(
					'saisie' => 'oui_non',
					'options' => array(
						'nom' => $objet . '_' . $nom. '_obligatoire',
						'label' => _T('reservations_champs_extras:champs_extras_obligatoire_label'),
						'defaut' => $saisie['options']['obligatoire'],
						'valeur_non' => 'off',
						'afficher_si' => '@' . $objet . '_' . $nom. '_active' . '@ == "on"',
					)
				)
			)
		);
	}

	return $saisies;
}

/**
 * Charge la configuration dans les formulaires.
 *
 * @param array $champs_extras
 *        La définition des champs extras utilisés.
 * @param array $configuration
 *        La configuration 'a utiliser.
 * @param string $objet.
          l'objet des champs extras.
 *
 * @return array
 *        la définition des champs extras.
 */
function rce_configuration_charger($champs_extras, $configuration, $objet) {

	foreach ($champs_extras AS $index => $saisie) {
		if (isset($configuration[$objet . '_' . $saisie['options']['nom'] . '_active']) AND 
			$configuration[$objet . '_' . $saisie['options']['nom'] . '_active'] == 'off') {
			unset($champs_extras[$index]);
		}
		elseif(isset($configuration[$objet . '_' . $saisie['options']['nom'] . '_obligatoire'])) {
			$champs_extras[$index]['options']['obligatoire'] = $configuration[$objet . '_' . $saisie['options']['nom'] . '_obligatoire'] == 'on' ? 'oui' : '';
		}
	}
	return $champs_extras;
}
