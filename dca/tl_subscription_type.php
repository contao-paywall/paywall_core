<?php

$GLOBALS['TL_DCA']['tl_subscription_type'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id'                      => 'primary',
			)
		)
	),
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 2,
			'fields'                  => array('title', 'runtime'),
			'flag'                    => 12,
			'panelLayout'             => 'sort,search,limit',
		),
	        'label' => array
	        (
			'fields'                  => array('title', 'runtime'),
			'showColumns'             => true
	        ),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_subscription_type']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_subscription_type']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_subscription_type']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_subscription_type']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),
	'palettes' => array
	(
		'default'                     => '{title_legend},title;{time_legend},runtime;{description_legend:hide},text',
	),
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_subscription_type']['title'],
			'default'                 => '',
			'inputType'               => 'text',
			'exclude'                 => true,
			'search'                  => true,
			'sorting'                 => true,
			'flag'                    => 11,
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255,'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'runtime' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_subscription_type']['runtime'],
			'default'                 => '0',
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 12,
			'eval'                    => array('rgxp'=>'digit', 'mandatory'=>true, 'maxlength'=>255,'tl_class'=>'w50'),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'text' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_subscription_type']['text'],
			'inputType'               => 'textarea',
			'exclude'                 => true,
			'eval'                    => array('mandatory'=>false, 'rte'=>'tinyMCE', 'tl_class'=>'clr'),
			'sql'                     => "text NOT NULL"
		)
	)
);