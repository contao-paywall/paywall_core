<?php

array_insert($GLOBALS['BE_MOD']['subscription'], 0, array
(
	'subscription_list' => array
	(
		'tables'             => array('tl_subscription'),
		'icon'               => 'system/modules/paywall_core/assets/icons/list.png',
		'setGrp'             => array('BackendSubscription', 'syncSubscription'),
		'importSubscription' => array('BackendSubscription', 'importSubscription')
	),
	'subscription_type' => array
	(
		'tables'             => array('tl_subscription_type'),
		'icon'               => 'system/modules/paywall_core/assets/icons/types.png'
	),
	'subscription_setting' => array
	(
		'tables'             => array('tl_subscription_setting'),
		'icon'               => 'system/modules/paywall_core/assets/icons/settings.png'
	)
));

if(\Config::Get('paywallCron'))
{
	$GLOBALS['TL_CRON'][\Config::Get('paywallCron')]['SubscriptionCron'] = array('Job', 'syncSubscription');
}

if(!\Config::Get('paywallDisplayname'))
{
	\Config::set('paywallDisplayname', 'CONCAT(firstname, " ", lastname)');
	\Config::persist('paywallDisplayname', 'CONCAT(firstname, " ", lastname)');
}

$GLOBALS['TL_HEAD']['PIXELSPREADDE'] = '<!--
    This Contao OpenSource CMS uses modules from pixelSpread.de
    Copyright (c)2012 - ' . date("Y") . ' by Sascha Brandhoff :: Extensions of pixelSpread.de are copyright of their respective owners
    Visit our website at http://www.pixelSpread.de for more information
//-->';