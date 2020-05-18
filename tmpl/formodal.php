<?php
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
?>
	<h2>
		<?php echo $member['Squadron']; ?>
	</h2>
	<h3>
		<?php echo $member['Name']; ?>
	</h3>
	<div id='roster_data' style="width:700px; vertical-align:text-top;">
	<?php echo $member['certno']; ?>
	<br />
	<div>
		<h6>Contact Information:</h6>
		<p>
			<!--<label> Address:</label>-->		
			<?php echo "&nbsp;&nbsp;&nbsp;".$member['Address'][0];?> 
		<br />
			<!--<label>City: </label>-->
			&nbsp;&nbsp;&nbsp;<?php echo $member['Address'][1];?>
		<br />
			<!--<label>Telephone:</label>-->
			&nbsp;&nbsp;&nbsp;<?php echo $member['Address'][2];?>
			<!--<label>Cell Phone:</label>-->
			&nbsp;&nbsp;<?php echo $member['Address'][3];?>
			<!--<label>Email Address: </label>-->
		<br>
			&nbsp;&nbsp;&nbsp;(Email:)<?php echo $member['Address'][4];?>
		</p>
	</div>
	<?php 
		if ($member['boat']['boat_name'] != '' ){
	?>
		<div>
		<h6>Boat Information:</h6>
			<p>
				<!--&nbsp;&nbsp;&nbsp;<label>Boat Name: </label>-->
				&nbsp;&nbsp;&nbsp;Boat Name: <?php echo $member['boat']['boat_name'];?>
			<br>
				<!--&nbsp;&nbsp;&nbsp;<label>Home Port: </label>-->
				&nbsp;&nbsp;&nbsp;Home Port: <?php echo $member['boat']['home_port'];?>
			<br>
				<!--&nbsp;&nbsp;&nbsp;<label>Boat Type : </label>-->
				&nbsp;&nbsp;&nbsp;Boat Type: <?php echo $member['boat']['boat_type'];?>
			<br>
				<!--&nbsp;&nbsp;&nbsp;<label>MMSI: </label>-->
				&nbsp;&nbsp;&nbsp;MMSI: <?php echo $member['boat']['mmsi'];?>
		</p>
		</div>
	<?php 
		}
	?>
<!--	//*************************************************************************************-->
<?php 
	if (count($member['natJobs']) != 0){
?>
	<div>
		<h6>USPS National Jobs:</h6>
		<p>
<?php						
			foreach($member['natJobs'] as $desc){
				echo "&nbsp;&nbsp;&nbsp;$desc" ;
				echo "<br>";	
			}
?>			
		</p>
	</div>	
<?php
	}	
	if (count($member['distJobs']) != 0){
?>		
	<div> 
		<h6>District <?php echo $member['distNumber'];?> Jobs:</h6>
		<p>
<?php						
			foreach($member['distJobs'] as $desc){
				echo "&nbsp;&nbsp;&nbsp;$desc" ;
				echo "<br>";	
			}
?>			
		</p>
	</div>	
<?php		
	}	
	if (count($member['sqdJobs']) != 0){
?>		
	<div> 
		<h6><?php echo $member['Squadron'];?> Jobs:</h6>
		<p>
<?php						
			foreach($member['sqdJobs'] as $desc){
				echo "&nbsp;&nbsp;&nbsp;$desc" ;
				echo "<br>";	
			}
?>			
		</p>
	</div>	
<?php		
	}	
?>
	</div>
<?php 
