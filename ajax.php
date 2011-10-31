<?php
	require('meps.php');
	
	if(!isset($textTr)) {
		if(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr') {
			require("fr.php");
		} else {
			require("en.php");
		}
	}
	
	$count = fopen('count.csv', 'r+');
	$signatures = fgets($count);
	$signatures++;
	fseek($count, 0);
	fwrite($count, $signatures);
	fclose($count);
	
	$name = str_replace(';', '', $_POST['name']);
	$country = str_replace(';', '', $_POST['country']);
	$location = str_replace(';', '', $_POST['location']);
	$name = str_replace("\n", '', $name);
	$country = str_replace("\n", '', $country);
	$location = str_replace("\n", '', $location);
	
	$csv = fopen('signatures.csv', 'a');
	fwrite($csv, "$name;$country;$location\n");
	fclose($csv);
	
	if(isset($meps[$_POST['country']])) {
		echo $thanksMep;
		echo '<table>';
		foreach($meps[$_POST['country']] as $mep => $email) {
			
			if($email == reset($meps[$_POST['country']])) {
				echo "<tr><td>$mep</td><td><a href=\"mailto:$email\">$email</a></td>";
				echo '<td id="text" rowspan="'.count($meps[$_POST['country']]).'">'.$textTr.'</td></tr>';
			} else {
				echo "<tr><td>$mep</td><td><a href=\"mailto:$email\">$email</a></td></tr>";
			}
		}
		echo '</table>';
	} else {
		echo $thanksTr;
	}
?>