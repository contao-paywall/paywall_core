<?php

$GLOBALS['TL_DCA']['tl_subscription_setting'] = array
(
	'config' => array
	(
		'dataContainer'               => 'File',
		'closed'                      => true
	),
	'palettes' => array
	(
		'default'                     => '{cron_legend},paywallCron;{group_legend},paywallGroups'
	),
	'fields' => array
	(
		'paywallGroups' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_subscription_setting']['paywallGroups'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkboxWizard',
			'foreignKey'              => 'tl_member_group.name',
			'eval'                    => array('multiple'=>true, 'feEditable'=>true, 'feGroup'=>'login'),
			'relation'                => array('type'=>'belongsToMany', 'load'=>'lazy')
		),
		'paywallCron' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_subscription_setting']['paywallCron'],
			'inputType'               => 'select',
			'search'                  => false,
			'options'                 => array('monthly', 'weekly', 'daily', 'hourly', 'minutely'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_subscription_setting']['cron_option'],
			'eval'                    => array('mandatory'=>false, 'tl_class'=>'w50', 'includeBlankOption'=>true)
		)
	)
);