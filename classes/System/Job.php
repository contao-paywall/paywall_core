<?php

namespace Subscription\Classes;

class Job extends \Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->Import('Database');
	}

	public function syncSubscription()
	{
		$objMembers = \MemberModel::findAll();
		while($objMembers->next())
		{
			$arrMember[$objMembers->id] = array();
			$objSubscription = \SubscriptionModel::findActiveByMemberId($objMembers->id);
			if($objSubscription !== null)
			{
				while($objSubscription->next())
				{
					$arrMember[$objMembers->id][$objSubscription->group_id] = $objSubscription->group_id;
				}
			}
		}

		$arrGroups = unserialize(\Config::Get('paywallGroups'));
		if(is_array($arrGroups))
		{
			foreach($arrMember as $k=>$v)
			{
				foreach($arrGroups as $group)
				{
					$arrMember[$k][$group] = $group;
				}
			}
		}

		foreach($arrMember as $k=>$v)
		{
			$objMember = \MemberModel::findById($k);
			$objMember->groups = serialize($v);
			$objMember->save();
		}
	}
}