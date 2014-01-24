<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<title><?php echo (isset($title)) ? $title : "Mvitaliz" ?> </title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/table.css" />
</head>
<body>
	<div id="wrapper">
<div id="content">
<div class="contact_form">
<div class="form_title">Contact Form</div>
	<?php echo form_open("contact/contact_form"); ?>
		<p>
			<label for="firstname">First Name:</label>
			<input type="text" id="firstname" name="firstname" value="<?php echo set_value('firstname'); ?>" />
		</p>        
		<?php echo form_error('firstname', '<p class="error">', '</p>'); ?>
		<p>
			<label for="lastname">Last Name:</label>
			<input type="text" id="lastname" name="lastname" value="<?php echo set_value('lastname'); ?>" />
		</p>
		<?php echo form_error('lastname', '<p class="error">', '</p>'); ?>
		<p>
			<label for="address">Address:</label>
			<input type="text" id="address" name="address" value="<?php echo set_value('address'); ?>" />
		</p>
		<?php echo form_error('address', '<p class="error">', '</p>'); ?>
		<p>
			<label for="city">City:</label>
			<input type="text" id="city" name="city" value="<?php echo set_value('city'); ?>" />
		</p>   
		<?php echo form_error('city', '<p class="error">', '</p>'); ?>
		<p>
			<label for="state">State:</label>
			<input type="text" id="state" name="state" value="<?php echo set_value('state'); ?>" />
		</p>
		<?php echo form_error('state', '<p class="error">', '</p>'); ?>
		<p>
			<label for="zip">Zip:</label>
			<input type="text" id="zip" name="zip" value="<?php echo set_value('zip'); ?>" />
		</p> 
		<?php echo form_error('zip', '<p class="error">', '</p>'); ?>
		<p>
			<input type="submit" class="submitButton" value="Submit" />
		</p>
	<?php echo form_close(); ?>
</div>
	<p></p>
	<?php
	
		if($this->session->userdata('message') != '' ){  
			echo '<p>'.$this->session->userdata('message').'</p>';
		}
	echo('<table class="tablecs"><tr>');
		$i = 0;
	 foreach($contacts as $row){ 
		 $i++;
		echo '<td width="33%">';
			echo '<p style="font-weight:bold;font-size: 9pt;">'.ucfirst(strtolower($row['firstname'])).' '.ucfirst(strtolower($row['lastname'])).'</p>';
			echo '<p>'.$row['address'].', '.$row['city'].'</p>';
			echo '<p>'.$row['state'].', '.$row['zip'].'</p>';
		echo '</td>';
		
		if($i % 3==0){
			echo '</tr><tr>';
		}
	}
		echo'</tr></table>';
	?>
</div>