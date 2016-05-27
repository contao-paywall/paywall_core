<?php

ClassLoader::addNamespaces(array
(
	'Subscription\Classes',
	'Subscription\Frontend',
	'Subscription\Model',
	'Subscription\Payment',
	'Subscription\Elements'
));
 
ClassLoader::addClasses(array
(
	'Subscription\Model\SubscriptionModel'               => 'system/modules/paywall_core/models/SubscriptionModel.php',
	'Subscription\Model\SubscriptionTypeModel'           => 'system/modules/paywall_core/models/SubscriptionTypeModel.php',

	'Subscription\Classes\BackendSubscription'           => 'system/modules/paywall_core/classes/System/BackendSubscription.php',
	'Subscription\Classes\Job'                           => 'system/modules/paywall_core/classes/System/Job.php'
));

TemplateLoader::addFiles(array
(
	'import_subscription' => 'system/modules/paywall_core/templates/backend',
));