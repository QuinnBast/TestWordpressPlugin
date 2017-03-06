<?php

/*
 * Plugin Name: QBTest plugin
 * Description: Quinn Bast has been testing how to make a plugin because yay customization!
 * Author: Quinn Bast
 * Version: 0.0.1
 */
 
include('functions.php');

function HelloWorld(){	
    echo 'Hello World<br/>';
    
    $pageViews = get_option('QBViews', 0);
    update_option('QBViews', ($pageViews + 1));
    echo "There have been $pageViews Views on this page.<br/>";
    
    echo 'Admin settings are:<br/>';
    $name = get_option('QBTest_Name');
    $ip1 = get_option('QBTest_IP1');
    $ip2 = get_option('QBTest_IP2');
    $ip3 = get_option('QBTest_IP3');
    $ip4 = get_option('QBTest_IP4');
    echo "Name = $name<br/>";
    echo "IP = $ip1" . "." . "$ip2" . "." . "$ip3" . "." . "$ip4<br/>";
    
	if(isset($_POST['number']))
	{
	   updateNumber();
	} 
    
    $number = get_option('QBNumber', 0);
    ?>
    <br/>
    <div style="text-align: center">
    <form name="submitNumber" method="post">
    <table>
    	<tr>
		<td> The last user input: </td>
		<td> <?=$number?> </td>
	</tr>
	<tr>
		<td> Input something: </td>
		<td> <input type='text' name='number'> </td>
	</tr>
	<tr>
		<td colspan=2><input type="submit" value="Show Mine!"></td>
	</tr>
	</table>
    </form>
    </div>
    <?php
    }

add_shortcode( 'hello', 'HelloWorld');
add_action('admin_menu', 'LoadAdminMenu');	//Displays a menu on the backend of the wordpress website for easier editing.