<?php
/**
 * @package		mod_showMemberProfile
 * @subpackage	Main showMemberProfile module.
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
//include($_SERVER['CONTEXT_DOCUMENT_ROOT']."/applications/setupJoomlaAccess.php");
defined('_JEXEC') or die;
jimport('usps.includes.routines');

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';
$jinput = $app->input;
$certno = $jinput->get("certno");
if (isset($certno)){
	// It's a call from another module.  Use $certno
	$member	= modshowMemberProfileHelper::getMemberData($certno);
} else {
	// With no input use the logged in member
	$user = JFactory::getUser();
	$member	= modshowMemberProfileHelper::getMemberData($user->username);
}


$params->def('greeting', 1);


require JModuleHelper::getLayoutPath('mod_show_member_profile', $params->get('layout', 'default'));
