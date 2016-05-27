<?php

namespace Subscription\Model;

class SubscriptionModel extends \Model
{
	protected static $strTable = 'tl_subscription';

	public static function findByMemberId($intMemberId, array $arrOptions=array())
	{
		$t = static::$strTable;
		$arrColumns = array("$t.member = $intMemberId");

		return static::findBy($arrColumns, null, $arrOptions);
	}

	public static function findActiveByMemberId($intMemberId, array $arrOptions=array())
	{
		$t = static::$strTable;
		$arrColumns[] = "$t.member = $intMemberId";

		$time = \Date::floorToMinute();
		$arrColumns[] = "($t.start='' OR $t.start<='$time') AND ($t.stop='' OR $t.stop>'" . ($time + 60) . "')";

		return static::findBy($arrColumns, null, $arrOptions);
	}
}
