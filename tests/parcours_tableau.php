<!DOCTYPE html>
<html>
	<head>
		<title> Premiers tests en PHP </title>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
			// On crée notre tableau (array) $prenoms
			$tabPrenoms = array ('Pierre', 'Paul', 'Jacques', 'Martin', 'Thibault');
			
			// Puis on fait une simple boucle pour afficher les éléments un à un
			
			for ($numero = 0; $numero < 5; $numero++)
			{
				echo $tabPrenoms[$numero] , '<br />' ; //On va à la ligne après chaque itération
			}
			
		?>
	</body>
</html>