<?php

function LoadAdminMenu(){
	add_menu_page("TestPluginSettings", "TestPluginSettings", 1, "TestPluginSettings", "DisplayAdminSettings");
	//Adds the options menu to the WP backend and links it to a funciton called DisplayAdminSettings
	}
	
function DisplayAdminSettings(){

	checkSubmission();
	
	$dbName = get_option('QBTest_Name');
	$ip1 = get_option('QBTest_IP1', 0);
	$ip2 = get_option('QBTest_IP2', 0);
	$ip3 = get_option('QBTest_IP3', 0);
	$ip4 = get_option('QBTest_IP4', 0);
	
	?>
	
	<h2>TestPlugin Settings</h2>
	<form name='TestPluginSettings' method='post'>
	<table>
	<tr>
		<td> Database Name: </td>
		<td> <input type='text' name='dbName' value='<?=$dbName?>'> </td>
	</tr>
	<tr>
		<td> Database IP: </td>
		<td> <input type='text' name='dbIP1' value='<?=$ip1?>'>
			.<input type='text' name='dbIP2' value='<?=$ip2?>'>
			.<input type='text' name='dbIP3' value='<?=$ip3?>'>
			.<input type='text' name='dbIP4' value='<?=$ip4?>'> </td>
	</tr>
	<tr>
		<td colspan='2'>
		<input type='submit' value='Submit'>
		</td>
	</tr>
	</form>
	
	<?php
	}
	
function checkSubmission(){
	if (isset($_POST['dbName']) && ($_POST['dbName'] != get_option('QBTest_Name')))
	{
		$dbName = $_POST['dbName'];
		update_option('QBTest_Name', $dbName);
		echo "Database Name updated successfully.<br/>";
	}
		
	if ((isset($_POST['dbIP1'])) && (isset($_POST['dbIP2'])) && (isset($_POST['dbIP3'])) && (isset($_POST['dbIP4'])))
	{
		
		$dbIP1= $_POST['dbIP1'];
		$dbIP2= $_POST['dbIP2'];
		$dbIP3= $_POST['dbIP3'];
		$dbIP4= $_POST['dbIP4'];
		
		if (($dbIP1 > 255) || (bdIP1 < 0) || ($dbIP2 > 255) || ($dbIP2 < 0) || ($dbIP3 > 255) || ($dbIP3 < 0) || ($dbIP4 > 255) || ($bdIP4 < 0))
			echo "You have entered an incorrect IP address.<br/>";
		else
		{		
			update_option('QBTest_IP1', $dbIP1);
			update_option('QBTest_IP2', $dbIP2);
			update_option('QBTest_IP3', $dbIP3);
			update_option('QBTest_IP4', $dbIP4);
			echo "Database IP updated successfully.<br/>";
		}
	}
}

function updateNumber(){
	if (isset($_POST['number']))
	{
		$number = $_POST['number'];
		update_option('QBNumber', $number);
	}
}