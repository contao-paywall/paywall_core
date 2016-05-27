<?php

$GLOBALS['TL_DCA']['tl_subscription'] = array
(
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'onsubmit_callback'           => array
		(
			array('tl_subscription', 'onsubmit_callback')
		),
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
			'fields'                  => array('group_id'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;sort,limit',
		),
		'label' => array
		(
			'fields'                  => array('member', 'subscription_type:tl_subscription_type.title', 'group_id', 'start', 'stop', 'active'),
			'showColumns'             => true,
			'label_callback'          => array('tl_subscription', 'label_callback')
		),
		'global_operations' => array
		(
			'setGrp' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_subscription']['setGrp'],
				'href'                => 'key=setGrp',
				'class'               => 'header_sync',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'importSubscription' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_subscription']['importSubscription'],
				'href'                => 'key=importSubscription',
				'class'               => 'header_css_import',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
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
				'label'               => &$GLOBALS['TL_LANG']['tl_subscription']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_subscription']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_subscription']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_subscription']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),
	'palettes' => array
	(
		'__selector__'                => array('type'),
		'default'                     => '{title_legend},type',
		'byUndefined'                 => '{title_legend},type;{member_legend},member,group_id;{valid_legend},start,stop',
		'byDefined'                   => '{title_legend},type;{member_legend},member;{subscription_legend},group_id,subscription_type;{valid_legend},start',
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
		'type' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_subscription']['type'],
			'inputType'               => 'select',
			'options'                 => array('byDefined', 'byUndefined'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_subscription']['type_option'],
			'exclude'                 => true,
			'filter'                  => true,
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50', 'submitOnChange'=>true, 'includeBlankOption'=>true),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'subscription_type' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_subscription']['subscription_type'],
			'inputType'               => 'select',
			'foreignKey'              => 'tl_subscription_type.title',
			'exclude'                 => true,
			'filter'                  => true,
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50', 'chosen'=>true, 'submitOnChange'=>true),
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'group_id' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_subscription']['group_id'],
			'inputType'               => 'select',
			'foreignKey'              => 'tl_member_group.name',
			'exclude'                 => true,
			'filter'                  => true,
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50', 'chosen'=>true),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'member' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_subscription']['member'],
			'inputType'               => 'select',
			'foreignKey'              => 'tl_member.' . \Config::get('paywallDisplayname'),
			'exclude'                 => true,
			'filter'                  => true,
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w50', 'chosen'=>true),
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'start' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_subscription']['start'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 6,
			'eval'                    => array('rgxp'=>'date', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
		'stop' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_subscription']['stop'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 6,
			'eval'                    => array('rgxp'=>'date', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
		'active' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_subscription']['active'],
			'inputType'               => 'checkbox',
			'exclude'                 => true,
			'filter'                  => true,
			'sorting'                 => true,
			'flag'                    => 11,
			'eval'                    => array(),
			'sql'                     => "char(1) NOT NULL default ''"
		)
	)
);

class tl_subscription extends Backend
{
	public function onsubmit_callback($dc)
	{
		if($dc->activeRecord->type == 'byDefined')
		{
			$objType = \SubscriptionTypeModel::findById($dc->activeRecord->subscription_type);
			$objSubscription = \SubscriptionModel::findById($dc->activeRecord->id);

			$objSubscription->stop = ($dc->activeRecord->start + ($objType->runtime * 60 * 60 * 24));
			$objSubscription->save();
		}
	}

	public function label_callback($row, $label, $dc, $fields)
	{
		$objSubscription = \SubscriptionModel::findById($row['id']);

		if(!$row['stop'])
		{
			$objSubscription->active = '1';
			$fields[5] = $GLOBALS['TL_LANG']['MSC']['yes'];
		}
		else
		{
			if($row['stop'] < time())
			{
				$objSubscription->active = '';
				$field[5] = $GLOBALS['TL_LANG']['MSC']['no'];
			}
			elseif($row['stop'] > time())
			{
				$objSubscription->active = '1';
				$fields[5] = $GLOBALS['TL_LANG']['MSC']['yes'];
			}
		}

		if($objSubscription->active == '1')
		{
			$dotColor = 'green';
		}
		else
		{
			$dotColor = 'red';
		}

		$objSubscription->save();

		$objGroup  = \MemberGroupModel::findById($fields[2]);

		$fields[0] = $this->getDisplayname($fields[0], \Config::Get('paywallDisplayname'));
		$fields[2] = $objGroup->name;
		$fields[5] = \Image::getHtml('system/modules/paywall_core/assets/icons/dot-' . $dotColor . '.png');

		if($row['type'] == 'byUndefined')
		{
			$fields[1] = $GLOBALS['TL_LANG']['tl_subscription']['type_option_list']['byUndefined'];
		}

		return $fields;
	}

        public function getDisplayname($id, $strSQL)
	{
		return $this->Database->prepare("SELECT " . $strSQL . " AS returnVal FROM tl_member WHERE id=?")->execute($id)->returnVal;
	}
}