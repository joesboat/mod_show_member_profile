<?php
/**
 * @package		mod_showMemberProfile
 * @subpackage	Helper code for showMemberProfile module.
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
jimport('usps.tableAccess');
jimport('usps.tableD5VHQAB');
jimport('usps.includes.routines');
jimport('usps.Joes_factory');
class modShowMemberProfileHelper
{
	static function getMemberData($certno){
		$vhqab = JoeFactory::getLibrary("USPSd5tableVHQAB");
		$aMbr = array();
		$aMbr['certno'] = $certno;
		$aMbr['Name'] = $vhqab->getMemberNameAndRank($certno);
		$aMbr['Address'][] = $vhqab->getMemberAddress($certno);
		$aMbr['Address'][] = $vhqab->getMemberCityStateZip($certno);
		$aMbr['Address'][] = "(H) ".$vhqab->getMemberPhone($certno);
		$aMbr['Address'][] = "(C) ".$vhqab->getMemberCellPhone($certno);
		$aMbr['Address'][] = $vhqab->getMemberEmail($certno);
		$aMbr['Squadron'] = $vhqab->getSquadronNameFromMember($certno);
		$aMbr['squad_no'] = $vhqab->getSquadNumber($certno);
		$year = $vhqab->getSquadronDisplayYear($aMbr['squad_no']);
		$aMbr['sqdJobs'] = $vhqab->getSquadronJobs($certno,$year);
		$aMbr['distNumber'] = "USPS District " . $vhqab->getDistrictNumber($certno);
		$year = $vhqab->getSquadronDisplayYear(6243);
		$aMbr['distJobs'] = $vhqab->getDistrictJobs($certno,$year);
		$year = $vhqab->getSquadronDisplayYear(9000);
		$aMbr['natJobs'] = $vhqab->getNationalJobs($certno,$year);
		$aMbr['boat'] = $vhqab->getMembersBoatData($certno);
		// $vhqab->close();
		return $aMbr;
	}
}
