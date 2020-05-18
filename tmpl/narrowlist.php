<?php
/**
 * @package		mod_showMemberProfile
 * @subpackage	Default display for showMemberProfile module.
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">
<!--Rank, Name, Grade-->
<h4 class='text-left'> <?php echo $member['Name']; ?> </h4>
<!--Contact Information-->
<ul class='list-unstyled'>
<li>
	<ul >
<?php 
	foreach($member['Address'] as $line){
		echo "<li>$line</li>";
	}
?>
	</ul>
</li>
<br/>
<!--Squadron Information-->
<li><?php echo $member['Squadron'] . " Jobs"; ?></li>
<?php if (count($member['sqdJobs']) > 0) : ?>
<li>
<ul>
<?php 
	foreach($member['sqdJobs'] as $job){
		echo "<li>$job</li>";
	}
?>
</ul>
</li>
<?php endif ; ?>
<br/>
<!--District Informatio-->
<li><?php echo $member['distNumber'] . " Jobs";  ?></li>
<?php if (count($member['sqdJobs']) > 0) : ?>
<li>
<ul>
<?php 
	foreach($member['distJobs'] as $job){
		echo "<li>$job</li>";
	}
?>
</ul>
</li>
<?php endif; ?>
<br/>
<!--National Information-->
<?php if (count($member['natJobs']) > 0) : ?>
<li>
<ul>
<?php 
	echo "USPS National Jobs";
	foreach($member['natJobs'] as $job){
		echo "<li>$job</li>";
	}
?>
</ul>
</li>
<?php endif; ?>

</ul>
<P>
	<a class='btn btn-large btn-info ' href='cgi-bin-nat/tools/myprofile.cgi' ><i class="fa fa-spinner fa-spin"></i> Manage Profile</a>
</P>
</form>
