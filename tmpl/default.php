<?php
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
?>	
	<h2>
		<?php echdo $member['Squadron']; ?>
	</h2>
	<h3>
		<?php echo $member['Name']; ?>
	</h3>
	<div id='roster_data' style="width:700px; vertical-align:text-top;">
	<fieldset id="main">
	<?php echo $member['certno']; ?>
	<br />
	Contact Information:
	<br />
	<!--<label> Address:</label>-->		
	<?php echo "&nbsp;&nbsp;&nbsp;".$member['Address'][0];?> 
	<br />
	<!--<label>City: </label>-->
		&nbsp;&nbsp;&nbsp;<?php echo $member['Address'][1];?>
	<br />
	<!--<label>Telephone:</label>-->
		&nbsp;&nbsp;&nbsp;<?php echo $member['Address'][2];?>
	<!--<label>Cell Phone:</label>-->
		&nbsp;&nbsp;
		<?php echo $member['Address'][3];?>
	<!--<label>Email Address: </label>-->
	<br>
		&nbsp;&nbsp;&nbsp;(Email:)
		<?php echo $member['Address'][4];?>
	<br />
	<?php 
		if ($member['boat']['boat_name'] != '' ){
	?>
		<br />
		Boat Information:
		<br>
		&nbsp;&nbsp;&nbsp;<label>Boat Name: </label>
			<?php echo $member['boat']['boat_name'];?>
		<br>
		&nbsp;&nbsp;&nbsp;<label>Home Port: </label>
			<?php echo $member['boat']['home_port'];?>
		<br>
		&nbsp;&nbsp;&nbsp;<label>Boat Type : </label>
			<?php echo $member['boat']['boat_type'];?>
		<br>
		&nbsp;&nbsp;&nbsp;<label>MMSI: </label>
			<?php echo $member['boat']['mmsi'];?>
	<?php 
		}
	?>
	<br>
	</fieldset>
	</div>
<!--	//*************************************************************************************-->
<?php 
	if (count($member['natJobs']) != 0){
?>
	<div 
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
	<div 
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
	<div 
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
<?php 
//*********************************************************
function format_data_row($row,$n,$dis,$hid){
$lodr = $GLOBALS['lodr'];
	$order = $lodr->search_records_in_order("row_mbr_data = $n","col_mbr_data" ) ;
	$line = "" ;
	foreach($order as $r){
		if (!$hid) $line .= "<label class= >" ;
		if (!$hid) $line .= $r['col_display_name'] ;
		if (!$hid) $line .= "</label> " ;
		switch($r['col_format']){
			case 'checkbox':
				$line .= format_checkbox_field($row,$n,$dis,$hid,$r);
				break;
			default:
				$line .= format_text_field($row,$n,$dis,$hid,$r);
		}
		
	}
	$line .= '<br>' ;
	return $line;
}
//*************************************************************
function format_text_field($row,$n,$dis,$hid,$r){
	$line = '';
	$line .= "<input type=" ;
	if ($hid)
		$line .= '"hidden"' ;
	else
		$line .= '"text"' ;
	$line .= " id=" ;
	$line .= '"' . str_replace("mbr_","",$r['col_name']) . '" ' ; 
	if ($dis) $line .= " readonly " ;
	$line .= 'name="' . $r['col_name'] . '" ' ;
	$line .= 'size="' . $r['col_display_width'] . '" ' ; 
	$line .= 'value="' . $row[$r['col_name']] .'" />' ;  
	return $line;	
}
//*************************************************************
function format_checkbox_field($row,$n,$dis,$hid,$r){
	$line = '';
	$line .= "<input type=" ;
	if ($hid)
		$line .= '"hidden"' ;
	else
		$line .= '"checkbox"' ;
	$line .= " id=" ;
	$line .= '"' . str_replace("mbr_","",$r['col_name']) . '" ' ; 
	if ($dis) $line .= " readonly " ;
	$line .= 'name="' . $r['col_name'] . '" ' ;
	$line .= 'size="' . $r['col_display_width'] . '" ' ;
	if ($row[$r['col_name']] == 1) 
		$line .= "checked " ; 
	$line .= ' />' ;  
	return $line;	
}

?>