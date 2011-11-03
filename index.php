<?php
	if((substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == 'fr' || $_SERVER['QUERY_STRING'] == 'fr') && $_SERVER['QUERY_STRING'] != 'en') {
		require("fr.php");
	} else {
		require("en.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $titleTr; ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="keywords" content="acta,save acta,telecomix,petition,freedom">
		<meta name="description" content="This petition is to urge lawmakers to support ACTA. The European Union needs ACTA to protect us from the evils of freedom.">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
		<script src="jquery.js"></script>
		<script src="petition.js"></script>
	</head>
	
	<body>
		<h1>
			<?php echo $titleTr; ?><sup> ®</sup>
		</h1>
		<article>
			<div id="slide" style="background-image: url(<?php echo $slideTr; ?>)"></div>
			
			<div id="camp"><img src="camp.png" alt="Photo of concentration camp inmates"></div>
			
			<?php echo $textTr; ?>
			
			<div id="video">
				<iframe width="500" height="281" src="http://www.youtube.com/embed/DX1iplQQJTo?rel=0" frameborder="0" allowfullscreen></iframe>
			</div>
			
			<h2><?php
				$count = fopen('count.csv', 'r');
				echo number_format(fgets($count));
				fclose($count);
			?> signatures</h2>
			
			<p>
				<form method="post" action="index.php">
					<?php if(isset($_POST['location']) && $_POST['hellow'] == '') {
						require('ajax.php');
					} else { ?>
					<div id="hellow">Must be blank: <input type="text" name="hellow"></div>
					<label for="name"><?php echo $nameTr ?> </label><input type="text" name="name" id="name"><br>
					<label for="country"><?php echo $countryTr ?> </label>
					<select name="country" id="country">
						<?php
							$countries = array("","Afghanistan","Albania","Algeria","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Central African Republic","Chad","Chile","China","Colombi","Comoros","Congo (Brazzaville)","Congo","Costa Rica","Cote d'Ivoire","Croatia","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","East Timor (Timor Timur)","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Fiji","Finland","France","Gabon","Gambia,The","Georgia","Germany","Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti","Honduras","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Korea,North","Korea,South","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepa","Netherlands","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman","Pakistan","Palau","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Qatar","Romania","Russia","Rwanda","Saint Kitts and Nevis","Saint Lucia","Saint Vincent","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia and Montenegro","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","Spain","Sri Lanka","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Yemen","Zambia","Zimbabwe");
							
							foreach($countries as $country) {
								echo "<option value=\"$country\">$country</option>";
							}
						?>
					</select><br>
					<label for="location"><?php echo $addressTr ?> </label><input type="text" name="location" id="location"><br>
					<input type="submit" value="<?php echo $signTr ?>" id="submit">
					<?php } ?>
				</form>
			</p>
		</article>
		
		<footer>
			<?php echo $footerTr ?>
			<a href="http://telecomix.org/" title="This is TELECOMIX."><div id="logo"></div></a>
		</footer>
	</body>
</html>