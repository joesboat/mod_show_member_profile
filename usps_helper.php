<?php
/**
 * @package		mod_showMemberProfile
 * @subpackage	Helper code for showMemberProfile module.
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
jimport('USPS.tableAccess');
jimport('USPS.tableVHQAB');
jimport('USPS.includes.routines');
class modShowMemberProfileHelper
{
	static function getMemberData(){
		$user = JFactory::getUser();
		$certno = $user->username;
		$mbr = new USPStableVHQAB();
		$aMbr = array();
		$aMbr['Name'] = $mbr->getMemberNameAndRank($certno);
		$aMbr['Address'] = $mbr->getMemberAddress($certno);
		$aMbr['Squadron'] = $mbr->getSquadronName($certno);
		$aMbr['sqdJobs'] = $mbr->getSquadronJobs($certno);
		$aMbr['distJobs'] = $mbr->getDistrictJobs($certno);
		$aMbr['distNumber'] = $mbr->getDistrictNumber($certno);
		$aMbr['natJobs'] = $mbr->getNationalJobs($certno);
		$mbr->close();
		return $aMbr;
	}
}
